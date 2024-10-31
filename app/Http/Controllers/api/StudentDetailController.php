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

class StudentDetailController extends Controller
{
    public function getPersonalInfo(Request $request){
            $student_id = $request->student_id;
             if($student_id != ''){
             $data = DB::table('students')
                    ->select('students.fname','students.lname','students.middle_name','students.gender','students.student_dob','students.mobile_no','students.email','student_details.aboutme','student_details.student_image')
                    ->join('student_details', 'students.id', '=', 'student_details.sid')
                    ->where('students.id', '=', $student_id)
                    ->get()->toArray();
                   
                    if($data){
                        $data_array= (array) $data[0];
                        $envpath = env("APP_URL");
                        if($data[0]->student_image != ""){
                            $profile_path = $envpath.'public/edecx/website/student-profile/'.$data[0]->student_image;
                        }else{
                            $profile_path = "";    
                        }
                        
                        array_pop($data_array);
                        $data_array['student_image'] = $profile_path;
                       return RestResponse::success_new('true',$data_array);
                   }else{
                        return RestResponse::warning('Student Detail Not Found',200);
                   }

            }else{
             return RestResponse::warning('Student id Not Found',200);
            }
    }

    //student personal edit
    public function setPersonalInfo(Request $request){
            $student_id = $request->student_id;
            $result = DB::table('students')
                    ->select('*')
                    ->where('id', '=', $student_id)
                    ->get()->count();
            if($result > 0){
            $data['id'] = $request->student_id;
            $data['fname'] = $request->fname;
            $data['lname'] = $request->lname;
            $data['middle_name'] = $request->middle_name;
            $data['gender'] = $request->gender;
            $data['student_dob'] = $request->student_dob;
            $data['mobile_no'] = $request->mobile_no;
            $data['email'] = $request->email;
            $data2['aboutme'] = $request->aboutme;

            if($request->image != ''){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $image_move =  request()->image->move('public/edecx/website/student-profile/', $imageName);
            $data2['student_image'] = $imageName;    
            }
            

             if($request->student_id != '' & $request->fname != '' & $request->lname != '' & $request->middle_name != '' & $request->gender != '' & $request->student_dob != '' & $request->mobile_no != '' & $request->email != '' & $request->aboutme != '' ){

            $query1 =  DB::table('students')->where('id', $student_id)->update($data);
            $query2 =  DB::table('student_details')->where('sid', $student_id)->update($data2);

            return RestResponse::success_new('true','personal info updated');
            }else{
             return RestResponse::warning('all fields are required',200);
            }    
            }else{
                    return RestResponse::warning('Student not found',200);   
            }
            
    }

     public function getQualificationInfo(Request $request){
            $student_id = $request->student_id;
             if($student_id != ''){
             $data = DB::table('students')
                    ->select('levels.level','levels.id as level_id','subjects.subject_name','subjects.id as sub_id','classtype.classtype','classtype.id as classid')
                    ->join('subjects', 'students.subject', '=', 'subjects.id')
                    ->join('levels', 'students.level', '=', 'levels.id')
                    ->join('student_details', 'students.id', '=', 'student_details.sid')
                    ->join('classtype', 'classtype.id', '=', 'student_details.classid')
                    ->where('students.id', '=', $student_id)
                    ->get()->first();
                    if($data){
                       return RestResponse::success_new('true',$data);
                   }else{
                        return RestResponse::warning('Student Detail Not Found',200);
                   }

            }else{
             return RestResponse::warning('Student id Not Found',200);
            }
    }

    //student qualification edit
    public function setQualificationInfo(Request $request){
            $student_id = $request->student_id;
            $data['id'] = $request->student_id;
            $data['level'] = $request->level_id;
            $data['subject'] = $request->subject_id;
             $data2['classid'] = $request->class_id;

             if($request->student_id != '' & $request->level_id != '' & $request->subject_id != '' & $request->class_id ){

            $query1 =  DB::table('students')->where('id', $student_id)->update($data);
            $query2 =  DB::table('student_details')->where('sid', $student_id)->update($data2);

            return RestResponse::success_new('true','Qualification info updated');
            }else{
             return RestResponse::warning('all fields are required',200);
            }
    }

    //student address
    public function getAddressInfo(Request $request){
            $student_id = $request->student_id;
             if($student_id != ''){
             $data = DB::table('students')
                    ->select('address','street_address','street_address_line2','city','state','zipcode')
                    ->where('id', '=', $student_id)
                    ->get()->first();
                    if($data){
                       return RestResponse::success_new('true',$data);
                   }else{
                        return RestResponse::warning('Student Detail Not Found',200);
                   }

            }else{
             return RestResponse::warning('Student id Not Found',200);
            }
    }

    //student address edit
    public function setAddressInfo(Request $request){
            $student_id = $request->student_id;
            $data['address'] = $request->address;
            $data['street_address'] = $request->street_address;
            $data['street_address_line2'] = $request->street_address_line2;
             $data['city'] = $request->city;
             $data['state'] = $request->state;
             $data['zipcode'] = $request->zipcode;

             if($request->student_id != '' & $request->address != '' & $request->street_address != '' & $request->street_address_line2 != '' & $request->city != '' & $request->state != '' & $request->zipcode != '' ){

            $query =  DB::table('students')->where('id', $student_id)->update($data);

            return RestResponse::success_new('true','Address info updated');
            }else{
             return RestResponse::warning('all fields are required',200);
            }
    }

    //notification
    public function getNotification(Request $request){
    $type = $request->notification_type;

     $to = $request->notification_to;
        if($type != "" & $to != ""){
            
                if($type != 0){
                         $data = DB::table('notification')
                                ->select('*')
                                ->where('notification_to', '=', $to)
                                ->where('notification_type', '=', $type)
                                ->get();
                                if($data){
                                   return RestResponse::success_new('true',$data);
                               }else{
                                    return RestResponse::warning('Detail Not Found',200);
                               }

                    }else{
                        $data = DB::table('notification')
                            ->select('*')
                            ->get();
                            if($data){
                               return RestResponse::success_new('true',$data);
                           }else{
                                return RestResponse::warning('Detail Not Found',200);
                           }
                    }

        }else{
             return RestResponse::warning('id Not Found',200);
            }   
    }

    //delete 
    public function deleteAccount(Request $request){
            $user_id = $request->user_id;
            $type = $request->user_type;

             if($request->user_id != '' & $request->user_type != ""){
                $data['status'] = 3;
                if($request->user_type == 1){
                    $query =  DB::table('students')->where('id', $user_id)->update($data);
                }elseif($request->user_type == 2){
                    $query =  DB::table('tutors')->where('id', $user_id)->update($data);
                }else{
                    return RestResponse::success_new('true','User Type Not Found');
                }
               
               if($query){
                    return RestResponse::success_new('true','Account Delete Successfully');
               }else{
                    return RestResponse::success_new('true','Account Delete Failed');
               }
               
            }else{
             return RestResponse::warning('all fields are required',200);
            }
    }
    public function getNotificationSetting(Request $request){
        $user_id = $request->user_id;
        $user_type = $request->user_type;
             if($user_id != ''){

                if($user_type == 1){
                    $data = DB::table('student_details')
                    ->select('remail_noti','rupcoming_noti','rupdates_noti')
                    ->where('sid', '=', $user_id)
                    ->get()->first();
                    if($data){
                       return RestResponse::success_new('true',$data);
                   }else{
                        return RestResponse::warning('Notification Detail Not Found',200);
                   }

                }elseif($user_type == 2){
                    $data = DB::table('tutor_details')
                    ->select('remail_noti','rupcoming_noti','rupdates_noti')
                    ->where('tid', '=', $user_id)
                    ->get()->first();
                        if($data){
                           return RestResponse::success_new('true',$data);
                        }else{
                            return RestResponse::warning('Notification Detail Not Found',200);
                        }
                }else{
                    return RestResponse::warning('User type Not Found',200);
                }
                        if($data){
                           return RestResponse::success_new('true',$data);
                        }else{
                            return RestResponse::warning('Notification Detail Not Found',200);
                        }
            }else{
                return RestResponse::warning('User id not Found',200);
            }
    }
    public function setNotificationSetting(Request $request){
        $user_id = $request->user_id;
        $user_type = $request->user_type;
            if($user_id != ''){

            $data['remail_noti'] = $request->remail_noti;
            $data['rupcoming_noti'] = $request->rupcoming_noti;
            $data['rupdates_noti'] = $request->rupdates_noti;
            if($request->remail_noti != '' & $request->rupcoming_noti != '' & $request->rupdates_noti != ''){
                if($user_type == 1){
                    $query =  DB::table('student_details')->where('sid', $user_id)->update($data);
                    return RestResponse::success_new('true','Notification setting updated');
                }elseif($user_type == 2){
                    $query =  DB::table('tutor_details')->where('tid', $user_id)->update($data);
                    return RestResponse::success_new('true','Notification setting updated');
                }else{
                    return RestResponse::warning('User type not found',200);
                }
            }else{
             return RestResponse::warning('all fields are required',200);
            }

        }else{
            return RestResponse::warning('User Type Required',200);
        }
    }

}
