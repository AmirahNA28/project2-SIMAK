<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_KesehatanSapi;
use App\Models\M_Sapi;

class C_KesehatanSapi extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new M_KesehatanSapi();
    }

    // Tampilkan semua data kesehatan sapi
    public function index()
    {
        $kesehatan = $this->model->allData();
        return view('v_kesehatan_sapi', compact('kesehatan'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $sapi = M_Sapi::all(); // ambil data sapi
        return view('v_kesehatan_sapi_add', compact('sapi'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_kesehatan' => 'required|unique:kesehatan_sapi,id_kesehatan',
            'id_sapi' => 'required',
            'tgl_pemeriksaan' => 'required|date',
            'status_kesehatan' => 'required|string',
            'tindakan' => 'nullable|string',
            'nama_obat' => 'nullable|string',
        ]);

        $this->model->addData($data);

        return redirect()->route('v_kesehatan_sapi')->with('success', 'Data berhasil ditambah');
    }

    // Tampilkan detail data
    public function show($id_kesehatan)
    {
        $detail = $this->model->detailData($id_kesehatan);
        if (!$detail) abort(404);

        // Kirim variabel dengan nama 'kesehatan' agar bisa dipakai di view
        return view('v_kesehatan_sapi_detail', ['kesehatan' => $detail]);
    }

    // Tampilkan form edit
    public function edit($id_kesehatan)
    {
        $data = $this->model->detailData($id_kesehatan);
        if (!$data) abort(404);

        $sapi = M_Sapi::all(); // ambil data sapi utk dropdown
        return view('v_kesehatan_sapi_edit', compact('data', 'sapi'));
    }

    // Update data
    public function update(Request $request, $id_kesehatan)
    {
        $data = $request->validate([
            'id_sapi' => 'required',
            'tgl_pemeriksaan' => 'required|date',
            'status_kesehatan' => 'required|string',
            'tindakan' => 'nullable|string',
            'nama_obat' => 'nullable|string',
        ]);

        $this->model->editData($id_kesehatan, $data);

        return redirect()->route('kesehatan.index')->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy($id_kesehatan)
    {
        $this->model->deleteData($id_kesehatan);
        return redirect()->route('kesehatan.index')->with('success', 'Data berhasil dihapus');
    }
}
