<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Dosen extends Model
{
    public function allData(){
        return[
            [
                'NIP' => '199009094234888',
                'Nama' => 'Alexander',
                'Mata kuliah' => 'Pemrograman Web'
            ],
            [
                'NIP' => '198809098759876',
                'Nama' => 'Michele',
                'Mata kuliah' => 'Matematika Diskrit'
            ],
            [
                'NIP' => '1988090942344256',
                'Nama' => 'Christopher',
                'Mata kuliah' => 'Pemrograman Berorientasi Objek'
            ]
        ];
    }
}
