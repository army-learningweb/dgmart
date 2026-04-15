<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
}

