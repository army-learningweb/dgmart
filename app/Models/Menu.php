<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'order',
        'category_id',
        'user_id',
        'type',
        'status',
        'updated_at',
        'parent_id',
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
}
