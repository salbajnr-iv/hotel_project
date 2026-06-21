@php
    $links = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Bookings', 'url' => route('admin.bookings.index')],
        ['label' => 'Rooms', 'url' => route('admin.rooms.index')],
        ['label' => 'Gallery', 'url' => route('admin.gallery.index')],
        ['label' => 'Blog', 'url' => route('admin.blog.index')],
        ['label' => 'Contact Messages', 'url' => route('admin.contact-messages.index')],
    ];
@endphp

<nav class="mb-6">
    
    <div class="flex flex-wrap gap-2">
        @foreach($links as $l)
            <a href="{{ $l['url'] }}" class="px-3 py-2 text-sm rounded border bg-white hover:bg-gray-50">
                {{ $l['label'] }}
            </a>
        @endforeach
    </div>
</nav>

