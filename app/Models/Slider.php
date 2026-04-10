<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\User;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'order',
        'status',
        'updated_at',
        'user_id'
    ];

    function media(){
        return $this->hasOne(Media::class,'object_id');
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
