<?php

namespace App\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\StudentDetails;
/*use App\Tutor;
use App\Review;*/
use \DB;
use Illuminate\Support\Facades\Auth;

class GivenReviewController extends Controller
{
    public function myGivenReview()
    {       
        return view('/student/my-given-review');
    }
    
    public function myGivenReviewPagination(Request $request){   
        $looged_studentid       = Auth::guard('students')->id();
        $getBookings = DB::table('review AS r')
        ->leftJoin('tutors AS t', 't.id', '=', 'r.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'r.tutor_id')
        
        ->select(            
            DB::raw('r.id AS review_id,r.rating,r.review_description,r.tutor_id,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image'),            
        )->where('r.student_id','=',$looged_studentid);
        
        $getBookings =  $getBookings->orderBy('r.id','DESC');
        $totalRec = $getBookings->count(); 
        $getBookings = $getBookings->groupBy('r.id');             
        $getBookings = $getBookings->paginate(env('PAGE_DISPLAY_LIMIT'));        

        $returnData= array();
        $returnData['html'] = '';
        $returnData['nextPage'] = false;
        $returnData['totalRec'] = $totalRec;
        if(!empty($getBookings) && count($getBookings) > 0){
            if($getBookings->total() >= $getBookings->currentPage()){
                foreach($getBookings as $getBooking){                                              
                    $returnData['html'] .= view('/student/my-given-review-rec',
                        [                            
                            'review_id'=>$getBooking->review_id,
                            'tutor_id'=>$getBooking->tutor_id,      
                            'rating'=>$getBooking->rating,                            
                            'review_description'=>$getBooking->review_description,
                            'tutor_image'=>$getBooking->tutor_image,
                            'tutor_email'=>$getBooking->tutor_email,                            
                            'tutors_fname'=>$getBooking->tutors_fname,
                            'tutors_lname'=>$getBooking->tutors_lname
                        ]
                    )->render();
                    
                }
                $returnData['nextPage'] = true;
            }
            else{
                $returnData['html'] = "<tr><td>No more record found</td></tr>";
            }
        }
        else{
            if($getBookings->currentPage() > 1){
                $returnData['html'] =  "<tr><td>No more record found</td></tr>";
            }
            else{
                $returnData['html'] =  "<tr><td>No record found</td></tr>";
            }
        }
        return json_encode($returnData);
    } 
}
