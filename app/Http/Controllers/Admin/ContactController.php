<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function AllMessages()
    {
        $message=Contact::latest()->get();
        return view('backend.contact.contact_all',compact('message'));
    }


    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
}
