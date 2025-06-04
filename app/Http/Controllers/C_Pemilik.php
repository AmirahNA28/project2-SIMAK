<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan; // gunakan model yang benar
use App\Models\M_Sapi;
use App\Models\m_pakan;
use App\Models\m_kandang;
use App\Models\M_Kesehatan;
use App\Models\LaporanKeuangan;

class C_Pemilik extends Controller
{
    public function dashboard() {
        return view('v_dashboard_pemilik');
    }

    public function lihatData() {
        $data = [
            'sapi' => M_Sapi::all(),
            'pakan' => m_pakan::all(),
            'kandang' => m_kandang::all(),
            'kesehatan' => M_Kesehatan::all(),
        ];
        return view('pemilik_data', $data);
    }

    public function daftarPesanan() {
        $pesanan = Pesanan::all();
        return view('v_pemilik_pesanan', compact('pesanan'));
    }

    public function laporanKeuangan() {
        $laporan = LaporanKeuangan::all();
        return view('laporankeuangan', compact('laporan'));
    }
}
