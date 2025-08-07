<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    protected $table = 'incoming';
    protected $fillable = [
        'material_name',
        'material_type',
        'unit',
        'quantity',
        'received_date',
        'received_by',
    ];
}
