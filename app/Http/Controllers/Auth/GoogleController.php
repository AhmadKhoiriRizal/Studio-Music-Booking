<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Update google_id jika user sudah ada
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                // Buat user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()), // Password acak
                    'role' => 'user', // Default role
                ]);
            }

            Auth::login($user);

            return redirect()->intended($this->redirectPath());

        } catch (\Exception $e) {
            return redirect('/signin')->with('error', 'Login dengan Google gagal');
        }
    }

    protected function redirectPath()
    {
        if (Auth::user()->isAdmin()) {
            return '/admin/dashboard';
        }

        return '/user/dashboard';
    }
}
