<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_kandang extends Model
{
    use HasFactory;

    protected $table = 'tb_kandang'; 
    public $timestamps = false;

    protected $primaryKey = 'id_kandang';  // Jika primary key bukan 'id', definisikan ini

    protected $fillable = [
        'id_kandang',  // biasanya id tidak perlu di-fillable jika auto increment, tapi jika memang diisi manual bisa disertakan
        'no_kandang',
        'berat'
    ];

    // Relasi ini kelihatannya salah karena model ini merefer ke dirinya sendiri
    // Jika tidak ada relasi lain, bisa dihapus atau diperbaiki sesuai kebutuhan
    /*
    public function kandang()
    {
        return $this->belongsTo(m_kandang::class, 'id');
    }
    */
}
