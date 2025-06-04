<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class c_profile extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('v_profileadmin', compact('user'));
    }
}
