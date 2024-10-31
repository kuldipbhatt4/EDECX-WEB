<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class MyWalletTutorController extends Controller
{
    public function walletTutor(Request $request)
    {   
        $looged_mentor_id = Auth::guard('tutors')->id();        
        $query_mentor = DB::table('tutors AS t')->leftJoin('tutor_details AS td', 'td.tid', '=', 't.id')->select(DB::raw('t.id,t.wallet_hold_amount,t.wallet_amount,t.tutor_email,t.contact_no,t.tutors_fname,t.tutors_lname'))->where('t.id','=',$looged_mentor_id)->orderBy('t.id','DESC')->groupBy('t.id')->limit(1)->get();
            if(!empty($query_mentor) && count($query_mentor) > 0){  
                foreach($query_mentor as $res_query_mentor){                
                    $wallet_hold_amount = number_format($res_query_mentor->wallet_hold_amount,2); 
                    $wallet_amount = number_format($res_query_mentor->wallet_amount,2);                     
                    $tutor_email = $res_query_mentor->tutor_email;
                    $contact_no = $res_query_mentor->contact_no;
                    $tutors_fname = $res_query_mentor->tutors_fname;
                    $tutors_lname = $res_query_mentor->tutors_lname;
                }
                return view('/tutor/my-wallet')->with(compact('wallet_hold_amount','wallet_amount',"looged_mentor_id","tutor_email","contact_no","tutors_fname","tutors_lname"));
            }
            else{                
                return redirect("/tutor/tutor-dashboard")->with('error','No mentor found.');

            }
    }   
}
