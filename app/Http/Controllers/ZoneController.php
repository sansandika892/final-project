<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword != '') {
            $zones = Zone::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $zones = Zone::orderBy('id')->paginate(5);
        }

        return view('admin.pages.zones.index', compact('zones'));
    }

    public function show($id)
    {
        $zone = Zone::findOrFail($id);
        return view('pages.zones.detail', compact('zone'));
    }

    public function create()
    {
         return view('admin.pages.zones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_range' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }


        return redirect()->route('admin.zones.index')->with('success', 'Zone created successfully.');
    }

    public function edit($id)
    {
        $zone = Zone::findOrFail($id);
        return view('pages.zones.edit', compact('zone'));
    }

    public function update(Request $request, $id)
    {
        $zone = Zone::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_range' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            if ($zone->image) {
                Storage::disk('public')->delete('images/' . $zone->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }

        $zone->update($validated);

        return redirect()->route('zones.index')->with('success', 'Zone updated successfully.');
    }

    public function destroy($id)
    {
        $zone = Zone::findOrFail($id);

        if ($zone->image) {
            Storage::disk('public')->delete('images/' . $zone->image);
        }

        $zone->delete();

        return redirect()->route('zones.index')->with('success', 'Zone deleted successfully.');
    }
}   