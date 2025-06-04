<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Sapi', 'image' => 'sapi2.png'],
            ['name' => 'Domba / Kambing', 'image' => 'domba_kambing2.png'],
        ];

        return view('products', compact('products'));
    }
}
