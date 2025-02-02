<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($portfolio) {
            $portfolio->slug = Str::slug($portfolio->title);
        });
    }
}