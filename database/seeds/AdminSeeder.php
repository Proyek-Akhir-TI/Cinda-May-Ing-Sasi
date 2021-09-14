<?php

use App\Models\Admin;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'nama' => 'Admin Cinda',
            'alamat' => 'Jakarta Selatan',
            'no_telp' => '085788992233',
        ]);
    }
}
