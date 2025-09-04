<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('signin');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Coba melakukan login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            return $this->redirectTo();
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Redirect user based on their role after login.
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/user/dashboard');
    }

    /**
     * Handle a logout request from the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Handle user registration (optional)
     */
    public function showRegistrationForm()
    {
        // Clear google_user session jika user mengakses register page manually
        if (!request()->has('google_redirect')) {
            session()->forget('google_user');
        }

        return view('signup');
    }

    public function register(Request $request)
    {
        // Validasi berbeda untuk Google vs manual registration
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ];

        if ($request->filled('google_id')) {
            // Google registration - password optional
            $validationRules['password'] = 'nullable';
            $validationRules['google_id'] = 'required';
        } else {
            // Manual registration - password required
            $validationRules['password'] = 'required|min:6|confirmed';
        }

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('google_user', $request->only(['google_id', 'name', 'email']));
        }

        // Buat user baru
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('google_id')
                ? bcrypt(uniqid()) // Password acak untuk Google user
                : Hash::make($request->password),
            'role' => 'user',
        ];

        // Tambahkan google_id jika ada
        if ($request->filled('google_id')) {
            $userData['google_id'] = $request->google_id;
        }

        $user = User::create($userData);

        // Login user setelah registrasi
        Auth::login($user);

        // Clear google_user session
        session()->forget('google_user');

        return redirect($this->redirectTo());
    }
}
