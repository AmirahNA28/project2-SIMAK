<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKesehatan;
use App\Models\C_Sapi;

class C_JadwalKesehatan extends Controller
{
    public function index()
    {
        $jadwals = JadwalKesehatan::with('sapi')->orderBy('tanggal_pemeriksaan', 'desc')->paginate(10);
        return view('jadwal_kesehatan', compact('jadwals'));
    }

    public function create()
    {
        $sapis = C_Sapi::all();
        return view('jadwal_kesehatan.create', compact('sapis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_sapi' => 'required|exists:tb_sapis,id',
        'tanggal_pemeriksaan' => 'required|date',
        'keterangan' => 'nullable|string|max:255',
    ]);

    // Simpan jadwal pertama
    $jadwal = JadwalKesehatan::create([
        'id_sapi' => $request->id_sapi,
        'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
        'keterangan' => $request->keterangan,
        'status' => 'belum',
    ]);

    // Buat jadwal selanjutnya 2 minggu kemudian (14 hari)
    $tanggalSelanjutnya = date('Y-m-d', strtotime($request->tanggal_pemeriksaan . ' +14 days'));

    JadwalKesehatan::create([
        'id_sapi' => $request->id_sapi,
        'tanggal_pemeriksaan' => $tanggalSelanjutnya,
        'keterangan' => 'Jadwal otomatis 2 minggu setelah ' . $request->tanggal_pemeriksaan,
        'status' => 'belum',
    ]);

    return redirect()->route('jadwal_kesehatan')->with('success', 'Jadwal kesehatan berhasil ditambahkan beserta jadwal otomatis 2 minggu kemudian');
}


    public function edit($id)
    {
        $jadwal = JadwalKesehatan::findOrFail($id);
        $sapis = C_Sapi::all();
        return view('jadwal_kesehatan.edit', compact('jadwal', 'sapis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_sapi' => 'required|exists:tb_sapis,id',
            'tanggal_pemeriksaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'status' => 'required|in:belum,selesai',
        ]);

        $jadwal = JadwalKesehatan::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal_kesehatan')->with('success', 'Jadwal kesehatan berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = JadwalKesehatan::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal_kesehatan')->with('success', 'Jadwal kesehatan berhasil dihapus');
    }
}
