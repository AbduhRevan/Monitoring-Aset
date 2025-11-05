<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =============================
// Root - Redirect berdasarkan status login
// =============================
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

        switch ($user->role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'adminbidang':
                return redirect()->route('adminbidang.dashboard');
            case 'pimpinan':
                return redirect()->route('pimpinan.dashboard');
            default:
                auth()->logout();
                return redirect()->route('login');
        }
    }

    return redirect()->route('login');
});

// =============================
// Authentication Routes (Guest Only)
// =============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// =============================
// Logout Route (Authenticated Only)
// =============================
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// =============================
// Dashboard & Superadmin Pages (Authenticated Only)
// =============================
Route::middleware('auth')->group(function () {
    
    // ✅ Superadmin Dashboard
    Route::get('/superadmin/dashboard', [DashboardController::class, 'superadmin'])
        ->name('superadmin.dashboard');

    // Dashboard Superadmin
    Route::get('/superadmin/dashboard', function () {
        return view('dashboard.superadmin');
    })->name('dashboard.superadmin');

    // ✅ Bagian Super Admin
    Route::get('/superadmin/masterbidang', function () {
        return view('superadmin.masterbidang');
    })->name('superadmin.masterbidang');

    Route::get('/superadmin/mastersatker', function () {
        return view('superadmin.mastersatker');
    })->name('superadmin.mastersatker');

    Route::get('/superadmin/masterrakserver', function () {
        return view('superadmin.masterrakserver');
    })->name('superadmin.masterrakserver');

    Route::get('/superadmin/pengaturan', function () {
        return view('superadmin.pengaturan');
    })->name('superadmin.pengaturan');

    Route::get('/superadmin/server', function () {
        return view('superadmin.server');
    })->name('superadmin.server');

    Route::get('/superadmin/website', function () {
        return view('superadmin.website');
    })->name('superadmin.website');

    Route::get('/superadmin/pemeliharaan', function () {
        return view('superadmin.pemeliharaan');
    })->name('superadmin.pemeliharaan');

    Route::get('/superadmin/pengguna', function () {
        return view('superadmin.pengguna');
    })->name('superadmin.pengguna');

    Route::get('/superadmin/logaktivitas', function () {
        return view('superadmin.logaktivitas');
    })->name('superadmin.logaktivitas');

    Route::get('/superadmin/pengaturan', function () {
        return view('superadmin.pengaturan');
    })->name('superadmin.pengaturan');

    // ✅ Admin Bidang Dashboard
    Route::get('/admin-bidang/dashboard', [DashboardController::class, 'adminBidang'])
        ->name('adminbidang.dashboard');
    
    // ✅ Pimpinan Dashboard
    Route::get('/pimpinan/dashboard', [DashboardController::class, 'pimpinan'])
        ->name('pimpinan.dashboard');
});
