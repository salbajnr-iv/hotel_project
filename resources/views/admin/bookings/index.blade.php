<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bookings</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm text-gray-600">Booking requests</div>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 text-green-700">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2">#</th>
                                    <th class="py-2">Guest</th>
                                    <th class="py-2">Arrival</th>
                                    <th class="py-2">Departure</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="border-t">
                                        <td class="py-2">{{ $booking->id }}</td>
                                        <td class="py-2">{{ $booking->full_name }}</td>
                                        <td class="py-2">{{ $booking->arrival }}</td>
                                        <td class="py-2">{{ $booking->departure }}</td>
                                        <td class="py-2">
                                            <form method="POST" action="{{ route('admin.bookings.updateStatus', $booking) }}" class="flex items-center gap-2">
                                                @csrf
                                                <select name="status" class="border rounded p-1 text-sm">
                                                    @foreach(['pending','confirmed','cancelled'] as $s)
                                                        <option value="{{ $s }}" @selected($booking->status===$s)>{{ $s }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="underline text-blue-600">Save</button>
                                            </form>
                                        </td>
                                        <td class="py-2">
                                            <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" onsubmit="return confirm('Delete this booking?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

