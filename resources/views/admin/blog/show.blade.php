<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog Post Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @include('admin._nav')

                    <div class="space-y-2">
                        <div><strong>Title:</strong> {{ $post->title }}</div>
                        <div><strong>Slug:</strong> {{ $post->slug }}</div>
                        <div><strong>Status:</strong> {{ $post->status }}</div>
                        @if($post->published_at)
                            <div><strong>Published at:</strong> {{ $post->published_at->toDateString() }}</div>
                        @endif
                        <div>
                            <strong>Excerpt:</strong>
                            <div class="mt-1">{{ $post->excerpt }}</div>
                        </div>
                        <div>
                            <strong>Content:</strong>
                            <div class="mt-1 whitespace-pre-wrap">{{ $post->content }}</div>
                        </div>
                        @if($post->cover_image_path)
                            <div>
                                <strong>Cover:</strong><br>
                                <img src="{{ asset('storage/'.$post->cover_image_path) }}" class="h-56 w-full object-cover mt-2" alt="">
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('admin.blog.edit', $post) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>
                        <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 border rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

