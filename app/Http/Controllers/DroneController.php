<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DroneController extends Controller
{
    public function drone()
    {
        return view('user/drone');
    }
}
