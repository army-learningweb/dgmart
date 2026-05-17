<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'vote',
        'name',
        'job',
        'comment',
        'updated_at'
    ];

    function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
