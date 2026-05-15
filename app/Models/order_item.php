<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'updated_at',
        'options'
    ];

    function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
