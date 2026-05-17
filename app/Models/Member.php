<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'tel',
        'address',
        'email',
        'password',
        'role',
        'updated_at'
    ];
}
