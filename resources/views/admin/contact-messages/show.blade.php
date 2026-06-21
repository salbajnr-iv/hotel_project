<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact Message Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @include('admin._nav')

                    <div class="space-y-2">
                        <div><strong>From:</strong> {{ $contact->full_name }}</div>
                        <div><strong>Email:</strong> {{ $contact->email }}</div>
                        @if($contact->phone)
                            <div><strong>Phone:</strong> {{ $contact->phone }}</div>
                        @endif
                        @if($contact->subject)
                            <div><strong>Subject:</strong> {{ $contact->subject }}</div>
                        @endif
                        <div>
                            <strong>Message:</strong>
                            <div class="mt-1 whitespace-pre-wrap">{{ $contact->message }}</div>
                        </div>
                        <div><strong>Status:</strong> {{ $contact->status }}</div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 border rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

