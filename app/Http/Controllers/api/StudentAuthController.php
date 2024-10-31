<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Student;
use App\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RestResponse;
use DB;

class StudentAuthController extends Controller
{

    public function register(Request $request){

        try{
            if($request->filled('email')){
                $checkStudent = Student::where('email',$request->email)->first();
                if(! empty($checkStudent)){
                    return RestResponse::warning('Student already exists.');
                }
                $data_array = array(
                    'fname' => $request->fname,
                    'middle_name' => $request->middle_name,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'level' => $request->level,
                    'student_dob' => $request->student_dob,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'street_address' => $request->street_address,
                    'street_address_line2' => $request->street_address_line2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'mobile_no' => $request->mobile_no,
                    'work_no' => $request->work_no,
                    'phone_no' => $request->phone_no,
                    'password' => Hash::make($request->password)
                );

                $student = Student::create($data_array);

                //$token = $student->createToken('Api Token')->accessToken;
                //$response['access_token'] = $token;

                return RestResponse::success('Student successfully registered.');
            }else {
                return RestResponse::error("Email is Request.");
            }
        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
        }
    }
//Login Student
    public function login(Request $request){
        try{
            $credentials = $request->only('email', 'password');
            $checkStudent = Student::where("email",$credentials['email'])->first();

            if(!$checkStudent){
                return RestResponse::warning('Incorrect user OR password',200);
            }else{
                $post_password = Hash::check($credentials['password'],$checkStudent->password);
                if($post_password){

                 $id =$checkStudent->id;
                $query =DB::table('students')
                    ->select('students.*','student_details.id as s_detail_id',"student_details.aboutme","student_details.classid","student_details.student_image","student_details.latitude","student_details.longitude")
                    ->join('student_details', 'students.id', '=', 'student_details.sid')
                    ->where('students.id',"=",$id)
                    ->get()->first();

            $envpath = env("APP_URL");    
            
            $data["id"] = $query->id;
            $data["fname"] = $query->fname;
            $data["middle_name"] = $query->middle_name;
            $data["lname"] = $query->lname;
            $data["student_dob"] = $query->student_dob;
            $data["gender"] = $query->gender;
            $data["address"] = $query->address;
            $data["street_address"] = $query->street_address;
            $data["street_address_line2"] = $query->street_address_line2;
            $data["city"] = $query->city;
            $data["state"] = $query->state;
            $data["zipcode"] = $query->zipcode;
            $data["email"] = $query->email;
            $data["mobile_no"] = $query->mobile_no;
            $data["phone_no"] = $query->phone_no;
            $data["work_no"] = $query->work_no;
            $data["subject"] = $query->subject;
            $data["level"] = $query->level;
            $data["created_at"] = $query->created_at;
            $data["updated_at"] = $query->updated_at;
            $data["classid"] = $query->classid;
            $data["aboutme"] = $query->aboutme;
            if($query->student_image != ""){
            $data["student_image"] = $envpath.'/edecx/website/student-profile/'.$query->student_image;
            }else{
                $data["student_image"] = "";    
            }
            $data["latitude"] = $query->latitude;
            $data["longitude"] = $query->longitude;
                return RestResponse::success($data);
                }else{
                     return RestResponse::warning('Incorrect user OR password',200);
                }
            }


        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
        }
    }

    //forget password
    public function forgot_password(Request $request){
        $email = $request->email;
        $usertype = $request->usertype;
        if($email != ""){
            if($usertype == 1){
               $query =  DB::table('students')->where('email', $email)->get();
               if($query->count() > 0){
                    $std = $query->first();
                    $user_id = $std->id;
                    $otp= rand(1111,9999);
                    $update =  DB::table('students')->where('id', $user_id)->update(['otp' =>  $otp]);
                    if($update){
                        /* main start */
                        $to = "dhdholariya@gmail.com";
                        $subject = "OTP verification";
                        $txt = "Your forget password otp is ". $otp;
                        $headers = "From: rpconsultancy@gmail.com";

                        mail($to,$subject,$txt,$headers);
                        /* main end */
                        return RestResponse::success_new('true','otp updated.');
                    }else{
                        return RestResponse::success_new('false','otp update fail');
                    }
                }else{
                     return RestResponse::success_new('false','email id not found');
                }
            }elseif($usertype == 2){
                $query =  DB::table('tutors')->where('tutor_email', $email)->get();
                if($query->count() > 0){
                    $tut = $query->first();
                    $user_id = $tut->id;
                    $otp= rand(1111,9999);
                    $update =  DB::table('tutors')->where('id', $user_id)->update(['otp' =>  $otp]);
                    if($update){
                        return RestResponse::success_new('true','otp updated.');
                    }else{
                        return RestResponse::success_new('false','otp update fail');
                    }
                }else{
                     return RestResponse::success_new('false','email id not found');
                }
            }else{
                $query = '';
                return RestResponse::success_new('false','usertype invalid');
            }

        }else{
             return RestResponse::success_new('false','Email Address Required');
        }
    }

    //opt verify
    public function otp_verify(Request $request){
        $otp = $request->otp;
        $email = $request->email;
        $usertype = $request->usertype;
        if($email != "" & $otp != "" & $usertype != ""){
            if($usertype == 1){
                    $check =  DB::table('students')->where('email', $email)->where('otp', $otp)->first();
                    $check =  DB::table('students')->where('email', $email)->first();
                    if($check){
                        return RestResponse::success_new('true','otp verify successfully');
                    }else{
                        return RestResponse::success_new('false','otp verification fail');
                    }
            }elseif($usertype == 2){
                    $check =  DB::table('tutors')->where('tutor_email', $email)->where('otp', $otp)->first();
                    $check =  DB::table('tutors')->where('tutor_email', $email)->first();
                    if($check){
                        return RestResponse::success_new('true','otp verify successfully');
                    }else{
                        return RestResponse::success_new('false','otp verification fail');
                    }
            }else{
                $query = '';
                return RestResponse::success_new('false','usertype invalid');
            }
        }else{
            return RestResponse::success_new('false','fields Required');
        }
    }

    //update-password
    public function update_password(Request $request){
        $password = Hash::make($request->password);
        $email = $request->email;
        $usertype = $request->usertype;
        if($email != "" & $password != "" & $usertype != ""){
            if($usertype == 1){
                    $check =  DB::table('students')->where('email', $email)->update(['password' =>  $password]);
                    if($check){
                        return RestResponse::success_new('true','password update successfully');
                    }else{
                        return RestResponse::success_new('false','password update fail');
                    }
            }elseif($usertype == 2){
                    $check =  DB::table('tutors')->where('tutor_email', $email)->update(['password' =>  $password]);
                    if($check){
                        return RestResponse::success_new('true','password update successfully');
                    }else{
                        return RestResponse::success_new('false','password update fail');
                    }
            }else{
                $query = '';
                return RestResponse::success_new('false','usertype invalid');
            }
        }else{
            return RestResponse::success_new('false','fields Required');
        }
    }

    //changepassword
    public function change_password(Request $request){
        $old_password = $request->old_password;

        $new_password = Hash::make($request->new_password);
        $email = $request->email;
        $usertype = $request->usertype;
        if($email != "" & $old_password != "" & $new_password != "" & $usertype != ""){
            if($usertype == 1){
                $checkStudent=Student::where("email",$email)->first();
               $query = Hash::check($old_password,$checkStudent->password);
               if(!$query){
                    return RestResponse::success_new('false','old password not matched');
               }else{
                    $check =  DB::table('students')->where('email', $email)->update(['password' =>  $new_password]);
                    if($check){
                        return RestResponse::success_new('true','password changed successfully');
                    }else{
                        return RestResponse::success_new('false','password changed fail');
                    }
                }
            }elseif($usertype == 2){
                     $checkStudent=Tutor::where("tutor_email",$email)->first();
               $query = Hash::check($old_password,$checkStudent->password);
               if(!$query){
                    return RestResponse::success_new('false','old password not matched');
               }else{
                    $check =  DB::table('tutors')->where('tutor_email', $email)->update(['password' =>  $new_password]);
                    if($check){
                        return RestResponse::success_new('true','password changed successfully');
                    }else{
                        return RestResponse::success_new('false','password changed fail');
                    }
                }
            }else{
                $query = '';
                return RestResponse::success_new('false','usertype invalid');
            }
        }else{
            return RestResponse::success_new('false','fields Required');
        }
    }


	public function getUser() {
        try {
            $user = Auth::user();

            if(empty($user)){
                return RestResponse::warning('Woops something went wrong. Please try again.',422);
            }

            return RestResponse::success($user,'User details successfully retrieved');
        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
        }
    }

	protected function guard()
	{
		return Auth::guard('studentapi');
	}


    public function logout()
    {
        Auth::user()->token()->delete();
        return RestResponse::success([],'Token successfully removed');
    }
}
