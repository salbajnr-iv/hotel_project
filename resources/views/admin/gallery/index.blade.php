<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gallery</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm text-gray-600">Manage gallery images</div>
                        <a href="{{ route('admin.gallery.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add item</a>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 text-green-700">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2">Image</th>
                                    <th class="py-2">Title</th>
                                    <th class="py-2">Order</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr class="border-t">
                                        <td class="py-2">
                                            <img src="{{ asset('storage/'.$item->image_path) }}" class="h-16 w-16 object-cover" alt="">
                                        </td>
                                        <td class="py-2">{{ $item->title }}</td>
                                        <td class="py-2">{{ $item->sort_order }}</td>
                                        <td class="py-2">{{ $item->status }}</td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.gallery.edit', $item) }}" class="text-blue-600 underline">Edit</a>
                                                <form method="POST" action="{{ route('admin.gallery.destroy', $item) }}" onsubmit="return confirm('Delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 underline">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">{{ $items->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

