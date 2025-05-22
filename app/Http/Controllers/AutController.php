<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutController extends Controller
{
     public function login()
    {
        return view('autentikasi.login');
    }

    public function loginProses(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // keamanan session
        return redirect()->intended('/'); // arahkan ke halaman utama
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}
}
