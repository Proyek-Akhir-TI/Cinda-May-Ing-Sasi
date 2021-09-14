<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiLayanan extends Model
{
    protected $fillable = ['transaksi_id','layanan_id'];

    /**
     * Get the transaksi that owns the TransaksiLayanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }

    /**
     * Get the layanan that owns the TransaksiLayanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
