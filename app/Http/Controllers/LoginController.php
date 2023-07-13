<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('login_admin',[
            "title" => "login admin"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd($credentials);

        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/beranda');
        }

        return back()->with('loginError');
    }

    public function logout()
    {
        // Logika untuk proses logout di sini

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}