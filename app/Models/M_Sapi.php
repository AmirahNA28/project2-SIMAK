<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Sapi extends Model
{
    protected $table = 'tb_sapis';
    protected $primaryKey = 'id_sapi';
    public $incrementing = false;
    public $timestamps = false;

    public function allData2()
    {
        return DB::select("SELECT 
            tb_sapis.id_sapi,
            tb_kandang.id_kandang, 
            tb_kandang.no_kandang,
            tb_sapis.jenis_sapi, 
            tb_sapis.berat,
            tb_sapis.tgl_masuk,
            tb_sapis.stok,
            tb_sapis.foto_sapi,  
        FROM tb_sapis 
        JOIN tb_kandang ON tb_sapis.id_kandang = tb_kandang.id_kandang ");
    }

    public function detailData($id_sapi)
    {
        return DB::table('tb_sapis')->where('id_sapi', $id_sapi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_sapis')->insert($data);
    }

    public function editData($id_sapi, $data)
    {
        DB::table('tb_sapis')->where('id_sapi', $id_sapi)->update($data);
    }

    public function deleteData($id_sapi)
    {
        DB::table('tb_sapis')->where('id_sapi', $id_sapi)->delete();
    }
}
