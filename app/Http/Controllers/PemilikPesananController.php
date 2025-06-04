<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PemilikPesananController extends Controller
{
    // Tampilkan daftar pesanan untuk pemilik
    public function index()
    {
        $pesanans = Pesanan::orderBy('created_at', 'desc')->get();
        return view('pesanan_pemilik', compact('pesanans'));
    }

    // Update status pesanan (aksi form submit dari pemilik)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,diproses,dikirim,selesai,batal',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('pemilik.pesanan.index')->with('success', 'Status pesanan berhasil diubah.');
    }
}
