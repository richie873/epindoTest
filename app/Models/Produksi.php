<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';

    protected $fillable = [
        'incoming_id',
        'produk_nama',
        'jumlah_produksi',
        'tanggal_produksi',
        'diproduksi_oleh',
    ];

    public function incoming()
    {
        return $this->belongsTo(Incoming::class);
    }
}
