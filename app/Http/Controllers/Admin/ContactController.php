<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        if (!$contact->is_read) {
            $contact->markAsRead();
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->markAsRead();
        return back()->with('success', 'Contact marked as read.');
    }

    public function unread()
    {
        $contacts = Contact::unread()->latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }
}
