<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function compose()
    {
        $contacts = auth()->user()->contacts;
        $selected_contact = null;
        return view('dashboard.compose', compact('contacts', 'selected_contact'));
    }

    public function compose_contact($id)
    {
        $selected_contact = Contact::findOrFail($id);
        $contacts = auth()->user()->contacts;

        return view('dashboard.compose', compact('contacts', 'selected_contact'));
    }


}
