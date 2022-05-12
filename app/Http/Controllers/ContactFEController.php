<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactFEController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::all();
        return view('frontend.contact',compact('contacts'));
    }
    
    public function store(request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $contact = new Contact;
        $contact->name= request('name');
        $contact->email= request('email');
        $contact->subject= request('subject');
        $contact->message= request('message');
        $contact->save();
        $request->session()->flash('success', 'Thank you for your contact. We will contact you back.');
        return view('frontend.contact');
        
    }

    // public function destroy($id)
    // {
    //     $contact = Contact::find($id);
    //     $contact->delete();
    //     return redirect()->route('contacts.index')
    //                     ->with('success','Contact deleted successfully');
    // }
}
