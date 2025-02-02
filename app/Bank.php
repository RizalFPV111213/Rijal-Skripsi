<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'number',
        'description',
        'account_holder',
        'is_active'    
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
