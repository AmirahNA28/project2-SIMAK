<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_pelanggan;
use Illuminate\Support\Facades\Auth;

class c_loginpelanggan extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('loginpelanggan');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
}
