<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Room Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @include('admin._nav')

                    <div class="space-y-2">
                        <div><strong>Name:</strong> {{ $room->name }}</div>
                        <div><strong>Description:</strong> {{ $room->description }}</div>
                        <div><strong>Capacity:</strong> {{ $room->capacity }}</div>
                        <div><strong>Price per night:</strong> {{ $room->price_per_night }}</div>
                        <div><strong>Status:</strong> {{ $room->status }}</div>
                        @if($room->image_path)
                            <div>
                                <strong>Image:</strong><br>
                                <img src="{{ $room->image_url }}" class="h-40 object-cover mt-2" alt="">
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>
                        <a href="{{ route('admin.rooms.index') }}" class="px-4 py-2 border rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

