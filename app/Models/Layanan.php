<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $guarded = [];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
