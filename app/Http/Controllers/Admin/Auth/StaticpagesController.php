<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
use App\Contact;

class StaticpagesController extends Controller
{
    public function about()
    {
        return view('edecx-admin/pages/about-us');
    }

    public function contactus()
    {
        $id = '1';
        $contactus = ContactUs::find($id);
        return view('edecx-admin/pages/contact-us', compact('contactus'));
    }
    public function contactstore(Request $request)
    {
        $id = '1';
        request()->validate([
            'contactno' =>'required',
            'emailid' =>'required',
            'address'=>'required',
            'maplink' => 'required',
            'fabout' => 'required'
            ]);

            $contactus = ContactUs::find($id);
            $contactus->contactno = $request->get('contactno');
            $contactus->emailid = $request->get('emailid');
            $contactus->address = $request->get('address');
            $contactus->maplink = $request->get('maplink');
            $contactus->fabout = $request->get('fabout');
            $contactus->save();
        return view('edecx-admin/pages/contact-us')->with(compact('contactus'))->with('success', ' saved!');
    }

    public function privacy()
    {
        return view('edecx-admin/pages/privacy-policy');
    }

    public function terms()
    {
        return view('edecx-admin/pages/terms-condition');
    }

    public function inquirylist()
    {
        $inquires = Contact::paginate(10);
        return view('edecx-admin/pages/inquiry-email',compact('inquires'));
    }
}
