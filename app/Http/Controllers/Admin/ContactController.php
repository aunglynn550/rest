<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        $contact = Contact::first();
        return view('admin.content.index',compact('contact'));
    }//end method

    function update(ContactUpdateRequest $request){     
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'mail_one' => $request->mail_one,
                'mail_two' => $request->mail_two,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]
        );

        toastr('Updated Successfully!');
        return redirect()->back();
    }
}