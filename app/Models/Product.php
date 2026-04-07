<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Media;

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
        'category_id'
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
}
