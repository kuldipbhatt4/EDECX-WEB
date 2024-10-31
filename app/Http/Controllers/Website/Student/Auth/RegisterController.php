<?php

namespace App\Http\Controllers\Website\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Student;
use App\StudentDetails;
use App\Level;
use App\ClassType;
use App\Subject;
use Carbon\Carbon;
use Validator;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RegisterController extends Controller
{
    public function register()
    {
        $level = Level::all();
        $subject = Subject::all();
        $tclass = ClassType::all();
        return view('/student/register',compact('level','subject','tclass'));
    }

    public function postRegister(Request $request)
    {
        try
        {
           $request->validate([
                'fname' => 'required',
                'middle_name' => 'required',
                'lname' => 'required',
                'student_dob' => 'required|date',
                'gender' => 'required|numeric',
                'address' => 'required',
                'street_address' => 'required',
                'street_address_line2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
                'mobile_no' =>'required',
                'phone_no' => 'required',
                'work_no' => 'required',
                'email' => 'required|email|unique:students',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6',
                'subject' => 'required',
                'level' => 'required',
                'otp' => 'nullable'
            ]);

               $subject = $request->input('subject');
               $subject= implode(',', $subject);

               $level = $request->input('level');
               $level = implode(',', $level);

               $student_dob = Carbon::createFromFormat('d/m/Y', $request->input('student_dob'));
                 $student = Student:: create([
                         'fname' => $request->input('fname'),
                         'middle_name' => $request->input('middle_name'),
                         'lname' => $request->input('lname'),
                         'student_dob' =>  $student_dob,
                         'gender' => $request->input('gender'),
                         'address' => $request->input('address'),
                         'street_address' => $request->input('street_address'),
                         'street_address_line2' => $request->input('street_address_line2'),
                         'city' => $request->input('city'),
                         'state' => $request->input('state'),
                         'zipcode' => $request->input('zipcode'),
                         'mobile_no' => $request->input('mobile_no'),
                         'phone_no' => $request->input('phone_no'),
                         'work_no' => $request->input('work_no'),
                         'email' => $request->input('email'),
                         'password' =>bcrypt($request->input('password')),
                         'subject' => $subject,
                         'level' => $level,
                    ]);

                $student->save();
               $id = $student->id;
                $studentdetails = new StudentDetails([
                    'sid'=> $id
                ]);
                $studentdetails->save();
                return redirect("/student/login")->with('success','Great! You have Successfully Registered');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}

