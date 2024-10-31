<?php

namespace App\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class MyWalletController extends Controller
{
    public function wallet(Request $request)
    {   
        $looged_studentid = Auth::guard('students')->id();
        $get_order_no = $request->order_no;
        $query_student = DB::table('students AS s')->leftJoin('student_details AS sd', 'sd.sid', '=', 's.id')->select(DB::raw('s.id,s.wallet_hold_amount,s.wallet_amount,s.email,s.phone_no,s.fname,s.lname'))->where('s.id','=',$looged_studentid)->orderBy('s.id','DESC')->groupBy('s.id')->limit(1)->get();
            if(!empty($query_student) && count($query_student) > 0){  
                foreach($query_student as $res_query_student){                
                    $wallet_hold_amount = number_format($res_query_student->wallet_hold_amount,2); 
                    $wallet_amount = number_format($res_query_student->wallet_amount,2);                     
                    $email = $res_query_student->email;
                    $phone_no = $res_query_student->phone_no;
                    $fname = $res_query_student->fname;
                    $lname = $res_query_student->lname;
                }
                return view('/student/my-wallet')->with(compact('wallet_hold_amount','wallet_amount',"looged_studentid","email","phone_no","fname","lname","get_order_no"));
            }
            else{                
                return redirect("/student/student-dashboard")->with('error','No student found.');

            }
    }


    public function walletAddMoney(Request $request){      
        $looged_studentid = Auth::guard('students')->id();
        $txt_amount = $request->txt_amount;
        $q_student = DB::table('students AS s')->select(DB::raw('s.fname,s.lname,s.email,s.mobile_no'))->where('s.id','=',$looged_studentid)->limit(1)->get();
        if($txt_amount > 0 && $looged_studentid > 0){
            foreach($q_student as $value){
                $looged_student_fname = $value->fname;
                $looged_student_lname = $value->lname;
                $looged_student_email = $value->email;
                $looged_student_mobile_no = $value->mobile_no;
            }

            $wallet_deposite_code = md5(time());
            $affectedRows =DB::table('students')->where('id', $looged_studentid)->update([                                                            
                'wallet_deposite_code'=> $wallet_deposite_code
            ]);
            $order_no = $wallet_deposite_code.'____'.$looged_studentid;
            $curl = curl_init();
            //   Gateway code: knet    ---  Gateway code for Test Knet:knet-test
            curl_setopt_array($curl, array(
            CURLOPT_URL => env("KNET_PAYMENT_URL"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "gateway_code":"'.env("KNET_PAYMENT_GATEWAY_CODE").'",
                "currency_code":"'.env('KNET_PAYMENT_CURRENCY_CODE').'",
                "amount":"'.$txt_amount.'",
                "order_no":"'.$order_no.'",
                "full_name": "'.$looged_student_fname.' '.$looged_student_lname.'",
                "customer_email":"'.$looged_student_email.'",
                "customer_phone":"'.$looged_student_mobile_no.'",
                "initiator":"2",
                "disclosure_url":"'.url('/payment-knet/my-wallet-get-knet-responce').'",
                "redirect_url":"'.url('/student/my-wallet').'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $final_res = json_decode($response);
            
            if(!empty($final_res->payment_url)){
               $payment_url = $final_res->payment_url;
               return redirect($payment_url);
            }
            else{
                return redirect("/student/my-wallet")->with('error','We could not connect payment gateway, Please try after some time.');    
            }
        }
        else{
            return redirect("/student/my-wallet")->with('error','Invalid amount.');
        }
        

        
    }
    
    public function knetResponce(Request $request){        
        $amount = $request->amount;
        $order_no = $request->order_no;
        /*$currency_code = $request->currency_code;
        $customer_email = $request->customer_email;
        $customer_phone = $request->customer_phone;
        $extra = $request->extra;
        $gateway_account = $request->gateway_account;
        $gateway_name = $request->gateway_name;
        $reference_number = $request->reference_number;
        $gateway_response = $request->gateway_response*/
        $result = $request->result;
        if($result == 'success' && $amount > 0){            
            $explode_order_no = explode("____",$order_no);
            $wallet_deposite_code = $explode_order_no[0];
            $looged_studentid     = $explode_order_no[1];
            $affectedRows =DB::table('students')->where('id', $looged_studentid)->update([                                                            
                'wallet_deposite_code'=> '',
                'wallet_amount'=> DB::raw('wallet_amount+'.$amount)                                                        
            ]);            
        }                 
    }
}
