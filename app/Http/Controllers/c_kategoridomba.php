<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_kategoridomba extends Controller
{
    public function index()
    {
    $kategoridomba = [
            ['no' => 1, 'image' => 'domba_kambing2.png','berat' => '20 - 25 Kg'],
            ['no' => 2, 'image' => 'domba_kambing2.png','berat' => '26 - 30 Kg'],
            ['no' => 3, 'image' => 'domba_kambing2.png','berat' => '31 - 35 Kg'],
            ['no' => 4, 'image' => 'domba_kambing2.png', 'berat' => '35 - 40 Kg'],
            ['no' => 5, 'image' => 'domba_kambing2.png','berat' => '41 - 50 Kg'],
        ];

    return view('kategoridomba', compact('kategoridomba'));
    }
}
