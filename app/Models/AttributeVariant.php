<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeVariant extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'desc',
        'updated_at'
    ];
}
