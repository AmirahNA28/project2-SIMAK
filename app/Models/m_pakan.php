<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_pakan extends Model
{
    use HasFactory;

    protected $table = 'tb_pakan2';
    protected $primaryKey = 'id_pakan';
    public $timestamps = false;

    protected $fillable = [
        'jenis_pakan', 'harga', 'foto_pakan'
    ];
}

