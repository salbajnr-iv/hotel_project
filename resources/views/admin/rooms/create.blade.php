<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Room</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if($errors->any())
                        <div class="mb-4 text-red-700">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="number" name="capacity" min="1" value="{{ old('capacity', 1) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Price per night</label>
                            <input type="number" step="0.01" name="price_per_night" value="{{ old('price_per_night', 0) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full border rounded p-2" required>
                                <option value="active" @selected(old('status')==='active')>active</option>
                                <option value="inactive" @selected(old('status')==='inactive')>inactive</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">Create</button>
                            <a href="{{ route('admin.rooms.index') }}" class="px-4 py-2 border rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

