<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'tel',
        'note',
        'payment_method',
        'code',
        'quantity',
        'price',
        'status',
        'updated_at'
    ];
}
