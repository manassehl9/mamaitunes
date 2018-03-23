<?php

namespace App\Http\Controllers\Dashboard;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('dashboard.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        //Contact::find($id)->delete();
        $contact = Contact::find($id);
        $contact->delete();

        Toastr::success('Your message was deleted successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
