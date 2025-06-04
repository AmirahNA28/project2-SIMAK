<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKesehatan;
use Carbon\Carbon;

class C_Admin extends Controller
{
    // Menampilkan halaman admin (dashboard admin)
    public function index()
    {
    
    $now = Carbon::now();
    $notifikasi = JadwalKesehatan::whereDate('tanggal', '<=', $now->addDays(3))->get();

    return view('v_admin', [
        'notifications' => $notifikasi
    ]);
}
}
