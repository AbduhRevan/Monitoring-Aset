<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu']);
        }

        $user = Auth::user();

        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['message' => 'Akun Anda tidak aktif']);
        }

        if (!in_array($user->role, $roles)) {
            return $this->redirectToDashboard($user->role);
        }

        if ($user->role === 'adminbidang' && is_null($user->bidang_id)) {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['message' => 'Akun Admin Bidang belum dikonfigurasi dengan benar']);
        }

        return $next($request);
    }

    private function redirectToDashboard($role)
    {
        switch ($role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard')
                    ->withErrors(['message' => 'Anda tidak memiliki akses ke halaman tersebut']);
                
            case 'adminbidang':
                return redirect()->route('adminbidang.dashboard')
                    ->withErrors(['message' => 'Anda tidak memiliki akses ke halaman tersebut']);
                
            case 'pimpinan':
                return redirect()->route('pimpinan.dashboard')
                    ->withErrors(['message' => 'Anda tidak memiliki akses ke halaman tersebut']);
                
            default:
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['message' => 'Role tidak valid']);
        }
    }
}