<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Contact;
use App\ContactUs;

class ContactusController extends Controller
{
    public function contactus()
    {
        $contactf = ContactUs::find(1);
        return view('contact-us', compact('contactf'));
    }
    public function contactstore(Request $request)
    {
        try
        {
            $contact = new Contact([
                 'fname' => $request->get('fname'),
                 'phone_no' => $request->get('phone_no'),
                 'contact_email' => $request->get('contact_email'),
                 'age' => $request->get('age'),
                 'address'=> $request->get('address'),
                 'hobbies'=> $request->get('hobbies'),
                 'message' => $request->get('message')
            ]);
            $contact->save();
           return redirect()->back()->with('success', 'Your query has been sent');
        }

        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
