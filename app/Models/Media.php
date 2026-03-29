<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'url',
        'name',
        'extension',
        'size',
        'type',
        'object_id',
        'user_id',
        'updated_at'
    ];
}
