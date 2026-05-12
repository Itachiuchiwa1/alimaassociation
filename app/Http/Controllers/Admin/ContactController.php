<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::orderByDesc('created_at')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact): View
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);
        return redirect()->route('admin.contacts.index')->with('success', 'Marqué comme lu.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message supprimé.');
    }
}
