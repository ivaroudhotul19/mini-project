<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin == true) {
                return redirect()->intended('/dashboard');
            };
            if (auth()->user()->is_admin == false) {
                return redirect()->intended('/mahasiswa');
            };
        }
        Alert::error('Gagal Masuk!', 'Email atau kata sandi tidak valid');
        return back();
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
