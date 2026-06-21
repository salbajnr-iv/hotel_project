<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact Messages</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if(session('success'))
                        <div class="mb-4 text-green-700">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2">From</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Subject</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $m)
                                    <tr class="border-t">
                                        <td class="py-2">{{ $m->full_name }}</td>
                                        <td class="py-2">{{ $m->email }}</td>
                                        <td class="py-2">{{ $m->subject }}</td>
                                        <td class="py-2">
                                            <form method="POST" action="{{ route('admin.contact-messages.updateStatus', $m) }}" class="flex items-center gap-2">
                                                @csrf
                                                <select name="status" class="border rounded p-1 text-sm">
                                                    @foreach(['new','read','archived'] as $s)
                                                        <option value="{{ $s }}" @selected($m->status===$s)>{{ $s }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="underline text-blue-600">Save</button>
                                            </form>
                                        </td>
                                        <td class="py-2">
                                            <form method="POST" action="{{ route('admin.contact-messages.destroy', $m) }}" onsubmit="return confirm('Delete this message?')">
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

                    <div class="mt-4">{{ $messages->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

