<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeKendaraan extends Model
{
    protected $table = 'tipe_kendaraan';
    protected $guarded = [];
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
