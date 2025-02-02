<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'package_id',
        'bank_id',
        'tanggal_booking',
        'pesan',
        'status'
    ];

    protected $dates = [
        'tanggal_booking'
    ];
}
