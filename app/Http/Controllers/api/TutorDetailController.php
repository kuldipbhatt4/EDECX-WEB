<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Tutors;
use DB;
use Illuminate\Http\Request;
use RestResponse;
use Illuminate\Support\Facades\Response;
class TutorDetailController extends Controller
{
    //tutor list
     public function tutor_detail(Request $request)
    {
    //    DB::enableQueryLog(); // Enable query log
        $tutorid = $request->tutorid;
        if($tutorid != ''){
        $tutor =    DB::table('tutors')
                    ->select('*')
                    ->join('tutor_details', 'tutors.id', '=', 'tutor_details.tid')
                    ->join('classtype', 'classtype.id', '=', 'tutor_details.classid')
                    ->where('tutors.status', '=', 0)
                    ->where('tutors.id', '=', $tutorid)
                    ->get()->first();

                    if(!$tutor){
                        return RestResponse::warning('Tutor Detail Not Found',200);
                    }else{


                    $envpath = env("APP_URL");
                    $path = $envpath.('edecx/admin/subject-icon/');
                    $pathimage = $envpath.('/public/edecx/website/tutor-profile/');



                        $rates =DB::table('review')
                    ->select('*')
                    ->join('students', 'students.id', '=', 'review.student_id')
                    ->join('tutors', 'tutors.id', '=', 'review.tutor_id')
                     ->where('tutors.status', '=', 0)
                    ->where('tutors.id', '=', $tutorid)
                    ->get();
                        $ratings = array();
                        foreach($rates as $rate_loop){
                            $rate_arr['id'] = $rate_loop->id;
                            $rate_arr['tutor_name'] = $rate_loop->tutors_fname.' '.$rate_loop->tutors_lname;
                            $rate_arr['student_name'] = $rate_loop->fname.' '.$rate_loop->lname;
                            $rate_arr['rating'] = $rate_loop->rating;
                            $rate_arr['review_description'] = $rate_loop->review_description;
                            $ratings[]=$rate_arr;
                        }

                        $tutor_image = $pathimage.$tutor->tutor_image;
                        if($tutor->tutor_image == ''){
                            $tutor_image = $envpath.('edecx/admin/default/default.jpg');
                        } 
                        $response = [
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
                            'review' => $ratings ,
                        ];


                    return RestResponse::success_new('true',$response);
                }
        }else{
             return RestResponse::warning('Tutor Detail Not Found',200);
        }
    }

    //profile upload
     public function tutor_profile(Request $request)
    {
        $tutor_id = $request->tutor_id;

           $check = $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             if($check){


                 $imageName = time().'.'.request()->image->getClientOriginalExtension();
                 $image_move =  request()->image->move('edecx/website/tutor-profile/', $imageName);
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->update(['tutor_image' =>  $imageName]);
                 if(!$query){
                    return RestResponse::success_new('false','Image Upload failed.');
                }else{
                    $envpath = env("APP_URL");
                    $response = [];

                    $response['status'] = 'true';
                    $response['code'] = 200;
                    $response['message'] = 'Success Response';
                    $response['data']= 'Image upload successfully';

                    $response['Image_Path']=$envpath.('/public/edecx/website/tutor-profile/'.$imageName);
                    $response['error']= [];
                    return Response::json($response,200);
                }
           }else{

             return RestResponse::success_new('false','Image Upload failed.');
           }


    }


    //edit rate
    public function tutor_rate(Request $request)
    {
        $tutor_id = $request->tutor_id;
        $rate = $request->rate;

          /* $check = $request->validate([
                'rate' => 'required|min:1'
            ]);*/
             if($rate != ''){
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->update(['hrprice' =>  $rate]);

            return RestResponse::success_new('true','Tutor Hourly Rate Update successfully.');
           }else{

             return RestResponse::success_new('false','Tutor Hourly Rate Update failed.');
           }


    }

     public function get_tutor_rate(Request $request)
    {
        $tutor_id = $request->tutor_id;

             if($tutor_id != ''){
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->get()->first();

                $data['rate'] = $query->hrprice;
            return RestResponse::success_new('true',$data);
           }else{

             return RestResponse::success_new('false','Tutor rate Get failed.');
           }


    }



    //edit bio
     public function tutor_bio(Request $request)
    {
        $tutor_id = $request->tutor_id;
        $bio = $request->bio;

          /* $check = $request->validate([
                'rate' => 'required|min:1'
            ]);*/
             if($bio != ''){
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->update(['description' =>  $bio]);

                if($query){
                    return RestResponse::success_new('true','Tutor Bio Update successfully.');
                }else{
                    return RestResponse::success_new('false','Tutor Update failed.');
                }
                
           }else{

             return RestResponse::success_new('false','Tutor Bio Update failed.');
           }


    }

     public function get_tutor_bio(Request $request)
    {
        $tutor_id = $request->tutor_id;

             if($tutor_id != ''){
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->get()->first();

                $data['bio'] = $query->description;
            return RestResponse::success_new('true',$data);
           }else{

             return RestResponse::success_new('false','Tutor Bio Get failed.');
           }


    }


    //edit detail
     public function tutor_profile_detail(Request $request)
    {
        $tutor_id = $request->tutor_id;
        $data['tutors_fname'] = $request->tutors_fname;
        $data['tutors_lname'] = $request->tutors_lname;
        $data['tutor_email'] = $request->tutor_email;
        $data['resume'] = $request->resume;
        $data['contact_no'] = $request->contact_no;

          /* $check = $request->validate([
                'rate' => 'required|min:1'
            ]);*/
             if($tutor_id != '' & $data['tutors_fname'] != '' & $data['tutors_lname'] != '' & $data['tutor_email']!= '' & $data['resume'] != '' & $data['contact_no'] != ''){
                 $query =  DB::table('tutors')->where('id', $tutor_id)->update($data);
                 if(!$query){
                    return RestResponse::success_new('false','Tutor Detail Update failed.');
                 }else{
                    return RestResponse::success_new('true','Tutor Detail Update successfully.');
                }
           }else{

             return RestResponse::success_new('false','Tutor Detail Update failed.');
           }


    }

    public function get_qualification(Request $request){

        $tutor_id=$request->tutor_id;
        if($tutor_id != ''){
            $tutor = DB::table('tutor_details')
                    ->select('*')
                    ->join('levels', 'levels.id', '=', 'tutor_details.lid')
                    ->join('subjects', 'subjects.id', '=', 'tutor_details.sid')
                    ->where('tutor_details.tid', '=', $tutor_id)
                    ->get()->first();
            if($tutor){
                    return RestResponse::success_new('true',$tutor);
            }else{
                return RestResponse::success_new('false','Get Qualification Details fails');
            }
        }else{
            return RestResponse::success_new('false','Tutor id required.');
        }
    }


    public function set_qualification(Request $request){

        $tutor_id=$request->tutor_id;
        $gra_collage=$request->gra_collage;
        $level_id=$request->level_id;
        $student_id=$request->student_id;
        if($tutor_id != '' & $gra_collage != "" & $level_id != "" & $student_id != ""){
            $data['gra_college'] = $gra_collage;
            $data['sid'] = $student_id;
            $data['lid'] = $level_id;
           $query =  DB::table('tutor_details')->where('tid', $tutor_id)->update($data);
            if($query){
                    return RestResponse::success_new('true',"tutor qualification updated successfully");
            }else{
                return RestResponse::success_new('false','Get Qualification Details fails');
            }
        }else{
            return RestResponse::success_new('false','fields required.');
        }
    }



}
