<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Pengguna;

class LoginController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // PERBAIKAN: Gunakan username_email sesuai nama kolom di database
        // Dan cek status aktif
        $credentials = [
            'username_email' => $request->username,
            'password' => $request->password,
            'status' => 'active',  // Hanya user dengan status active yang bisa login
        ];

        // Attempt login dengan remember me
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return $this->redirectToDashboard();
        }

        // Login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah, atau akun tidak aktif.',
        ])->withInput($request->only('username'));
    }

    /**
     * Redirect ke dashboard sesuai role
     */
    protected function redirectToDashboard()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'superadmin':
                return redirect()->route('dashboard.superadmin');
                
            case 'adminbidang':
                return redirect()->route('dashboard.adminbidang');
                
            case 'pimpinan':
                return redirect()->route('dashboard.pimpinan');
                
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'username' => 'Role tidak valid. Hubungi administrator.'
                ]);
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('status', 'Anda telah berhasil logout.');
    }
}