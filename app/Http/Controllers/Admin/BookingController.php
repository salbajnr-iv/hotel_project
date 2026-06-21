<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController
{
    public function index()
    {
        $bookings = Booking::query()->latest()->paginate(20);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'max:50'],
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted.');
    }
}

