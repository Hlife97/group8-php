<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrfail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully');
    }

    public function read(string $id)
    {
        $contact = Contact::findOrfail($id);
        $contact->status = 1;
        $contact->save();
        return redirect()->back()->with('success', 'Contact updated successfully');
    }
}
