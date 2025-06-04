<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapisTable extends Migration
{
    public function up()
    {
        Schema::create('sapis', function (Blueprint $table) {
            $table->id(); // id-sapi
            $table->string('no_kandang');
            $table->string('nama_sapi');
            $table->string('jenis_sapi');
            $table->string('pakan');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->string('status_kesehatan');
            $table->string('foto_sapi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sapis');
    }
}