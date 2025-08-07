<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'production_id',
        'customer_name',
        'quantity_sold',
        'price',
        'invoice_date',
        'issued_by',
    ];

public function produksi()
{
    return $this->belongsTo(Produksi::class, 'production_id');
}

}
