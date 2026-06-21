<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Gallery Item</h2>
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

                    <form method="POST" action="{{ route('admin.gallery.update', $item) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Title (optional)</label>
                            <input type="text" name="title" value="{{ old('title', $item->title) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                            @if($item->image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$item->image_path) }}" alt="" class="h-24 object-cover">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Sort order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full border rounded p-2" required>
                                <option value="active" @selected(old('status', $item->status)==='active')>active</option>
                                <option value="inactive" @selected(old('status', $item->status)==='inactive')>inactive</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">Update</button>
                            <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 border rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

