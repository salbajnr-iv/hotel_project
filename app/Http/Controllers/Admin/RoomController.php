<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController
{
    public function index()
    {
        $rooms = Room::query()->latest()->paginate(20);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
        }

        Room::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'capacity' => $validated['capacity'],
            'price_per_night' => $validated['price_per_night'],
            'image_path' => $imagePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room created.');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', ['room' => $room]);
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $payload = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'capacity' => $validated['capacity'],
            'price_per_night' => $validated['price_per_night'],
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image')) {
            $payload['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        $room->update($payload);

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted.');
    }
}

