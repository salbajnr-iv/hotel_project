<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request, ?int $room_id = null)
    {
        $rooms = Room::query()
            ->where('status', 'active')
            ->orderBy('id')
            ->get();

        $selectedRoom = $room_id ? Room::find($room_id) : null;

        return view('home.booking', compact('rooms', 'selectedRoom'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => ['nullable', 'exists:rooms,id'],
            'arrival' => ['required', 'date', 'after_or_equal:today'],
            'departure' => ['required', 'date', 'after:arrival'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $booking = Booking::create([
            'room_id' => $validated['room_id'] ?? null,
            'arrival' => $validated['arrival'],
            'departure' => $validated['departure'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        $request->session()->flash(
            'booking_success',
            'Booking request created successfully. Booking #'.($booking->id).'.'
        );

        return redirect()->route('booking.create', ['room_id' => $validated['room_id'] ?? null]);
    }
}

