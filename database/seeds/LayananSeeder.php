<?php

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan::create([
            'nama' => 'OVERHAUL',
            'dari_harga' => '2.500.000',
            'sampai_harga' => '5.000.000',
        ]);
        Layanan::create([
            'nama' => 'ELECTRICAL',
            'dari_harga' => '50.000',
            'sampai_harga' => '5.000.000',
        ]);
        Layanan::create([
            'nama' => 'TUNE UP',
            'dari_harga' => '400.000',
            'sampai_harga' => '500.000',
        ]);
    }
}
