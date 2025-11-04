<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard Superadmin
     */
    public function superadmin()
    {
        $user = Auth::user();
        
        // Pastikan hanya superadmin yang bisa akses
        if ($user->role !== 'superadmin') {
            abort(403, 'Unauthorized');
        }
        
        return view('auth.dashboard.superadmin', compact('user'));
    }

    /**
     * Dashboard Admin Bidang
     */
    public function adminBidang()
    {
        $user = Auth::user();
        
        // Pastikan hanya admin bidang yang bisa akses
        if ($user->role !== 'adminbidang') {
            abort(403, 'Unauthorized');
        }
        
        return view('auth.dashboard.adminbidang', compact('user'));
    }

    /**
     * Dashboard Pimpinan
     */
    public function pimpinan()
    {
        $user = Auth::user();
        
        // Pastikan hanya pimpinan yang bisa akses
        if ($user->role !== 'pimpinan') {
            abort(403, 'Unauthorized');
        }
        
        return view('auth.dashboard.pimpinan', compact('user'));
    }
}