<?php

namespace app\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class ChangePasswordController extends Controller
{
    public function change_pwd()
    {
        return view('/student/change-password');
    }
    public function stdupdateoldpwd(Request $request)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);

        Student::find(Auth::guard('students')->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
        return Redirect('student/student-dashboard');
    }
}
