<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Tutors;
use DB;
use Illuminate\Http\Request;
use RestResponse;

class TutorListController extends Controller
{
        

    //tutor list
public function tutor_list(Request $request)
    {
        $levelid = $request->levelid;
        $subjectid = $request->subjectid;
        //$levelid = $request->levelid;
        $classid = $request->classid;

    //    DB::enableQueryLog(); // Enable query log
        $tutors =    DB::table('tutors')
                    ->select('*')
                    ->join('tutor_details', 'tutors.id', '=', 'tutor_details.tid')
                    ->join('classtype', 'classtype.id', '=', 'tutor_details.classid')
                    ->where('tutors.status', '=', 0)
                    ->where('tutor_details.lid', '=', $levelid)
                    ->where('tutor_details.sid', '=', $subjectid)
                    ->where('tutor_details.classid', '=', $classid)
                    ->get();
                   
                    $envpath = env("APP_URL");
                    $path = $envpath.('/edecx/admin/subject-icon/');
                    $pathimage = $envpath.('/edecx/website/tutors/');

                if(sizeof($tutors) != 0){
                    foreach($tutors as $tutor){
                        $rate = DB::table('review')->where('tutor_id',$tutor->tid)->avg('rating');
                        if($rate == null){
                            $rate = 0;
                        }
                        $tutor_image = $pathimage.$tutor->tutor_image;
                        if($tutor->tutor_image == ''){
                            $tutor_image = $envpath.('/edecx/admin/default/default.jpg');
                        } 
                        $response[] = [
                            'id' => $tutor->tid,
                            'tutor_image' => $tutor_image,
                            'address' => $tutor->address,
                            'resume' => $tutor->resume,
                            'status' => $tutor->status,
                            'sid' => $tutor->sid,
                            'lid' => $tutor->lid,
                            'classid' => $tutor->classid,
                            'gender' => $tutor->gender,
                            'tutor_dob' => $tutor->tutor_dob,
                            'experience' => $tutor->experience,
                            'ugra_college' => $tutor->ugra_college,
                            'gra_college' => $tutor->gra_college,
                            'ugra_major' => $tutor->ugra_major,
                            'gra_major' => $tutor->gra_major,
                            'typedegree' => $tutor->typedegree,
                            'city' => $tutor->city,
                            'urearning' => $tutor->urearning,
                            'description' => $tutor->description,
                            'hrprice' => $tutor->hrprice,
                            'latitude' => $tutor->latitude,
                            'longitude' => $tutor->longitude,
                            'tutors_fname' => $tutor->tutors_fname,
                            'tutors_lname' => $tutor->tutors_lname,
                            'tutor_email' => $tutor->tutor_email,
                            'contact_no' => $tutor->contact_no,
                            'classtype' => $tutor->classtype,
                            'review' => $rate ,
                        ];
                    }
                    return RestResponse::success_new('true',$response);
                }else{
                    return RestResponse::success_new('false','data not found');
                }
    }
}
