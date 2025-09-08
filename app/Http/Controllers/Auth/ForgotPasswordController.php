<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\PasswordResetMail;
use Twilio\Rest\Client;

class ForgotPasswordController extends Controller
{
    // Tampilkan form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim kode verifikasi
    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'method' => 'required|in:auto,email,whatsapp' // Tambahkan 'auto'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Auto-detect method if set to auto
        $method = $request->method;
        if ($method === 'auto') {
            $method = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'whatsapp';
        }

        // Cari user by email atau phone
        $user = User::where('email', $request->login)
                    ->orWhere('phone', $request->login)
                    ->first();

        if (!$user) {
            return back()->with('error', 'Email/nomor handphone tidak ditemukan.');
        }

        // Generate token dan kode verifikasi
        $token = Str::random(60);
        $verificationCode = rand(100000, 999999);

        // Simpan atau update token di database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'verification_code' => $verificationCode,
                'created_at' => now()
            ]
        );

        if ($method === 'email') {
            // Kirim kode via email
            try {
                Mail::to($user->email)->send(new PasswordResetMail($verificationCode));
                session(['reset_email' => $user->email]);
                \Log::info('Email verification sent', ['email' => $user->email]);
                return redirect()->route('password.verify')->with('success', 'Kode verifikasi telah dikirim ke email Anda.');
            } catch (\Exception $e) {
                \Log::error('Email sending failed', ['error' => $e->getMessage()]);
                return back()->with('error', 'Gagal mengirim email. Silakan coba lagi.');
            }
        } else {
            // Pastikan user memiliki nomor handphone
            if (!$user->phone) {
                return back()->with('error', 'Nomor handphone tidak terdaftar. Silakan gunakan email.');
            }

            // Kirim kode via WhatsApp
            if ($this->sendWhatsApp($user->phone, $verificationCode)) {
                session(['reset_phone' => $user->phone]);
                return redirect()->route('password.verify')->with('success', 'Kode verifikasi telah dikirim via WhatsApp.');
            } else {
                return back()->with('error', 'Gagal mengirim WhatsApp. Silakan coba lagi atau gunakan email.');
            }
        }
    }

    // Tampilkan form verifikasi kode
    public function showVerifyForm()
    {
        // Check jika perlu show sandbox warning (untuk WhatsApp)
        $showSandboxHelp = session('sandbox_help', false);
        $userPhone = session('user_phone');
        $userEmail = session('reset_email');

        $verificationCode = session('verification_code');
        $method = $userEmail ? 'email' : 'whatsapp';

        if ($showSandboxHelp) {
            session()->forget(['sandbox_help', 'user_phone']);

            return view('auth.verify-code', [
                'showSandboxHelp' => true,
                'userPhone' => $userPhone,
                'verification_code' => $verificationCode,
                'method' => $method
            ]);
        }

        return view('auth.verify-code', [
            'showSandboxHelp' => false,
            'method' => $method,
            'verification_code' => $method === 'email' ? $verificationCode : null
        ]);
    }

    // Verifikasi kode
    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'verification_code' => 'required|digits:6'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cari token berdasarkan email atau phone dari session
        $email = session('reset_email');
        $phone = session('reset_phone');

        $resetToken = DB::table('password_reset_tokens')
                        ->where('email', $email)
                        ->first();

        // Check if token exists and is not expired (10 minutes)
        if (!$resetToken || now()->diffInMinutes($resetToken->created_at) > 10) {
            return back()->with('error', 'Kode verifikasi tidak valid atau sudah kadaluarsa.');
        }

        // Check verification code
        if ($resetToken->verification_code != $request->verification_code) {
            return back()->with('error', 'Kode verifikasi tidak valid.');
        }

        // Simpan token di session untuk reset password
        session(['reset_token' => $resetToken->token]);

        return redirect()->route('password.reset');
    }

    // Tampilkan form reset password
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    // Reset password
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $token = session('reset_token');
        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$resetToken) {
            return redirect()->route('password.forgot')->with('error', 'Token tidak valid. Silakan ulangi proses lupa password.');
        }

        // Update password user
        $user = User::where('email', $resetToken->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token
        DB::table('password_reset_tokens')->where('email', $resetToken->email)->delete();

        // Hapus session
        $request->session()->forget(['reset_token', 'reset_email', 'reset_phone']);

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
    }

    // Kirim WhatsApp menggunakan Twilio
    private function sendWhatsApp($phone, $code)
    {
        \Log::info('Attempting to send WhatsApp verification', ['phone' => $phone]);

        try {
            $result = $this->sendWhatsAppFallback($phone, $code);

            if (!$result) {
                // Jika gagal, mungkin karena sandbox issue
                return $this->handleSandboxError($phone);
            }

            return $result;

        } catch (\Exception $e) {
            \Log::error('WhatsApp sending failed', ['error' => $e->getMessage()]);
            return $this->handleSandboxError($phone);
        }
    }

    private function handleSandboxError($phone)
    {
        // Simpan info bahwa user perlu join sandbox
        session(['sandbox_help' => true, 'user_phone' => $phone]);

        \Log::warning('Sandbox enrollment required for phone: ' . $phone);

        // Return true agar flow continue, tapi tampilkan warning ke user
        return true;
    }

    // Fallback method jika Content API gagal
    private function sendWhatsAppFallback($phone, $code)
    {
        try {
            $twilioSid = env('TWILIO_SID');
            $twilioToken = env('TWILIO_AUTH_TOKEN');
            $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');

            $formattedPhone = $this->formatPhoneForWhatsApp($phone);

            $client = new Client($twilioSid, $twilioToken);

            $message = $client->messages->create(
                "whatsapp:{$formattedPhone}",
                [
                    'from' => "whatsapp:{$twilioWhatsAppNumber}",
                    'body' => "Kode verifikasi reset password Anda: *{$code}*\n\nJangan berikan kode ini kepada siapapun. Kode ini berlaku selama 10 menit.\n\n– " . config('app.name')
                ]
            );

            \Log::info('WhatsApp fallback message sent: ' . $message->sid);
            return true;

        } catch (\Exception $e) {
            \Log::error('WhatsApp Fallback Error: ' . $e->getMessage());
            return false;
        }
    }

    // Format nomor telepon untuk WhatsApp
    private function formatPhoneForWhatsApp($phone)
    {
        // Hapus semua karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika diawali dengan 0, ganti dengan kode negara Indonesia (+62)
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        return $phone;
    }

    // Opsi alternatif: Kirim WhatsApp menggunakan WhatsApp API dari Netflisc
    private function sendWhatsAppNetflisc($phone, $code)
    {
        try {
            $apiKey = env('WHATSAPP_API_KEY');
            $apiUrl = env('WHATSAPP_API_URL');

            if (!$apiKey || !$apiUrl) {
                return false;
            }

            $client = new \GuzzleHttp\Client();

            $response = $client->post($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'phone' => $this->formatPhoneForWhatsApp($phone),
                    'message' => "Kode verifikasi reset password Anda: *{$code}*\n\nJangan berikan kode ini kepada siapapun.",
                    'type' => 'text'
                ]
            ]);

            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            \Log::error('WhatsApp API Error: ' . $e->getMessage());
            return false;
        }
    }
}
