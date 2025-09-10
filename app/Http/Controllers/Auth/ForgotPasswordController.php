<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Mail\PasswordResetMail;
use Twilio\Rest\Client;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Tampilkan form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim kode verifikasi dengan rate limiting
    public function sendResetLink(Request $request)
    {
        // Rate Limiting - 5 attempts per IP dalam 1 jam
        $key = 'reset-password:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            return back()->with('error', "Terlalu banyak percobaan reset password. Coba lagi dalam {$minutes} menit.");
        }

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'method' => 'required|in:auto,email,whatsapp'
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
            // Hit rate limiter even for invalid users to prevent enumeration
            RateLimiter::hit($key, 3600); // 1 hour
            return back()->with('error', 'Email/nomor handphone tidak ditemukan.');
        }

        // Generate SECURE token dan kode verifikasi
        $token = hash('sha256', Str::random(60) . time() . $user->id);
        $verificationCode = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        // Determine identifier based on method
        $identifier = $method === 'email' ? $user->email : $user->phone;
        $identifierColumn = $method === 'email' ? 'email' : 'phone';

        // Simpan atau update token di database dengan identifier yang tepat
        DB::table('password_reset_tokens')->updateOrInsert(
            [$identifierColumn => $identifier],
            [
                'token' => $token, // Sekarang sudah di-hash
                'verification_code' => Hash::make($verificationCode), // Hash verification code juga
                'method' => $method, // Tambah kolom method untuk tracking
                'created_at' => now()
            ]
        );

        if ($method === 'email') {
            // Kirim kode via email
            try {
                Mail::to($user->email)->send(new PasswordResetMail($verificationCode));
                session([
                    'reset_identifier' => $user->email,
                    'reset_method' => 'email'
                ]);
                \Log::info('Email verification sent', ['email' => $user->email]);

                // Hit rate limiter on success
                RateLimiter::hit($key, 3600);

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
            $whatsappResult = $this->sendWhatsApp($user->phone, $verificationCode);

            if ($whatsappResult['success']) {
                session([
                    'reset_identifier' => $user->phone,
                    'reset_method' => 'whatsapp'
                ]);

                // Hit rate limiter on success
                RateLimiter::hit($key, 3600);

                if ($whatsappResult['sandbox_warning']) {
                    session(['sandbox_warning' => true]);
                    return redirect()->route('password.verify')->with('warning', 'Kode verifikasi telah dikirim via WhatsApp. Pastikan Anda sudah bergabung dengan sandbox Twilio untuk menerima pesan.');
                }

                return redirect()->route('password.verify')->with('success', 'Kode verifikasi telah dikirim via WhatsApp.');
            } else {
                return back()->with('error', 'Gagal mengirim WhatsApp. Silakan coba lagi atau gunakan email.');
            }
        }
    }

    // Tampilkan form verifikasi kode
    public function showVerifyForm()
    {
        $method = session('reset_method');
        $identifier = session('reset_identifier');

        if (!$method || !$identifier) {
            return redirect()->route('password.forgot')->with('error', 'Silakan mulai proses reset password dari awal.');
        }

        return view('auth.verify-code', [
            'method' => $method,
            'identifier' => $method === 'email' ? 'email' : 'nomor WhatsApp',
            'sandbox_warning' => session('sandbox_warning', false)
        ]);
    }

    // Verifikasi kode dengan proper validation
    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'verification_code' => 'required|digits:6'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Get session data
        $method = session('reset_method');
        $identifier = session('reset_identifier');

        if (!$method || !$identifier) {
            return redirect()->route('password.forgot')->with('error', 'Session expired. Silakan mulai ulang proses reset password.');
        }

        // Cari token berdasarkan method dan identifier yang tepat
        $identifierColumn = $method === 'email' ? 'email' : 'phone';
        $resetToken = DB::table('password_reset_tokens')
                        ->where($identifierColumn, $identifier)
                        ->where('method', $method)
                        ->first();

        // Check if token exists and is not expired (10 minutes)
        if (!$resetToken || now()->diffInMinutes($resetToken->created_at) > 10) {
            return back()->with('error', 'Kode verifikasi tidak valid atau sudah kadaluarsa.');
        }

        // Verify hashed verification code
        if (!Hash::check($request->verification_code, $resetToken->verification_code)) {
            return back()->with('error', 'Kode verifikasi tidak valid.');
        }

        // Simpan token di session untuk reset password
        session(['reset_token' => $resetToken->token]);

        return redirect()->route('password.reset');
    }

    // Tampilkan form reset password
    public function showResetForm()
    {
        if (!session('reset_token')) {
            return redirect()->route('password.forgot')->with('error', 'Silakan mulai proses reset password dari awal.');
        }

        return view('auth.reset-password');
    }

    // Reset password dengan validation yang lebih kuat
    public function resetPassword(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/'
            ]
        ], [
            'password.regex' => 'Password harus mengandung minimal 1 huruf kecil, 1 huruf besar, 1 angka, dan 1 karakter khusus.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('validation_error', true);
        }

        $token = session('reset_token');

        if (!$token) {
            return redirect()->route('password.forgot')
                ->with('error', 'Token tidak valid atau sesi telah kadaluarsa.');
        }

        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$resetToken) {
            return redirect()->route('password.forgot')
                ->with('error', 'Token tidak valid. Silakan ulangi proses lupa password.');
        }

        // Cari user berdasarkan email
        $user = User::where('email', $resetToken->email)->first();

        if (!$user) {
            return redirect()->route('password.forgot')
                ->with('error', 'User tidak ditemukan.');
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token reset
        DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->delete();

        // Hapus session
        $request->session()->forget([
            'reset_token',
            'reset_email',
            'reset_phone'
        ]);

        return redirect()->route('signin')
            ->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
    }

    // Kirim WhatsApp menggunakan Twilio dengan proper error handling
    private function sendWhatsApp($phone, $code)
    {
        \Log::info('Attempting to send WhatsApp verification', ['phone' => $phone]);

        try {
            $result = $this->sendWhatsAppFallback($phone, $code);
            return $result;
        } catch (\Exception $e) {
            \Log::error('WhatsApp sending failed', ['error' => $e->getMessage()]);

            // Jika error karena sandbox, return dengan warning
            if (str_contains($e->getMessage(), 'sandbox') || str_contains($e->getMessage(), 'not a valid')) {
                return [
                    'success' => true,
                    'sandbox_warning' => true
                ];
            }

            return [
                'success' => false,
                'sandbox_warning' => false
            ];
        }
    }

    // Improved WhatsApp fallback method
    private function sendWhatsAppFallback($phone, $code)
    {
        try {
            $twilioSid = env('TWILIO_SID');
            $twilioToken = env('TWILIO_AUTH_TOKEN');
            $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');

            if (!$twilioSid || !$twilioToken || !$twilioWhatsAppNumber) {
                throw new \Exception('Twilio configuration incomplete');
            }

            $formattedPhone = $this->formatPhoneForWhatsApp($phone);

            $client = new Client($twilioSid, $twilioToken);

            $message = $client->messages->create(
                "whatsapp:{$formattedPhone}",
                [
                    'from' => "whatsapp:{$twilioWhatsAppNumber}",
                    'body' => "Kode verifikasi reset password Anda: *{$code}*\n\nJangan berikan kode ini kepada siapapun. Kode ini berlaku selama 10 menit.\n\n– " . config('app.name')
                ]
            );

            \Log::info('WhatsApp message sent successfully: ' . $message->sid);

            return [
                'success' => true,
                'sandbox_warning' => false
            ];

        } catch (\Exception $e) {
            \Log::error('WhatsApp Fallback Error: ' . $e->getMessage());

            // Check if it's a sandbox issue
            if (str_contains($e->getMessage(), 'sandbox') ||
                str_contains($e->getMessage(), 'not a valid') ||
                str_contains($e->getMessage(), 'Attempted to send to unverified number')) {

                return [
                    'success' => true,
                    'sandbox_warning' => true
                ];
            }

            throw $e;
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
        } elseif (!str_starts_with($phone, '62')) {
            // Jika tidak diawali 62, tambahkan 62
            $phone = '62' . $phone;
        }

        return '+' . $phone;
    }
}
