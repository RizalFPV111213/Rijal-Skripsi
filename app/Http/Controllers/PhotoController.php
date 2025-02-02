<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Bank;

class PhotoController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $banks = Bank::all();
        
        return view('user.photographer', compact('packages', 'banks'));
    }

    public function show($id)
    {
        $package = Package::find($id);

        return view('user.photographer', compact('package'));
    }
}
