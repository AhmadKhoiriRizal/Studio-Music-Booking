<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            \Log::info('Google User Data Received:', [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail()
            ]);

            // Cek apakah user sudah ada berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika user ada, cek apakah punya google_id (sudah pernah login via Google)
                if (empty($user->google_id)) {
                    // User sudah register manual tapi belum pernah login Google
                    return redirect('/signin')->with('error',
                        'Akun ini sudah terdaftar dengan password. Silakan login menggunakan email dan password.');
                }

                // Update data user jika perlu
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'name' => $googleUser->getName() // Update nama jika berubah
                ]);

                Auth::login($user, true);
                return redirect()->intended($this->redirectPath());

            } else {
                // User belum pernah register sama sekali
                return redirect('/signup')->with('error',
                    'Akun belum terdaftar. Silakan daftar terlebih dahulu sebelum login dengan Google.')
                    ->with('google_user', [
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId()
                    ]);
            }

        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/signin')->with('error', 'Login dengan Google gagal: ' . $e->getMessage());
        }
    }

    // Method untuk handle registrasi dengan data Google
    public function registerWithGoogle(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'google_id' => 'required|string',
            'password' => 'nullable' // Optional untuk Google registration
        ]);

        \Log::info('Validated Data:', $validated);
        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'google_id' => $validated['google_id'],
            'password' => bcrypt(uniqid()), // Password acak
            'role' => 'user',
        ]);

        \Log::info('User Created:', $user->toArray());
        Auth::login($user, true);
        return redirect()->intended($this->redirectPath());
    }

    protected function redirectPath()
    {
        if (Auth::user()->isAdmin()) {
            return '/admin/dashboard';
        }

        return '/user/dashboard';
    }
}


