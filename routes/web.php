<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StudioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.dashboard');
// });
// Route::get('/signin', function () {
//     return view('signin');
// });
// Route::get('/signup', function () {
//     return view('signup');
// });
// Route::get('/riwayat-booking', function () {
//     return view('user.booking.riwayat');
// });
// Route::get('/detail-paket', function () {
//     return view('user.booking.detail');
// });
// Route::get('/booking', function () {
//     return view('user.booking.booking');
// });
// Route::get('/admin/beranda', function () {
//     return view('admin.dashboard');
// });
// Route::get('/admin/datastudio', function () {
//     return view('admin.page.datastudio');
// });
// Route::get('/admin/kelola-ketersediaan', function () {
//     return view('admin.page.ketersediaan');
// });

// Public Routes (bisa diakses tanpa login)
Route::get('/', function () {
    return view('user.dashboard');
})->name('home');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

// Authentication Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});

// Google Login Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/auth/google/register', [GoogleController::class, 'registerWithGoogle'])->name('google.register');

// User Routes (harus login sebagai user)
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {

    // Dashboard User
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Booking Routes
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::get('/detail-paket', [BookingController::class, 'detail'])->name('detail');
        Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');
    });

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');

    // dashboard page untuk user
    Route::get('/beranda', function () {
        return view('user.dashboard');
    })->name('beranda');
});


// Admin Routes (harus login sebagai admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/beranda', function () {
        return view('admin.dashboard');
    })->name('beranda');

    // Data Studio Management
    Route::prefix('studio')->name('studio.')->group(function () {
        Route::get('/data', [StudioController::class, 'index'])->name('index');
        Route::get('/create', [StudioController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [StudioController::class, 'edit'])->name('edit');
    });

    // Availability Management
    Route::get('/kelola-ketersediaan', [StudioController::class, 'availability'])->name('ketersediaan');

    // Additional admin routes bisa ditambahkan di sini
});

// Redirect based on role after login
Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }
    return redirect()->route('login');
})->name('home.redirect');

// Fallback route
Route::fallback(function () {
    return view('errors.404');
});

