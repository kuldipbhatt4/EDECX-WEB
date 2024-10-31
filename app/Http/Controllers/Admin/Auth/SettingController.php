<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\EdecxAdmin;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingController extends Controller
{
    public function setting()
    {
        return view('edecx-admin/setting/account-setting');
    }
    public function adminsetting(Request $request)
    {
        $id = Auth::guard('admins')->user()->id;
        try
        {   
            $admin = EdecxAdmin::find($id);            ;
            if($request->price > 100){
                return redirect('edecx-admin/setting/account-setting')->with('error', 'Admin commission could not be more than 100%.');
            }
            else{                
                $admin->price = $request->get('price');
                $admin->minimum_wallet_amount_deposit = $request->get('minimum_wallet_amount_deposit');
                $admin->facebook = $request->get('facebook');
                $admin->twitter = $request->get('twitter');
                $admin->instagram = $request->get('instagram');
                $admin->youtube = $request->get('youtube');
                $admin->save();
                return redirect('edecx-admin/setting/account-setting')->with('success', 'Information has been successfully updated.');
            }
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
