<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Media;

class Category extends Model
{
    protected $fillable = [
        'name',
        'type',
        'slug',
        'parent_id',
        'user_id',
        'status',
        'updated_at'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function media(){
        return $this->hasOne(Media::class,'object_id');
    }

    function products(){
        return $this->hasMany(Product::class);
    }

    function childs(){
        return $this->hasMany(Category::class,'parent_id');
    }

    function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
}

