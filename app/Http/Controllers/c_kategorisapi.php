<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_kategorisapi extends Controller
{
    public function index()
    {
    $kategorisapi = [
            ['no' => 1, 'image' => 'sapi2.png','berat' => '200 - 225 Kg'],
            ['no' => 2, 'image' => 'sapi2.png','berat' => '226 - 250 Kg'],
            ['no' => 3, 'image' => 'sapi2.png','berat' => '251 - 300 Kg'],
            ['no' => 4, 'image' => 'sapi2.png', 'berat' => '301 - 350 Kg'],
            ['no' => 5, 'image' => 'sapi2.png','berat' => '351 - 400 Kg'],
            ['no' => 6, 'image' => 'sapi2.png','berat' => '> 400 Kg'],
        ];

    return view('kategorisapi', compact('kategorisapi'));
    }
}
