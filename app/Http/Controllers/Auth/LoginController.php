<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{        // Method untuk login pengguna
    public function login(Request $request)
    {
        // Validasi email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah pengguna sudah terdaftar
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Jika password sesuai, login pengguna
            if (Hash::check($request->password, $user->password)) {
                // return redirect()->route('articles');
                Auth::login($user);
                return redirect()->route('articles');
            }
        }

        // Jika gagal login
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    // Method untuk membuat akun baru dan langsung login
    public function createAccount(Request $request)
    {
        // Validasi email dan password
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat akun baru
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis
        Auth::login($user);

        // Arahkan ke halaman artikel
        return redirect()->route('articles');
    }

    public function ShowLogin()
    {
        return view('auth.login');
    }


}

