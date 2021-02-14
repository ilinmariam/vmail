<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function create()
    {
        $contacts = auth()->user()->contacts;

        return view('dashboard.contact', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = Contact::firstOrCreate([
           'email' => $request->email
        ]);

        auth()->user()->contacts()->sync($contact, false);

        return redirect(route('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        auth()->user()->contacts()->detach($contact);

        return redirect(route('contact'));
    }
}
