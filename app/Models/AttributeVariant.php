<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeVariant extends Model
{
    protected $fillable = [
        'attribute_id',
        'variant_id',
        'updated_at'
    ];
}
