<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Package::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('packages.index')
            ->with('success', 'Package berhasil ditambahkan');
    }
    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $package->title = $request->title;
        $package->slug = Str::slug($request->title);
        $package->description = $request->description;
        $package->price = $request->price;
        $package->save();

        return redirect()->route('packages.index')
            ->with('success', 'Package berhasil diupdate');
    }

    public function destroy(Package $package)
    {        
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Package berhasil dihapus');
    }
}
