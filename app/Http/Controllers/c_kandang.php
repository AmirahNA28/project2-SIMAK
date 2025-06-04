<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_kandang;

class c_kandang extends Controller
{
    public function index()
    {
        $kandang = m_kandang::all();
        return view('v_kandang', compact('kandang'));
    }

    public function detail($id_kandang)
    {
        $kandang = m_kandang::findOrFail($id_kandang);
        return view('v_kandang_detail', compact('kandang'));
    }

    public function create()
    {
        return view('v_kandang_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kandang' => 'required|string|unique:tb_kandang,id_kandang',
            'no_kandang' => 'required|string|max:255',
            'berat' => 'required|string',
        ]);

        m_kandang::create([
            'id_kandang' => $request->id_kandang,
            'no_kandang' => $request->no_kandang,
            'berat' => $request->berat,
        ]);

        return redirect()->route('kandang.index')->with('success', 'Data kandang berhasil ditambahkan!');
    }

    public function edit($id_kandang)
    {
        $kandang = m_kandang::findOrFail($id_kandang);
        return view('v_kandang_edit', compact('kandang'));
    }

    public function update(Request $request, $id_kandang)
    {
        $request->validate([
            'no_kandang' => 'required|string|max:255',
            'berat' => 'required|string|max:255',
        ]);

        $kandang = m_kandang::findOrFail($id_kandang);

        $kandang->update([
            'no_kandang' => $request->no_kandang,
            'berat' => $request->berat,
        ]);

        return redirect()->route('kandang.index')->with('success', 'Data kandang berhasil diperbarui!');
    }

    public function delete($id_kandang)
    {
        $kandang = m_kandang::findOrFail($id_kandang);
        $kandang->delete();

        return redirect()->route('kandang.index')->with('success', 'Data berhasil dihapus!');
    }
}
