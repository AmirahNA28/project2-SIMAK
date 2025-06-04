<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class C_Register extends Controller
{
    // Menampilkan form registrasi
    public function showRegister()
    {
        return view('v_register'); // Gantilah dengan nama view yang sesuai
    }

    // Proses registrasi pengguna
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:karyawan,pemilik,pelanggan',
        ]);

        // Membuat pengguna baru
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Password di-hash sebelum disimpan
            'role' => $request->role,
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
