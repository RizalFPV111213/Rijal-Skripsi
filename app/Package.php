<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'is_active'
    ];

    // Auto-generate slug before saving
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($package) {
            $package->slug = Str::slug($package->title);
        });
    }
}
