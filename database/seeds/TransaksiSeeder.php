<?php

use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::create([
            'admin_id' => '1',
            'pelanggan_id' => '1',
            'tipe_kendaraan_id' => '1',
            'waktu' => date('Y-m-d H:i:s'),
            'layanan_id' => '1',
            'status' => 'menunggu',
            'alamat' => 'Jakarta',
            'no_telp' => '0857282828',
            'tipe' => 'Wagon R',
            'plat' => 'P 1708 PF',
        ]);
    }
}
