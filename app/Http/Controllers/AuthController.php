<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login'); // sesuai lokasi view yang kamu kirim
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek user & password
        if ($user && Hash::check($request->password, $user->password)) {

            // Login user -> set session
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect sesuai modul
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth')->with('success', 'Berhasil logout!');
    }
}
