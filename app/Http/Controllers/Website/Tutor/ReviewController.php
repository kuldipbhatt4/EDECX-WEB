<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\StudentDetails;
use App\Tutor;
use App\Review;
use Illuminate\Support\Facades\Auth;
use DB;

class ReviewController extends Controller
{
    public function myreceivedReview()
    {       
        return view('/tutor/my-received-review');
    }
    
    public function myReceivedReviewPagination(Request $request){   
        $logged_tutor_id       =  Auth::guard('tutors')->id();
        $getBookings = DB::table('review AS r')
        ->leftJoin('students AS s', 's.id', '=', 'r.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'r.student_id')
        
        ->select(            
            DB::raw('r.id AS review_id,r.rating,r.review_description,r.student_id,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image'),            
        )->where('r.tutor_id','=',$logged_tutor_id);
        
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
                    $returnData['html'] .= view('/tutor/my-received-review-rec',
                        [                            
                            'review_id'=>$getBooking->review_id,
                            'student_id'=>$getBooking->student_id,      
                            'rating'=>$getBooking->rating,                            
                            'review_description'=>$getBooking->review_description,
                            'student_image'=>$getBooking->student_image,
                            'email'=>$getBooking->email,                            
                            'fname'=>$getBooking->fname,
                            'lname'=>$getBooking->lname
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
