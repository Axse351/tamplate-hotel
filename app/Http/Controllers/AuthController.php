<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect ke dashboard jika berhasil login
            return redirect()->route('admin.app');
        }

        // Kembali ke halaman login jika gagal
        return redirect()->route('login')->withErrors('Email atau password salah.');
    }

    // Menangani logout
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('login'); // Arahkan ke halaman login
    }

    // Menampilkan halaman dashboard
    public function app()
    {
        return view('admin.app'); // Tampilkan halaman dashboard
    }
}
