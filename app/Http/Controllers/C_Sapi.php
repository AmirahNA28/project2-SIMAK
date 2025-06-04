<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_Sapi;

class C_Sapi extends Controller
{
    protected $M_Sapi;

    public function __construct()
    {
        $this->M_Sapi = new M_Sapi();
    }

    public function index()
    {
        $data = [
            'sapi' => DB::table('tb_sapis')
                ->join('tb_kandang', 'tb_sapis.id_kandang', '=', 'tb_kandang.id_kandang')
                ->select('tb_sapis.*', 'tb_kandang.no_kandang')
                ->get()
        ];

        return view('v_sapi', $data); // ✅ Kirim $sapi ke view
    }


    public function printHtml()
    {
        $data = [
            'sapi' => DB::table('tb_sapis')
                ->join('tb_kandang', 'tb_sapis.id_kandang', '=', 'tb_kandang.id_kandang')
                ->select('tb_sapis.*', 'tb_kandang.no_kandang')
                ->get()
        ];

        return view('v_printsapi', $data);
    }


    public function data_sapi()
    {
        $data = [
            'sapi' => DB::table('tb_sapis')
                ->join('tb_kandang', 'tb_sapis.id_kandang', '=', 'tb_kandang.id_kandang')
                ->select('tb_sapis.*', 'tb_kandang.no_kandang')
                ->get()
        ];

        return view('v_sapi', $data);
    }

    public function detail($id_sapi)
    {
        if (!$this->M_Sapi->detailData($id_sapi)) {
            abort(404);
        }

        $data = [
            'sapi' => $this->M_Sapi->detailData($id_sapi)
        ];

        return view('v_sapi_detail', $data);
    }

    public function add()
    {
        $data = [
            'kandang' => DB::table('tb_kandang')->get(),
        ];

        return view('v_sapi_add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'id_sapi' => 'required|unique:tb_sapis,id_sapi',
            'id_kandang' => 'required|exists:tb_kandang,id_kandang',
            'jenis_sapi' => 'required',
            'berat' => 'required|int',
            'tgl_masuk' => 'required|date',
            'stok' => 'required|int',
            'foto_sapi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kandang = DB::table('tb_kandang')->where('id_kandang', $request->id_kandang)->first();

        $file = $request->file('foto_sapi');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto_sapi'), $filename);

        $data = [
            'id_sapi' => $request->id_sapi,
            'id_kandang' => $request->id_kandang,
            'jenis_sapi' => $request->jenis_sapi,
            'berat' => $request->berat,
            'tgl_masuk' => $request->tgl_masuk,
            'stok' => $request->stok,
            'foto_sapi' => $filename,
        ];

        $this->M_Sapi->addData($data);

        return redirect('/sapi')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id_sapi)
    {
        if (!$this->M_Sapi->detailData($id_sapi)) {
            abort(404);
        }

        $data = [
            'sapi' => $this->M_Sapi->detailData($id_sapi),
            'kandang' => DB::table('tb_kandang')->get(),
        ];

        return view('v_sapi_edit', $data);
    }


    public function update(Request $request, $id_sapi)
    {
        if ($request->hasFile('foto_sapi')) {
            $file = $request->file('foto_sapi');
            $fileName = $request->nidn . '.' . $file->extension();
            $file->move(public_path('foto_sapi'), $fileName);

            $data = [
            'id_sapi' => $request->id_sapi,
            'id_kandang' => $request->id_kandang,
            'jenis_sapi' => $request->jenis_sapi,
            'berat' => $request->berat,
            'tgl_masuk' => $request->tgl_masuk,
            'stok' => $request->stok,
            'foto_sapi' => $filename,
            ];
        } else {
            $data = [
            'id_sapi' => $request->id_sapi,
            'id_kandang' => $request->id_kandang,
            'jenis_sapi' => $request->jenis_sapi,
            'berat' => $request->berat,
            'tgl_masuk' => $request->tgl_masuk,
            'stok' => $request->stok,
            ];
        }

        $this->M_Sapi->editData($id_sapi, $data);

        return redirect()->route('data_sapi')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($id_sapi)
    {
        $sapi = $this->M_Sapi->detailData($id_sapi);
        if ($sapi && $sapi->foto_sapi && file_exists(public_path('foto_sapi/' . $sapi->foto_sapi))) {
            unlink(public_path('foto_sapi/' . $sapi->foto_sapi));
        }

        $this->M_Sapi->deleteData($id_sapi);

        return redirect()->route('data_sapi')->with('pesan', 'Data berhasil dihapus!');
    }

    
}