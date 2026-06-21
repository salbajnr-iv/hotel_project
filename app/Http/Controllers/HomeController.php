<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

use App\Models\GalleryItem;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $rooms = Room::query()
            ->where('status', 'active')
            ->latest('id')
            ->take(6)
            ->get();

        $gallery = GalleryItem::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->latest('id')
            ->take(12)
            ->get();

        $posts = BlogPost::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('home.index', compact('rooms', 'gallery', 'posts'));
    }

    public function rooms()
    {
        $rooms = Room::query()
            ->where('status', 'active')
            ->orderBy('id')
            ->get();

        return view('home.room', compact('rooms'));
    }

    public function gallery()
    {
        $items = GalleryItem::query()
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        return view('home.gallery', compact('items'));
    }

    public function blog()
    {
        $posts = BlogPost::query()
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('home.blog', compact('posts'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        \App\Models\ContactMessage::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()->back()->with('contact_success', 'Message sent successfully.');
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        return redirect()->back()->with('newsletter_success', 'Thank you for subscribing to our newsletter.');
    }
}


