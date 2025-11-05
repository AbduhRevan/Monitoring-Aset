<?php
// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Cek apakah user memiliki salah satu role yang diizinkan
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Redirect berdasarkan role user
        return match($request->user()->role) {
            'superadmin' => redirect()->route('superadmin.dashboard'),
            'adminbidang' => redirect()->route('adminbidang.dashboard'),
            'pimpinan' => redirect()->route('pimpinan.dashboard'),
            default => abort(403, 'Unauthorized action.')
        };
    }
}