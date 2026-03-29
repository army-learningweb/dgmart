<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'content',
        'status',
        'user_id',
        'category_id',
        'updated_at'
    ];

    function media(){
        return $this->hasOne('App\Models\Media','object_id');
    }

    function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
