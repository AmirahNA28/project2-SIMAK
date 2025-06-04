<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukSapisTable extends Migration
{
    public function up()
    {
        Schema::create('produk_sapis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('berat');
            $table->integer('umur');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk_sapis');
    }
}
