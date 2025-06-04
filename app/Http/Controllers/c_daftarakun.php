<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class c_daftarakun extends Controller
{
    public function index()
    {
        $akun = User::all(); // Atau ->where('role', '!=', 'pemilik') jika ingin exclude pemilik
        return view('v_daftarakun', compact('akun'));
    }
}
