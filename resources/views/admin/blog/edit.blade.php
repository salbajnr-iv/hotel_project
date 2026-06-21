<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Blog Post</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if($errors->any())
                        <div class="mb-4 text-red-700">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.blog.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Slug (optional)</label>
                            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Excerpt</label>
                            <textarea name="excerpt" class="w-full border rounded p-2">{{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" class="w-full border rounded p-2" rows="8">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Cover image (optional)</label>
                            <input type="file" name="cover_image" class="w-full border rounded p-2">
                            @if($post->cover_image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$post->cover_image_path) }}" alt="cover" class="h-24 object-cover">
                                </div>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="w-full border rounded p-2" required>
                                <option value="draft" @selected(old('status', $post->status)==='draft')>draft</option>
                                <option value="published" @selected(old('status', $post->status)==='published')>published</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Published at (optional)</label>
                            <input type="date" name="published_at" value="{{ old('published_at', $post->published_at?->toDateString()) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">Update</button>
                            <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 border rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

