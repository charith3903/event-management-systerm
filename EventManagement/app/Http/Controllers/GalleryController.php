<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; // Add this import statement

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $galleries = auth()->user()->galleries;
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            auth()->user()->galleries()->create([
                'caption' => $request->input('caption'),
                'image' => $request->file('image')->store('galleries', 'public'),
            ]);

            return to_route('galleries.index');
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery): View
    {
        return view('galleries.edit', compact('gallery'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $path = $gallery->image;
        $request->validate([
            'caption' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
            Storage::delete($gallery->image);
            $path =  $request->file('image')->store('galleries', 'public');
        }

        $gallery->update([
            'caption' => $request->input('caption'),
            'image' => $path,
        ]);

        return to_route('galleries.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();

        return back();
    }
    
}
