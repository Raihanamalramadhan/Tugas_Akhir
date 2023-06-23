<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    
    // public function index()
    // {
    //     return view('login');
    // }

        
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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username atau password salah');
    }

    public function logout()
    {
        // Logika untuk proses logout di sini
        
        return redirect('/'); // Redirect ke halaman utama setelah logout
    }


}

