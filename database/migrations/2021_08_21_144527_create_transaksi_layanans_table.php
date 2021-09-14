<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreignId('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['transaksi_id','layanan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_layanans');
    }
}
