<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('website.contact');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $contact = Contact::create([
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('message', trans('website/messages.Your order has been sent, we will calL you back soon'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
