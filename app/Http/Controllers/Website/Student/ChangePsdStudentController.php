<?php

namespace App\Http\Controllers\Website\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\StudentMatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Student;

class ChangePsdStudentController extends Controller
{
    public function change_pwd()
    {
        return view('/student/change-pwd');
    }
    public function studentupdateoldpwd(Request $request)
    {
        $request->validate([
            'password' => ['required', new StudentMatchOldPassword],
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);

        Student::find(Auth::guard('students')->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
        return Redirect('student/student-dashboard')->with('success','Successfully Changed the Password');
    }
}
