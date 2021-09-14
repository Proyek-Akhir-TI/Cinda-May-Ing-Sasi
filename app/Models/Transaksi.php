<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Transaksi extends Model
{
    protected $table = 'transaksi',
    $fillable = [
        'pelanggan_id',
        'tipe',
        'plat',
        'alamat',
        'no_telp',
        'tipe_kendaraan_id',
        'waktu',
        'status',
        'alasan'
    ];

    // protected static function boot(): void
    // {
    //     parent::boot();
    //     // Self invoke ketika create
    //     static::creating(function ($transaksi_admin) {
    //         $transaksi_admin->admin_id = $transaksi_admin->admin_id ?? Auth::guard('admin')->user()->id;
    //     });

    //     static::updating(function ($transaksi_admin) {
    //         $transaksi_admin->admin_id = $transaksi_admin->admin_id ?? Auth::guard('admin')->user()->id;
    //         // $transaksi->saveQuietly();
    //     });
    // }
    
    protected static function booted(): void
    {
        // Self invoke ketika create
        static::creating(function ($transaksi) {
            $transaksi->pelanggan_id = $transaksi->pelanggan_id ?? Auth::guard('pelanggan')->user()->id;
            $transaksi->status = 'menunggu';
        });

        static::updating(function ($transaksi) {
            $transaksi->pelanggan_id = $transaksi->pelanggan_id ?? Auth::guard('pelanggan')->user()->id;
            // $transaksi->saveQuietly();
        });
    }
    

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function tipeKendaraan()
    {
        return $this->belongsTo(TipeKendaraan::class);
    }

    // public function layanan()
    // {
    //     return $this->belongsTo(Layanan::class);
    // }

    /**
     * Get all of the transaksiLayanan for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaksiLayanan(): HasMany
    {
        return $this->hasMany(TransaksiLayanan::class);
    }
    
    /**
     * The layanan that belong to the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function layanan(): BelongsToMany
    {
        return $this->belongsToMany(Layanan::class, with(new TransaksiLayanan)->getTable());
    }
}
