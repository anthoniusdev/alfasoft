<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $contacts = Contact::all();
        $isAuth = auth()->check();

        return view('contacts.index', [
            'contacts' => $contacts,
            'isAuth' => $isAuth,
        ]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|min:9|max:9',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 6 characters.',
            'name.max' => 'Name must not exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email must not exceed 255 characters.',
            'contact.required' => 'Contact is required.',
            'contact.max' => 'Contact must have exactly 9 characters.',
        ]);
        $contact = Contact::find($id);
        if ($contact) {
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->contact = $request->input('contact');
            $contact->save();
            return redirect()->back()->with('success', 'Contact updated successfully.');
        } else {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }

    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->route('home')->with('success', 'Contact deleted successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Contact not found.');
        }
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|unique:contacts|max:255',
            'contact' => 'required|unique:contacts|string|min:9|max:9',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 6 characters.',
            'name.max' => 'Name must not exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email must not exceed 255 characters.',
            'contact.required' => 'Contact is required.',
            'contact.max' => 'Contact must have exactly 9 characters.',
            'contact.unique' => 'This contact has already been saved.',
            'email.unique' => 'This email has already been saved.',
        ]);
        $contact = Contact::create($request->all());
        return redirect()->back()->with('success', 'Contact created successfully.')->with('contact', $contact->id);
    }
}
