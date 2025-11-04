<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Root - Redirect berdasarkan status login
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

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Logout Route (Authenticated Only)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard Routes (Authenticated Only)
Route::middleware('auth')->group(function () {
    
    // Superadmin Dashboard
    Route::get('/superadmin/dashboard', [DashboardController::class, 'superadmin'])
        ->name('superadmin.dashboard');
    
    // Admin Bidang Dashboard
    Route::get('/admin-bidang/dashboard', [DashboardController::class, 'adminBidang'])
        ->name('adminbidang.dashboard');
    
    // Pimpinan Dashboard
    Route::get('/pimpinan/dashboard', [DashboardController::class, 'pimpinan'])
        ->name('pimpinan.dashboard');
});