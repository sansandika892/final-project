<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use Illuminate\Support\Facades\Storage;

class AttractionController extends Controller

{
    public function index()
    {
        $attractions = Attraction::all();

        return view('admin.pages.attractions.index', compact('attractions'));
    }

    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('admin.pages.attractions.show', compact('attraction'));
    }

    public function create()
    {
         return view('admin.pages.attractions.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }

        Attraction::create($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction created successfully.');
    }

    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('admin.pages.attractions.edit', compact('attraction'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);
        
        if ($request->hasFile('image')) {
            if ($attraction->image) {
                Storage::disk('public')->delete('images/' . $attraction->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }

        $attraction->update($validated);

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction updated successfully.');
    }

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);

        if ($attraction->image) {
            Storage::disk('public')->delete('images/' . $attraction->image);
        }

        $attraction->delete();

        return redirect()->route('admin.attractions.index')->with('success', 'Attraction deleted successfully.');
    }
}   

