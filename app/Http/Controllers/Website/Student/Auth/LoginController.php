<?php

namespace App\Http\Controllers\Website\Student\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    public function login()
    {
        return view('student/auth/login',[
            'title' => 'Student Login',
            'loginRoute' => 'postLoginstudent',
            ]);
    }

    public function postLoginstudent(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('students')->attempt($credentials))
        {
            return redirect('/student/student-dashboard')->with('success','Great! You have Successfully loggedin');;
        }
        else
        {
            return $this->loginFailed();
        }

    }

    public function logout()
    {
        Session()->flush();
        Auth::logout();
        return Redirect('student/login');
    }
	private function loginFailed()
	{
		return redirect()
		->back()
		->withInput()
		->with('error','Login failed, please try again!');
	}

	public function forgot()
	{
		return view('/student/auth/forgot-password');
	}

	// public function change_student_pwd()
	// {
	// 	return view('/student/auth/change-password');
    // }

    // public function studentupdateoldpwd(Request $request)
    // {
    //     dd("auth");
    //     $request->validate([
    //         'password' => ['required', new MatchOldPassword],
    //         'newpassword' => ['required'],
    //         'confirmpassword' => ['same:newpassword'],
    //     ]);

    //     Student::find(Auth::guard('students')->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
    //     return Redirect('student/student-dashboard');
    // }

}

?>
