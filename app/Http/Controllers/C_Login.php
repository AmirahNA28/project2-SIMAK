<?php

namespace App\Http\Controllers;

use App\Models\User; // Impor model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class C_Login extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('v_index');
    }

    public function showLoginForm()
    {
        return view('v_index');
    }

    public function someMethod()
    {
        return view('layout.v_template'); // atau semacamnya
    }
    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            if ($user->role == 'karyawan') {
                return redirect('/admin');
            } elseif ($user->role == 'pemilik') {
                return redirect('/dashboard_pemilik');
            } else {
                return redirect('/shope');
            }
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/index');
    }
    public function showRegister()
    {
    return view('v_register');
    }

    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'role' => 'required|in:karyawan,pemilik,pelanggan',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    Auth::login($user);

    // Redirect berdasarkan peran
    if ($user->role == 'karyawan') {
        return redirect('/admin');
    } elseif ($user->role == 'pemilik') {
        return redirect('/dashboard_pemilik');
    } else {
        return redirect('/shope');
    }
}

}