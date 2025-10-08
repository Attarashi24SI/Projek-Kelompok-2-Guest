<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $data['username'] = $request->username;
        $data['password'] = $request->password;

        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:3',
            'password' => 'regex:/[A-Z]/' // harus mengandung huruf besar
        ], [
            'username.required' => 'Isi Field Username',
            'password.required' => 'Password Wajib Diisi',
            'username.min' => 'Username Minimal 5 Karakter',
            'password.min' => 'Password Minimal 3 Karakter',
            'password.regex' => 'Password Harus Mengandung Huruf Besar'
        ]);

        return view('login-respon', $data);
    }
}

