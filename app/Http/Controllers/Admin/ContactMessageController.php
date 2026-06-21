<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController
{
    public function index()
    {
        $messages = ContactMessage::query()->latest()->paginate(20);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function updateStatus(Request $request, ContactMessage $contact)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,archived'],
        ]);

        $contact->update(['status' => $validated['status']]);

        return redirect()->route('admin.contact-messages.index')->with('success', 'Message updated.');
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted.');
    }
}

