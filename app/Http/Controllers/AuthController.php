<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|min:5',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // harus mengandung huruf besar
            ],
        ], [
            'name.required' => 'Isi Field Username',
            'password.required' => 'Password Wajib Diisi',
            'name.min' => 'Username Minimal 5 Karakter',
            'password.min' => 'Password Minimal 3 Karakter',
            'password.regex' => 'Password Harus Mengandung Huruf Besar'
        ]);

        // Cek user berdasarkan name
        $user = User::where('name', $request->name)->first();

        if (!$user) {
            return back()->withErrors(['name' => 'Username tidak ditemukan'])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        // Login berhasil
        Auth::login($user);

        // Redirect ke halaman dashboard / home
        return redirect()->route('pages.home')->with('success', 'Berhasil login!');
    }

    public function process(Request $request)
{
    $request->validate([
        'name' => 'required|min:5',
        'password' => 'required|min:3',
    ]);

    $user = User::where('name', $request->name)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        return redirect()->route('pages.home')->with('success', 'Login berhasil!');
    }

    return back()->withErrors(['login' => 'Username atau password salah']);
}


    public function logout()
{

    return redirect()->route('auth')->with('success', 'Berhasil logout!');
}

}

