<?php

namespace App\Http\Controllers\Website\Tutor\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Tutor;
use Laravel\Passport\HasApiTokens;
use App\TutorDetails;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    public function login()
    {
        return view('tutor/auth/login',[
            'title' => 'Tutor Login',
            'loginRoute' => 'tutor.login',
            ]);
    }

    public function postLogintutor(Request $request)
    {
        $credentials = $request->only('tutor_email', 'password');
        if(Auth::guard('tutors')->attempt($credentials))
        {
            $status = Auth::guard('tutors')->user()->status;
            if ($status === '0')
            {
                return redirect('/tutor/tutor-dashboard')->with('success','Great! You have Successfully loggedin');
            }
            elseif ($status === '1')
            {
                Session()->flush();
                Auth::logout();
                return redirect()->intended('tutor/login')->with('info', 'Your Registration is Under Verification');
            }
            elseif ($status === '2')
            {
                Session()->flush();
                Auth::logout();
                return redirect('tutor/login')->with('info', 'Your Registration is not Approved. Kindly Contact Edecx');
            }
            else
            {
                Session()->flush();
                Auth::logout();
                return redirect('tutor/login')->with('info', 'Your user type is not valid, Please try after some time.');
            }
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
        return Redirect('tutor/login');
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
        return view('/tutor/auth/forgot-password');
    }

    public function change_pwd()
    {
        return view('/tutor/auth/change-password');
    }
    public function updateoldpwd(Request $request)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);
        Tutor::find(Auth::guard('tutors')->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
        return Redirect('tutor/tutor-dashboard')->with('success','Successfully Changed the Password');
    }
}
?>
