<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog Posts</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm text-gray-600">Manage blog posts</div>
                        <a href="{{ route('admin.blog.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add post</a>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 text-green-700">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left">
                                    <th class="py-2">Title</th>
                                    <th class="py-2">Slug</th>
                                    <th class="py-2">Status</th>
                                    <th class="py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="border-t">
                                        <td class="py-2">{{ $post->title }}</td>
                                        <td class="py-2">{{ $post->slug }}</td>
                                        <td class="py-2">{{ $post->status }}</td>
                                        <td class="py-2">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.blog.edit', $post) }}" class="text-blue-600 underline">Edit</a>
                                                <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
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

                    <div class="mt-4">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

