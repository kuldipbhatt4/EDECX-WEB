<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Tutor;
use App\TutorDetails;
use App\Level;
use App\Subject;
use App\ClassType;
use \DB;
use Carbon\Carbon;
use App\EdecxAdmin;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TutorProfileController extends Controller
{
    public function tutorprofile()
    {
        $id = Auth::guard('tutors')->id();
        $tutor = Tutor::find($id)->get();
        $tutordetails = TutorDetails::where('tid','=',$id)->get();
        $level = Level::with('users')->get();
        $subject = Subject::all();
        $tclass = ClassType::all();
        return view('tutor.tutor-profile')->with(compact('level','subject','tclass','tutor','tutordetails'));
    }
    public function tutorPublicProfile(Request $request)
    {
        $id = $request->id;
        $tutorCheck = Tutor::find($id);        
        if(!empty($tutorCheck)){
            $tutor = $tutorCheck->get();
            $tutordetails = TutorDetails::where('tid','=',$id)->get();
            $level = Level::with('users')->get();
            
        }
        else{
            $tutor = $tutordetails = $level =  '';
        }
        $subject = Subject::all();
        $tclass = ClassType::all();
        
        
        return view('tutor.tutor-public-profile')->with(compact('level','subject','tclass','tutor','tutordetails'));
    }

    

    public function editprofile()
    {
        $id = Auth::guard('tutors')->id();
        $tutor = Tutor::find($id)->get();
        $tutordetails = TutorDetails::where('tid','=',$id)->get();
        $level = Level::with('users')->get();
        $subject = Subject::all();
        $tclass = ClassType::all();
        $admin = EdecxAdmin::find(1)->get();
        return view('/tutor/profile-setting')->with(compact('level','subject','tclass','tutor','tutordetails','admin'));
    }

    public function updatetutorprofile(Request $request)
    {
        try
        {
            $request->validate([
                'tutors_fname' => 'required',
                'tutors_lname' => 'required',
                'contact_no' => 'required',
                'gender' => 'required',
                'lid' => 'required',
                'sid' => 'required',
                'tutor_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
                'classid' => 'required',
                'hrprice' => 'required',
                'urearning' => 'required',
                'address' => 'required'
            ]);
            $id = Auth::guard('tutors')->id();
            $tutor = Tutor::find($id);

            $tutor->tutors_fname = $request->input('tutors_fname');
            $tutor->tutors_lname = $request->input('tutors_lname');
            $tutor->contact_no = $request->input('contact_no');
            $tutor->address = $request->input('address');
            $tutor->save();

            $path = public_path().'/edecx/website/tutor-profile/';
            if (!is_dir($path))
            {
                mkdir($path, 0755, true);
            }
            if ($request->hasFile('tutor_image')) {
                $tutor_profile = time().'.'. $request->file('tutor_image')->getClientOriginalExtension();
            }else {
                $tutor_profile = $request->tutor_image ?? null;
            }

            $tutordetails = TutorDetails::where('tid','=',$id)->firstOrFail();
            $tutor_dob = Carbon::createFromFormat('d/m/Y', $request->get('tutor_dob'));
            $lid=$request->input('lid');
            $lid= implode(',', $lid);
            $sid=$request->input('sid');
            $sid= implode(',', $sid);
            $experience= rtrim($request->input('experience'), '+');
            $classid=$request->input('classid');
            $classid= implode(',', $classid);
            $urearning=ltrim($request->input('urearning'), '$');
            $tutordetails->gender = $request->input('gender');
            if ($tutor_profile !== null)
                $tutordetails->tutor_image = $tutor_profile;
            $tutordetails->description = $request->input('description');
            $tutordetails->ugra_college = $request->input('ugra_college');
            $tutordetails->gra_college = $request->input('gra_college');
            $tutordetails->ugra_major = $request->input('ugra_major');
            $tutordetails->gra_major = $request->input('gra_major');
            $tutordetails->typedegree = $request->input('typedegree');
            $tutordetails->city = $request->input('city');
            $tutordetails->hrprice = $request->input('hrprice');
            $tutordetails->latitude = $request->input('latitude');
            $tutordetails->longitude = $request->input('longitude');
            $tutordetails->tutor_dob = $tutor_dob;
            $tutordetails->lid = $lid;
            $tutordetails->sid = $sid;
            $tutordetails->experience = $experience;
            $tutordetails->classid = $classid;
            $tutordetails->urearning = $urearning;
            $tutordetails->save();

            if ($tutor_profile !== null)
                $request->tutor_image->move($path, $tutor_profile);

            return redirect('/tutor/profile-setting')->with('success', 'Data saved successfully!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
