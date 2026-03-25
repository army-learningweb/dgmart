<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('\App\Models\User');
    }
}

