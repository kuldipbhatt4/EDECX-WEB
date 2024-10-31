<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Review;
use DB;
use Illuminate\Http\Request;
use RestResponse;

class ReviewController extends Controller
{
    public function review(Request $request){
                if($request->tutor_id != '' & $request->student_id != '' & $request->rate != ''){
                    $data_array = array(
                        'tutor_id' => $request->tutor_id,
                        'student_id' => $request->student_id,
                        'rating' => $request->rate,
                        'review_description' => $request->review_description
                    );

                    $review = Review::create($data_array);
                     return RestResponse::success_new('true','Review add successfully.');
                          
                }else{        
                    return RestResponse::success_new('false','Review not add failed.');  
                }    
                //$token = $student->createToken('Api Token')->accessToken;
                //$response['access_token'] = $token;
            }


         //faq
         public function faq(Request $request){
                if($request->user_type != '' ){
                    $user_type = $request->user_type;
                    $query =  DB::table('faq')->where('student_tutor', $user_type)->get();
                     return RestResponse::success_new('true',$query);
                          
                }else{        
                    return RestResponse::success_new('false','faq get failed');  
                }    
                //$token = $student->createToken('Api Token')->accessToken;
                //$response['access_token'] = $token;
            }   

    
}

    
