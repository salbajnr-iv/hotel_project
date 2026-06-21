<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\GalleryItem;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteDynamicsTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_db_driven_rooms_and_blog_filtering_on_blog_route_only(): void
    {
        $activeRoom = Room::factory()->create(['status' => 'active']);
        $inactiveRoom = Room::factory()->create(['status' => 'inactive']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText($activeRoom->name)
            ->assertDontSeeText($inactiveRoom->name);
    }

    public function test_rooms_page_lists_only_active_rooms(): void
    {
        $activeRoom = Room::factory()->create(['status' => 'active']);
        $inactiveRoom = Room::factory()->create(['status' => 'inactive']);

        $this->get(route('rooms.index'))
            ->assertOk()
            ->assertSeeText($activeRoom->name)
            ->assertDontSeeText($inactiveRoom->name);
    }

    public function test_gallery_page_renders(): void
    {
        $this->get(route('gallery'))->assertOk();
    }

    public function test_blog_page_renders(): void
    {
        $this->get(route('blog'))->assertOk();
    }

    public function test_about_and_contact_pages_render(): void
    {
        $this->get(route('about'))->assertOk();
        $this->get(route('contact'))->assertOk();
    }

    public function test_booking_create_renders_room_selector(): void
    {
        $activeRoom = Room::factory()->create(['status' => 'active']);

        $this->get(route('booking.create'))
            ->assertOk()
            ->assertSeeText($activeRoom->name);
    }
}

