<?php

namespace App\Http\Controllers\Website\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;
use App\Subject;
use App\ClassType;
use App\Student;
use App\StudentDetails;
use \DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentProfileController extends Controller
{
    public function profile()
    {
        $id = Auth::guard('students')->id();
         $student = Student::find($id)->get();
         $studentdetails = StudentDetails::where('sid','=',$id)->get();
         $level = Level::all();
         $subject = Subject::all();
         $tclass = ClassType::all();

        return view('/student/student-profile')->with(compact('level','subject','tclass','student','studentdetails'));
    }

    public function studentPublicProfile(Request $request)
    {
        $id = $request->id;        
        $studentCheck = Student::find($id);
        if(!empty($studentCheck)){
            $student = Student::find($id)->get();
            $studentdetails = StudentDetails::where('sid','=',$id)->get();
        }
        else{
            $student = $studentdetails = '';
        }
        $level = Level::all();
        $subject = Subject::all();
        $tclass = ClassType::all();

       return view('/student/student-public-profile')->with(compact('level','subject','tclass','student','studentdetails'));
    }

    public function student_profilesetting()
    {
         $id = Auth::guard('students')->id();
         $student = Student::find($id)->get();
         $studentdetails = StudentDetails::where('sid','=',$id)->get();
         $level = Level::all();
         $subject = Subject::all();
         $tclass = ClassType::all();
        return view('/student/student-profile-setting')->with(compact('level','subject','tclass','student','studentdetails'));
    }

    public function updatestudentprofile(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'middle_name' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'mobile_no' => 'required',
            'work_no' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'street_address' => 'required',
            'street_address_line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'subject' => 'required',
            'level' => 'required',
            'classid' => 'required',
            'student_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
            'aboutme' => 'nullable',
            'classid' => 'nullable'
        ]);

        $id = Auth::guard('students')->id();
        $student = Student::find($id);

        $dob = $request->input('student_dob');
        if ($dob != null)
            $student_dob = Carbon::createFromFormat('d/m/Y', $request->input('student_dob'));

        $student->fname= $request->input('fname');
        $student->middle_name=$request->input('middle_name');
        $student->lname=$request->input('lname');
        if ($dob != null)
            $student->student_dob=$student_dob;
        $student->gender= $request->input('gender');
        $student->address=$request->input('address');
        $student->street_address=$request->input('street_address');
        $student->street_address_line2=$request->input('street_address_line2');
        $student->city= $request->input('city');
        $student->state=$request->input('state');
        $student->zipcode=$request->input('zipcode');
        $student->mobile_no=$request->input('mobile_no');
        $student->phone_no=$request->input('phone_no');
        $student->work_no=$request->input('work_no');
        $subject=$request->input('subject');
        $student->subject= implode(',', $subject);
        $level=$request->input('level');
        $student->level= implode(',', $level);
        $student->save();

        $path = public_path().'/edecx/website/student-profile/';
            if(!is_dir($path))
                mkdir($path, 0755, true);

        if ($request->hasFile('student_image')) {
            $student_profile = time().'.'. $request->file('student_image')->getClientOriginalExtension();
        }else {
            $student_profile = $request->file('student_image') ?? null;
        }
        $studentdetails = StudentDetails::where('sid','=',$request->input('studentdetailid'))->firstOrFail();

        if ($request->input('classid') != null)
        {
            $classid=$request->input('classid');
            $studentdetails->classid= implode(',', $classid);
        }else {
            $studentdetails->classid = $request->input('classid');
        }
        if ($request->input('aboutme') != null)
            $studentdetails->aboutme = $request->input('aboutme');
        else
            $studentdetails->aboutme = $request->input('aboutme');

        $studentdetails->latitude = $request->input('latitude');
        $studentdetails->longitude = $request->input('longitude');

        if ($student_profile !== null)
           $studentdetails->student_image = $student_profile;

        $studentdetails->save();

        if ($student_profile !== null)
            $request->student_image->move($path, $student_profile);

        return redirect('/student/student-profile-setting')->with('success', 'Data saved successfully!');
    }
}
