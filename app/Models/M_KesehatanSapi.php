<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_KesehatanSapi extends Model
{
    protected $table = 'kesehatan_sapi';     // nama tabel
    protected $primaryKey = 'id_kesehatan';  // primary key
    public $incrementing = false;             // kalau id_kesehatan bukan auto increment
    public $timestamps = false;                // kalau gak ada kolom created_at updated_at

    // Ambil semua data (bisa ditambah join ke tb_sapis kalau perlu)
    public function allData()
    {
        return DB::table('kesehatan_sapi')
            ->join('tb_sapis', 'kesehatan_sapi.id_sapi', '=', 'tb_sapis.id_sapi')
            ->select(
                'kesehatan_sapi.id_kesehatan',
                'kesehatan_sapi.id_sapi',
                'tb_sapis.jenis_sapi',
                'kesehatan_sapi.tgl_pemeriksaan',
                'kesehatan_sapi.status_kesehatan',
                'kesehatan_sapi.tindakan',
                'kesehatan_sapi.nama_obat'
            )
            ->get();
    }

    // Detail data berdasarkan id_kesehatan
    public function detailData($id_kesehatan)
    {
        return DB::table('kesehatan_sapi')->where('id_kesehatan', $id_kesehatan)->first();
    }

    // Tambah data
    public function addData($data)
    {
        DB::table('kesehatan_sapi')->insert($data);
    }

    // Update data
    public function editData($id_kesehatan, $data)
    {
        DB::table('kesehatan_sapi')->where('id_kesehatan', $id_kesehatan)->update($data);
    }

    // Hapus data
    public function deleteData($id_kesehatan)
    {
        DB::table('kesehatan_sapi')->where('id_kesehatan', $id_kesehatan)->delete();
    }
}
