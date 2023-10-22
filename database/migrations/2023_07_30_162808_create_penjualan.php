<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->string('jumlah_penjualan');
            $table->string('harga_jual');
            $table->string('id_pengguna');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id_pengguna')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
