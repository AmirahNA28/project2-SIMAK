<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSapi extends Model
{
    use HasFactory;
    protected $table = 'kategori_sapi';
    protected $fillable = ['berat', 'stok'];
}
