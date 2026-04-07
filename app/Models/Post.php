<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Media;

class Post extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'content',
        'slug',
        'status',
        'user_id',
        'category_id',
        'updated_at'
    ];

    function media(){
        return $this->hasOne(Media::class,'object_id');
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
