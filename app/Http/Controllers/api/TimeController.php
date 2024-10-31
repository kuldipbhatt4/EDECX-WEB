<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Time;
use App\TutorTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RestResponse;

class TimeController extends Controller
{
    public function getTutorTime(Request $request){
                if($request->tutor_id != ''){
                    
                   $tutor_id = $request->tutor_id;
                   $day =  DB::table('days')->get();
                   $main_day = array();
                   foreach ($day as $day_val) {

                       $day_loop['day_id'] = $day_val->id;
                       $day_loop['dayname'] = $day_val->day;

                       //$time = DB::table('time')->where('', $tutor_id)->get()->first();
                       $time = DB::table('time')->get();
                       $main_time_array = array();
                       foreach($time as $time_val){
                            $time_loop['id'] = $time_val->id;
                            $time_loop['start_time'] = $time_val->start_time;
                            $time_loop['end_time'] = $time_val->end_time;

                            $time_id = $time_val->id;
                            $day_id = $day_val->id;
                            $tutor_check =  DB::table('tutor_time')->where('tutor_id', $tutor_id)->where('days_id', $day_id)->where('time_id', $time_id)->get()->count();
                            if($tutor_check > 0){
                             $time_loop['tutor_selected'] = 1;   
                            }else{
                               $time_loop['tutor_selected'] = 0;  
                            }
                            $main_time_array[] = $time_loop;

                       }
                       $day_loop['time'] =  $main_time_array;

                       $main_day[] = $day_loop;
                   }
                    
                    $response['status'] = true;
                    $response['code'] = 200;
                    $response['message'] = 'Response success.';
                    $response['data']= $main_day;
                    $response['error']= [];
                    return Response::json($response,200);
                          
                }else{        
                    return RestResponse::success_new('false','time and days not add available');  
                }    
                //$token = $student->createToken('Api Token')->accessToken;
                //$response['access_token'] = $token;
            }

            //set tutor time
    public function setTutorTime(Request $request){
      $tutor_id = $request->tutor_id;
      $json = $request->timeslot_data;
      $data_array = json_decode($json);
      if($tutor_id != "" & is_array($data_array)){
      
        foreach($data_array as $day){
            $day_id = $day->day_id;
            $time_array = $day->time;
            foreach($time_array as $time){
              $time_id = $time->id;
             
              if($time->tutor_selected == 1){
                  $data['tutor_id'] = $tutor_id;
                  $data['days_id'] = $day_id;
                  $data['time_id'] = $time_id;
                $insert = DB::table('tutor_time')->insert($data);
              }
            }
        }
        if($insert){
            return RestResponse::success_new('true','Timeslot add successfully');
        }
      }else{
        return RestResponse::success_new('true','fields are not valid');       
      }
    }


  //get tutor day wise time
   public function getTutorDayTime(Request $request){
                if($request->tutor_id != '' || $request->day_id != '' ){
                    
                   $tutor_id = $request->tutor_id;
                   $days_id = $request->days_id;
                   $day_val =  DB::table('days')->where('id',$days_id)->get()->first();
                 

                       $day_loop['day_id'] = $day_val->id;
                       $day_loop['dayname'] = $day_val->day;

                       //$time = DB::table('time')->where('', $tutor_id)->get()->first();
                       $time = DB::table('time')->get();
                       $main_time_array = array();
                       foreach($time as $time_val){
                            $time_loop['id'] = $time_val->id;
                            $time_loop['start_time'] = $time_val->start_time;
                            $time_loop['end_time'] = $time_val->end_time;

                            $time_id = $time_val->id;
                            $day_id = $day_val->id;
                            $tutor_check =  DB::table('tutor_time')->where('tutor_id', $tutor_id)->where('days_id', $day_id)->where('time_id', $time_id)->get()->count();
                            if($tutor_check > 0){
                             $time_loop['tutor_selected'] = 1;   
                            }else{
                               $time_loop['tutor_selected'] = 0;  
                            }
                            $main_time_array[] = $time_loop;

                       }
                       $day_loop['time'] =  $main_time_array;

                     
                    
                    $response['status'] = true;
                    $response['code'] = 200;
                    $response['message'] = 'Response success.';
                    $response['data']= $day_loop;
                    $response['error']= [];
                    return Response::json($response,200);
                          
                }else{        
                    return RestResponse::success_new('false','time and days not add available');  
                }    
                //$token = $student->createToken('Api Token')->accessToken;
                //$response['access_token'] = $token;
            } 
    
}

    
