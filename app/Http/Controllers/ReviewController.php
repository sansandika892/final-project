<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;


class ReviewController extends Controller



{
    public function index()
    {
        $reviews = Reviews::all();
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.pages.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewer' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        Reviews::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }
}