<?php

use App\Models\Admin;
use App\Models\Pelanggan;
use App\User;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
            'username' => 'pelanggan',
            'password' => bcrypt('pelanggan'),
            'email' => 'pelanggan@gmail.com',
            'nama' => 'Pelanggan Anam',
            'alamat' => 'Jakarta Selatan',
            'no_telp' => '085788992233',
        ]);
    }
}
