<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->references('id')->on('admin')->onDelete('cascade');
            $table->foreignId('pelanggan_id')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreignId('tipe_kendaraan_id')->references('id')->on('tipe_kendaraan')->onDelete('cascade');
            // $table->foreignId('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
            $table->string('tipe');
            $table->string('plat');
            $table->datetime('waktu');
            $table->text('alamat');
            $table->string('no_telp');
            $table->text('alasan')->nullable();
            $table->enum('status', ['menunggu', 'diproses', 'selesai', 'cancel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
