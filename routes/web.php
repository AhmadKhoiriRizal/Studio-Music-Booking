<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\EquipmentController ;
use App\Http\Controllers\BackupController;
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
// Route::post('/auth/google/register', [GoogleController::class, 'registerWithGoogle'])->nam   e('google.register');

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
        Route::post('/store', [StudioController::class, 'store'])->name('store');
        Route::get('/create', [StudioController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [StudioController::class, 'edit'])->name('edit');
        Route::get('/edit-data/{id}', [StudioController::class, 'getEditData'])->name('edit.data'); // Route baru
        Route::put('/update/{id}', [StudioController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [StudioController::class, 'destroy'])->name('destroy');
    });

    // Data Akun Management
    Route::prefix('akun')->name('akun.')->group(function () {
        Route::get('/data', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy'); // Tambahkan route delete
        Route::delete('/destroy-multiple', [AdminController::class, 'destroyMultiple'])->name('destroy.multiple');
    });

    // Availability Management
    Route::get('/kelola-ketersediaan', [BookingController::class, 'availability'])->name('ketersediaan');

    // Availability Management
    // Backup Management - COMPLETE ROUTES
    Route::prefix('backup')->name('backup.')->group(function () {
        // Basic backup operations
        Route::get('/', [BackupController::class, 'index'])->name('index');
        Route::get('/data', [BackupController::class, 'data'])->name('data');
        Route::post('/create', [BackupController::class, 'createBackup'])->name('create');

        // Restore operations
        Route::post('/restore', [BackupController::class, 'restoreBackup'])->name('restore');
        Route::post('/restore-enhanced', [BackupController::class, 'restoreBackupEnhanced'])->name('restore.enhanced');

        // File operations
        Route::get('/download/{filename}', [BackupController::class, 'downloadBackup'])->name('download');
        Route::delete('/delete/{filename}', [BackupController::class, 'deleteBackup'])->name('delete');
        Route::get('/list', [BackupController::class, 'listBackups'])->name('list');

        // Testing and debugging
        Route::get('/test', [BackupController::class, 'testConnection'])->name('test');
        Route::get('/debug/{filename}', [BackupController::class, 'debugBackup'])->name('debug');
        Route::post('/test-restore', [BackupController::class, 'testRestore'])->name('test.restore');
        Route::get('/verify-database', [BackupController::class, 'verifyDatabaseState'])->name('verify.database');

        // Custom backup
        Route::post('/create-custom', [BackupController::class, 'createCustomBackup'])->name('create.custom');
    });

    // Data Equipment Management
    // Data Equipment Management dengan Stock Control
    Route::prefix('equipment')->name('equipment.')->group(function () {
        Route::get('/data', [EquipmentController::class, 'index'])->name('index');
        Route::post('/store', [EquipmentController::class, 'store'])->name('store');
        Route::get('/edit-data/{id}', [EquipmentController::class, 'getEditData'])->name('edit.data'); // Route baru
        Route::put('/update/{id}', [EquipmentController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [EquipmentController::class, 'destroy'])->name('destroy');

        // Stock management routes
        Route::post('/adjust-stock/{id}', [EquipmentController::class, 'adjustStock'])->name('adjust.stock');
        Route::get('/allocation-details/{id}', [EquipmentController::class, 'getAllocationDetails'])->name('allocation.details');
    });
    // Route::get('/backup-data', [AdminController::class, 'backup'])->name('backup');

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

// Password Reset Routes
Route::prefix('password')->group(function () {
    Route::get('/forgot', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.forgot');
    Route::post('/send', [ForgotPasswordController::class, 'sendResetLink'])->name('password.send');
    Route::get('/verify', [ForgotPasswordController::class, 'showVerifyForm'])->name('password.verify');
    Route::post('/verify', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
    Route::get('/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});


// routes/web.php (temporary for testing)
// Route::get('/admin/akun/test-delete', [AdminController::class, 'testDelete']);

// Tambahkan di routes/web.php
Route::get('/find-mysqldump', [BackupController::class, 'findMysqldump']);

