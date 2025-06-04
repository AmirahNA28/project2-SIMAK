<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $laporan = LaporanKeuangan::orderBy('tanggal', 'desc')->get();
        return view('laporankeuangan', compact('laporan'));
    }

    public function create()
    {
        return view('laporankeuangan_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pendapatan' => 'nullable|numeric|min:0',
            'pengeluaran' => 'nullable|numeric|min:0',
        ]);

        LaporanKeuangan::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'pendapatan' => $request->pendapatan ?? 0,
            'pengeluaran' => $request->pengeluaran ?? 0,
        ]);

        return redirect()->route('laporankeuangan.index')->with('success', 'Data laporan keuangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = LaporanKeuangan::findOrFail($id);
        return view('laporankeuangan_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'pendapatan' => 'nullable|numeric|min:0',
            'pengeluaran' => 'nullable|numeric|min:0',
        ]);

        $data = LaporanKeuangan::findOrFail($id);
        $data->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'pendapatan' => $request->pendapatan ?? 0,
            'pengeluaran' => $request->pengeluaran ?? 0,
        ]);

        return redirect()->route('laporankeuangan.index')->with('success', 'Data laporan keuangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LaporanKeuangan::findOrFail($id);
        $data->delete();

        return redirect()->route('laporankeuangan.index')->with('success', 'Data laporan keuangan berhasil dihapus.');
    }
}
