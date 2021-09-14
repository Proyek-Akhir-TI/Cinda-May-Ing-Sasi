<?php

use App\Models\TipeKendaraan;
use Illuminate\Database\Seeder;

class TipeKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeKendaraan::create([
            'nama' => 'Mobil'
        ]);
        TipeKendaraan::create([
            'nama' => 'Motor'
        ]);
        TipeKendaraan::create([
            'nama' => 'Perahu'
        ]);
    }
}
