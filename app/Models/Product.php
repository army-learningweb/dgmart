<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Media;
use Attribute;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'desc',
        'price',
        'sale_off',
        'slug',
        'price_sale_off',
        'up_sales',
        'vote',
        'sold',
        'user_id',
        'category_id',
        'attribute_id',
        'quantity'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function medias(){
        return $this->hasMany(Media::class,'object_id');
    }

    function variants(){
        return $this->belongsToMany(Variant::class,'product_variants');
    }

    function attributes(){
        return $this->belongsTo(Attribute::class,'product_attributes');
    }

    function order(){
        return $this->hasOne(order_item::class,'order_id');
    }
}
