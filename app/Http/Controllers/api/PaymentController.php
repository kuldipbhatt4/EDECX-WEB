<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Student;
use App\Tutors;
use App\StudentDetails;
use App\Level;
use App\ClassType;
use App\Subject;
use DB;
use Illuminate\Http\Request;
use RestResponse;
use Illuminate\Support\Facades\Response;

class PaymentController extends Controller
{

    public function getPayment(Request $request){
            $student_id = $request->student_id;
             if($student_id != ''){
             $data = DB::table('card')
                    ->select('*')
                    ->where('student_id', '=', $student_id)
                    ->get()->first();
                   
                  if($data){
                       return RestResponse::success_new('true',$data);
                   }else{
                        return RestResponse::warning('Card Detail Not Found',200);
                   }

            }else{
             return RestResponse::warning('Student id Not Found',200);
            }
    }

    //set payment
    public function setPayment(Request $request){
            $student_id = $request->student_id;
            $data_check = DB::table('card')
                    ->select('*')
                    ->where('student_id', '=', $student_id)
                    ->get()->count();
            if($data_check > 0){


            $data['card_name'] = $request->card_name;
            $data['card_number'] = $request->card_number;
            $data['card_type'] = $request->card_type;
             $data['billing_street'] = $request->billing_street;
             $data['billing_town'] = $request->billing_town;
             $data['billing_city'] = $request->billing_city;
             $data['billing_zipcode'] = $request->billing_zipcode;

             if($request->student_id != '' & $request->card_name != '' & $request->card_number != '' & $request->card_type != '' & $request->billing_street != '' & $request->billing_town != '' & $request->billing_city != '' & $request->billing_zipcode != '' ){

            $query =  DB::table('card')->where('student_id', $student_id)->update($data);

            return RestResponse::success_new('true','Card info updated');
            }else{
             return RestResponse::warning('all fields are required',200);
            }
        }else{
            return RestResponse::warning('student id not found',200);
        }
    }

}
