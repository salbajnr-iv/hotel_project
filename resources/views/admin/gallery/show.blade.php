<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gallery Item Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @include('admin._nav')

                    <div class="space-y-2">
                        <div><strong>Title:</strong> {{ $item->title }}</div>
                        <div><strong>Sort order:</strong> {{ $item->sort_order }}</div>
                        <div><strong>Status:</strong> {{ $item->status }}</div>
                        <div>
                            <strong>Image:</strong><br>
                            <img src="{{ asset('storage/'.$item->image_path) }}" class="h-48 w-full object-cover mt-2" alt="">
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('admin.gallery.edit', $item) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>
                        <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 border rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

