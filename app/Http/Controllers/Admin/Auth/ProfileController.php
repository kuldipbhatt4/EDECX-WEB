<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EdecxAdmin;
use Validator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileController extends Controller
{
     public function editprofile()
     {
        return view('edecx-admin.setting.profile-edit');
     }
    public function updateprofile(Request $request)
    {
       $id = Auth::guard('admins')->user()->id;
        try
        {
            $request->validate([
                'fname' =>'required',
                'lname' =>'required',
                'profile_image'=>'nullable|mimes:jpeg,png,jpg|max:2048',
                'admin_dob' => 'nullable',
                'login_logo' =>'nullable|mimes:jpeg,png,jpg|max:2048',
                'login_sideimage'=>'nullable|mimes:jpeg,png,jpg|max:2048',
                ]);

                $admin = EdecxAdmin::find($id);
                $path = public_path().'/edecx/admin/admin-profile/';

                if ($request->hasFile('profile_image')) {
                    $profile_image = time().'.'. $request->file('profile_image')->getClientOriginalExtension();
                }else {
                    $profile_image = $request->profile_image ?? null;
                }
                if ($profile_image !== null)
                    $admin->profile_image = $profile_image;

                if ($request->hasFile('login_logo')) {
                    $logoimage = time().'.'. $request->file('login_logo')->getClientOriginalExtension();
                }else {
                    $logoimage = $request->login_logo ?? null;
                }
                if ($logoimage !== null)
                    $admin->login_logo = $logoimage;

                if ($request->hasFile('login_sideimage')) {
                    $sideimage = time().'.'. $request->file('login_sideimage')->getClientOriginalExtension();
                }
                else {
                    $sideimage = $request->login_sideimage ?? null;
                }
                if ($sideimage !== null)
                    $admin->login_sideimage = $sideimage;

                $admin_dob = Carbon::createFromFormat('d/m/Y', $request->get('admin_dob'));
                $admin->fname = $request->get('fname');
                $admin->lname = $request->get('lname');
                $admin->admin_dob = $admin_dob;
                $admin->save();

                if ($request->profile_image !== null)
                    $request->profile_image->move($path, $profile_image);
                if ($request->login_logo !== null)
                    $request->login_logo->move($path, $logoimage);
                if ($request->login_sideimage !== null)
                    $request->login_sideimage->move($path, $sideimage);

                return redirect('edecx-admin/setting/profile-edit')->with('success', ' saved!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
