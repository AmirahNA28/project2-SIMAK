<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('alamat');
        $table->string('order_details');
        $table->string('kontak');
        $table->string('kategori_sapi')->nullable();
        $table->string('kategori_domba_kambing')->nullable();
        $table->integer('jumlah');
        $table->string('status_pengiriman')->default('Belum Dikirim');
        $table->timestamps();
    });
}
};
