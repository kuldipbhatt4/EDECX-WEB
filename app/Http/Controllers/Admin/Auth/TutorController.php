<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutor;
use App\TutorDetails;

class TutorController extends Controller
{
    public function tutorlist(Request $request)
    {
        return view('edecx-admin/tutor/tutor-approved-list');
    }

    public function tutordenied()
    {
        return view('edecx-admin/tutor/tutor-denied-list');
    }
    public function tutor_approved_tutor()
    {
        $tutors = Tutor::select('id','tutors_fname','tutors_lname', 'tutor_email','contact_no','resume','status')->where('status',0)->paginate(10);
        return view('edecx-admin.tutor.tutor-approved-list',compact('tutors'));
    }
    public function tutor_denied_tutor()
    {
        $tutors = Tutor::select('id','tutors_fname','tutors_lname', 'tutor_email','contact_no','resume','status')->where('status',2)->paginate(10);
        return view('edecx-admin.tutor.tutor-denied-list',compact('tutors'));
    }
    public function destroyapprove($id)
    {
        $tutor = Tutor::find($id);
        if(!$tutor)
        {
            return redirect('/edecx-admin/tutor/tutor-approved-list');
        }

        $delete_tutor = Tutor::where('id', $id)->forceDelete();
        $delete_tutordetails = TutorDetails::where('tid', $id)->forceDelete();

        if($delete_tutor && $delete_tutordetails)
        {
            return redirect('/edecx-admin/tutor/tutor-approved-list')->with('success', 'Successfully Deleted');
        }
    }
    public function destroydisapprove($id)
    {
        $tutor = Tutor::find($id);
        if(!$tutor)
        {
            return redirect('/edecx-admin/tutor/tutor-denied-list');
        }

        $delete_tutor = Tutor::where('id', $id)->forceDelete();

        if($delete_tutor)
        {
            return redirect('/edecx-admin/tutor/tutor-denied-list')->with('success', 'Successfully Deleted');
        }
    }
}
