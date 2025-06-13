<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('photos.index', compact('photos'));
    }

    public function create(Gallery $gallery)
    {
        return view('photos.create', compact('gallery'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_id' => 'required|exists:galleries,id',
            'file' => 'nullable|image|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/photos', $filename);
        }

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'filename' => $filename,
            'gallery_id' => $request->gallery_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('gallery/show', $request->gallery_id)->with('success', 'Photo added.');
    }

    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|image|max:2048',
        ]);

        $photo->update($request->only('title', 'description'));

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/photos', $filename);
            $photo->filename = $filename;
            $photo->save();
        }

        return redirect()->route('photo/show', $photo)->with('success', 'Photo updated.');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('gallery/show', $photo->gallery_id)->with('success', 'Photo deleted.');
    }
}
