<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_pakan;

class c_pakan extends Controller
{
    public function index()
    {
        $pakan = m_pakan::all();
        return view('v_pakan', compact('pakan'));
    }

    public function create()
    {
        return view('v_pakan_add'); // Form tambah pakan
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pakan' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'foto_pakan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto_pakan = 'default.jpg';
        if ($request->hasFile('foto_pakan')) {
            $file = $request->file('foto_pakan');
            $foto_pakan = time() . '_' . $request->jenis_pakan . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_pakan'), $foto_pakan);
        }

        m_pakan::create([
            'jenis_pakan' => $request->jenis_pakan,
            'harga' => $request->harga,
            'foto_pakan' => $foto_pakan,
        ]);

        return redirect()->route('pakan.index')->with('success', 'Data pakan berhasil ditambahkan!');
    }

    public function detail($id_pakan)
    {
        $pakan = m_pakan::findOrFail($id_pakan);
        return view('v_pakan_detail', compact('pakan'));
    }

    public function edit($id_pakan)
    {
        $pakan = m_pakan::findOrFail($id_pakan);
        return view('v_pakan_edit', compact('pakan'));
    }

    public function update(Request $request, $id_pakan)
    {
        $request->validate([
            'jenis_pakan' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'foto_pakan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pakan = m_pakan::findOrFail($id_pakan);

        if ($request->hasFile('foto_pakan')) {
            if ($pakan->foto_pakan && file_exists(public_path('foto_pakan/' . $pakan->foto_pakan))) {
                unlink(public_path('foto_pakan/' . $pakan->foto_pakan));
            }

            $file = $request->file('foto_pakan');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_pakan'), $fileName);
        } else {
            $fileName = $pakan->foto_pakan;
        }

        $pakan->update([
            'jenis_pakan' => $request->jenis_pakan,
            'harga' => $request->harga,
            'foto_pakan' => $fileName,
        ]);

        return redirect()->route('pakan.index')->with('success', 'Data pakan berhasil diperbarui!');
    }

    public function delete($id_pakan)
    {
    $pakan = m_pakan::find($id_pakan);
    if (!$pakan) {
        return redirect()->route('pakan.index')->with('error', 'Data pakan tidak ditemukan!');
    }

    // Hapus file foto jika ada
    if ($pakan->foto_pakan && file_exists(public_path('foto_pakan/' . $pakan->foto_pakan))) {
        unlink(public_path('foto_pakan/' . $pakan->foto_pakan));
    }

    $pakan->delete();

    return redirect()->route('pakan.index')->with('success', 'Data pakan berhasil dihapus!');
}


}
