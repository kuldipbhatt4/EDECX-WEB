<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\EdecxAdmin;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
         $this->middleware('guest:admins', ['except' => ['logout']]);
    }

    public function login()
    {
        $admin = EdecxAdmin::find(1);
        return view('edecx-admin/Auth/login',[
            'title' => 'Admin Login',
            'loginRoute' => 'edecx-admin.login',
        ])->with(compact('admin'));
    }

    public function postLoginadmin(Request $request)
    {
        $messages = [
            'email' => 'email is required',
            'password.required' => "Password is required",
            'password.min' => "Password must be at least 6 characters"
        ];
        $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:edecx_admins,email',
                'password' => 'required|min:6'
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if(Auth::guard('admins')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            {
                return redirect('/edecx-admin/dashboard')->with('success', "You are logged in");
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->flush();
        $request->session()->invalidate();
        return redirect('edecx-admin/login')->with('Info',"your logged out");
    }
}
?>
