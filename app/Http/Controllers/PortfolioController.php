<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Change the storage path to digita.idd/public/portfolios
            $image->move(base_path('../digita.idd/public/portfolios'), $imageName);
            $imagePath = 'portfolios/' . $imageName;
        }
        
        Portfolio::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath
        ]);

        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image && file_exists(base_path('../digita.idd/public/' . $portfolio->image))) {
                unlink(base_path('../digita.idd/public/' . $portfolio->image));
            }
    
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('../digita.idd/public/portfolios'), $imageName);
            $imagePath = 'portfolios/' . $imageName;
            
            $portfolio->image = $imagePath;
        }

        $portfolio->update([
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && file_exists(base_path('../digita.idd/public/' . $portfolio->image))) {
            unlink(base_path('../digita.idd/public/' . $portfolio->image));
        }
        $portfolio->delete();
        
        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus');
    }
}