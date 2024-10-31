<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RestResponse;
use DB;

class TutorAuthController extends Controller
{
    public function register(Request $request){
        try{
            if($request->filled('tutor_email')){
                $checkTutor = Tutor::where('tutor_email',$request->tutor_email)->first();
                if(! empty($checkTutor)){
                    return RestResponse::warning('Tutor already exists.');
                }
                $tutor = Tutor::create([
                    'tutors_fname' => $request->tutors_fname,
                    'tutors_lname' => $request->tutors_lname,
                    'tutor_email' => $request->tutor_email,
                    'contact_no' => $request->contact_no,
                    'password' => Hash::make($request->password),
                ]);

                $token = $tutor->createToken('Api Token')->accessToken;
                $response['access_token'] = $token;
                return RestResponse::success($response,'Tutor successfully registered.');
            }
        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
        }
    }

    public function login(Request $request){
        try{
            $credentials = $request->only('tutor_email', 'password');
            $checkTutor = Tutor::where("tutor_email",$credentials['tutor_email'])->first();
            if(!$checkTutor){
                return RestResponse::warning('Incorrect user OR password',422);
            }

            $response['access_token'] = $checkTutor->createToken('Website Token')->accessToken;
            return RestResponse::success($response,'Access token successfully retrieved');
        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
        }
    }

    public function login_new(Request $request){
        try{
            $credentials = $request->only('tutor_email', 'password');
            $checkTutor = Tutor::where("tutor_email",$credentials['tutor_email'])->first();

            if(!$checkTutor){
                return RestResponse::warning('Incorrect user OR password',200);
            }else{
                $post_password = Hash::check($credentials['password'],$checkTutor->password);
                if($post_password){
                $id =$checkTutor->id;
                $query = DB::table('tutors')
                    ->select('*')
                    ->join('tutor_details', 'tutors.id', '=', 'tutor_details.tid')
                    ->join('classtype', 'classtype.id', '=', 'tutor_details.classid')
                    ->join('subjects', 'subjects.id', '=', 'tutor_details.sid')
                    ->join('levels', 'levels.id', '=', 'tutor_details.lid')
                    ->where('tutors.status', '=', 0)
                    ->where('tutors.id', '=', $id)
                    ->get()->first();
                return RestResponse::success($query);
                }else{
                     return RestResponse::warning('Incorrect user OR password',200);
                }
            }
        }catch (\Exception $e){
            return RestResponse::error($e->getMessage());
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
		return Auth::guard('tutorapi');
	}

    public function logout()
    {
        Auth::user()->token()->delete();
        return RestResponse::success([],'Token successfully removed');
    }
}
