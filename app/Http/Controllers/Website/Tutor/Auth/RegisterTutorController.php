<?php
namespace App\Http\Controllers\Website\Tutor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tutor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Website\Tutor\Auth\Redirect;

class RegisterTutorController extends Controller
{
    public function register()
    {
        return view('/tutor/register');
    }

    public function postTutorRegister(Request $request)
    {
        try
        {
            request()->validate([
                'tutors_fname' => 'required',
                'tutors_lname' => 'required',
                'tutor_email' => 'required|email|unique:tutors',
                'password' => 'required|min:6',
                'password_confirmation' => 'required',
                'contact_no' => 'required',
                'address' => 'required',
                'resume' => 'required',
                'status' => 'nullable'
                ]);

                $fileName = time().'.'. $request->file('resume')->getClientOriginalExtension();
                $tutor = Tutor:: create([
                         'tutors_fname' => $request->get('tutors_fname'),
                         'tutors_lname' => $request->get('tutors_lname'),
                         'tutor_email' => $request->get('tutor_email'),
                         'password' =>bcrypt($request->get('password')),
                         'address' => $request->get('address'),
                         'contact_no' => $request->get('contact_no'),
                         'resume' =>$fileName,
                         'status'=>'1',
                    ]);
                $tutor->save();

                $destinationPath = public_path('edecx/website/tutor-resume');
                if (!is_dir($destinationPath)) {
                     mkdir($destinationPath, 0755, true);
                }
                $request->resume->move($destinationPath,$fileName);
                return redirect("tutor/login")->withSuccess('You have Successfully Registered');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->with('Error',$exception->getMessage())->withInput();
        }
    }
}

