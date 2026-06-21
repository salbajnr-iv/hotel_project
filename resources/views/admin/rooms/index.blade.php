<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rooms</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm text-gray-600">Manage rooms</div>
                        <a href="{{ route('admin.rooms.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add room</a>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 text-green-700">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2">Name</th>
                                    <th class="py-2">Capacity</th>
                                    <th class="py-2">Price</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr class="border-t">
                                        <td class="py-2">{{ $room->name }}</td>
                                        <td class="py-2">{{ $room->capacity }}</td>
                                        <td class="py-2">{{ $room->price_per_night }}</td>
                                        <td class="py-2">{{ $room->status }}</td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.rooms.edit', $room) }}" class="text-blue-600 underline">Edit</a>
                                                <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" onsubmit="return confirm('Delete this room?')">
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

                    <div class="mt-4">
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

