<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryItemController
{
    public function index()
    {
        $items = GalleryItem::query()->orderBy('sort_order')->latest()->paginate(20);
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryItem::create([
            'title' => $validated['title'],
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item created.');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.edit', ['item' => $gallery]);
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $payload = [
            'title' => $validated['title'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $payload['image_path'] = $path;
        }

        $gallery->update($payload);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated.');
    }

    public function destroy(GalleryItem $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted.');
    }
}

