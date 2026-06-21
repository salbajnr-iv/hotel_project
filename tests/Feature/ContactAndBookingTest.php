<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Room;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactAndBookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_contact_persists_contact_message(): void
    {
        $payload = [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'subject' => 'Booking question',
            'message' => 'Hello, I have a question about availability.',
        ];

        $this->post(route('contact.store'), $payload)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john@example.com',
            'full_name' => 'John Doe',
            'status' => 'new',
            'message' => $payload['message'],
        ]);
    }

    public function test_store_contact_validation_fails_on_invalid_payload(): void
    {
        $this->post(route('contact.store'), [
            'full_name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ])->assertSessionHasErrors(['full_name', 'email', 'message']);
    }

    public function test_store_booking_persists_booking(): void
    {
        $room = Room::factory()->create(['status' => 'active']);

        $today = now()->toDateString();
        $arrival = now()->addDay()->toDateString();
        $departure = now()->addDays(3)->toDateString();

        $payload = [
            'room_id' => $room->id,
            'arrival' => $arrival,
            'departure' => $departure,
            'full_name' => 'Jane Guest',
            'email' => 'jane@example.com',
            'phone' => '555555555',
            'notes' => 'Late check-in',
        ];

        $this->post(route('book.store'), $payload)
            ->assertSessionHas('booking_success')
            ->assertRedirect(route('booking.create', ['room_id' => $room->id]));

        $this->assertDatabaseHas('bookings', [
            'room_id' => $room->id,
            // booking dates are stored as full datetimes
            'arrival' => $arrival . ' 00:00:00',
            'departure' => $departure . ' 00:00:00',

            'full_name' => 'Jane Guest',
            'email' => 'jane@example.com',
            'phone' => '555555555',
            'status' => 'pending',
        ]);
    }

    public function test_store_booking_validation_fails_when_departure_before_arrival(): void
    {
        $room = Room::factory()->create(['status' => 'active']);

        $arrival = now()->addDays(3)->toDateString();
        $departure = now()->addDays(2)->toDateString();

        $this->post(route('book.store'), [
            'room_id' => $room->id,
            'arrival' => $arrival,
            'departure' => $departure,
            'full_name' => 'Jane Guest',
            'email' => 'jane@example.com',
            'phone' => '555555555',
        ])->assertSessionHasErrors(['departure']);
    }
}

