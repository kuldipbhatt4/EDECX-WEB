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

class OrderHistoryController extends Controller
{
    public function orderhistory()
    {       
        return view('/student/order-history');
    }
    
    public function orderHistorylistPagination(Request $request){   
        $looged_studentid       = Auth::guard('students')->id();
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')        
        ->select(            
            DB::raw('b.id AS booking_id,b.tutor_id,b.booking_date,b.price,b.status,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image,time.start_time'),
            DB::raw('(SELECT rating FROM review WHERE order_id = b.id AND tutor_id =b.tutor_id AND student_id = b.student_id LIMIT 1) AS student_given_review')            
        )->where('b.student_id','=',$looged_studentid);
        
        $getBookings =  $getBookings->orderBy('b.id','DESC');
        $totalRec = $getBookings->count(); 
        $getBookings = $getBookings->groupBy('b.id');             
        $getBookings = $getBookings->paginate(env('PAGE_DISPLAY_LIMIT'));        

        $returnData= array();
        $returnData['html'] = '';
        $returnData['nextPage'] = false;
        $returnData['totalRec'] = $totalRec;
        if(!empty($getBookings) && count($getBookings) > 0){
            if($getBookings->total() >= $getBookings->currentPage()){
                foreach($getBookings as $getBooking){                                              
                    $returnData['html'] .= view('/student/order-history-rec',
                        [                            
                            'booking_id'=>$getBooking->booking_id,
                            'student_given_review'=>$getBooking->student_given_review,
                            'tutor_id'=>$getBooking->tutor_id,
                            'booking_date'=>$getBooking->booking_date,
                            'status'=>$getBooking->status,
                            'price'=>number_format($getBooking->price,2),
                            'reschedule_link' => url('student/book-appointment/'.$getBooking->tutor_id.'?reschedule='.$getBooking->booking_id),
                            'tutor_image'=>$getBooking->tutor_image,
                            'tutor_email'=>$getBooking->tutor_email,
                            'tutors_fname'=>$getBooking->tutors_fname,
                            'tutors_lname'=>$getBooking->tutors_lname,
                            'start_time'=>$getBooking->start_time,
                            'start_time_plus'=>date('H:i', strtotime($getBooking->start_time.' +1 hour')),
                            
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

    public function orderHistorylistDetails(Request $request){        
        
        $looged_studentid       = Auth::guard('students')->id();
        $id = (!empty($request->id) ? (int)$request->id : 0);

        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')

        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')
        ->select(            
            DB::raw('b.id AS booking_id,b.tutor_id,b.booking_date,b.price,b.status,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image,td.typedegree,td.city,time.start_time')            
        )->where('b.student_id','=',$looged_studentid)->where('b.id','=',$id)->orderBy('b.id','DESC')->groupBy('b.id')->get();        

        $returnData= array();
        $returnData['html'] = '';
        
        
        if(!empty($getBookings) && count($getBookings) > 0){
            foreach($getBookings as $getBooking){                    
                $returnData['html'] .= view('/student/order-history-rec-details',
                    [                            
                        'booking_id'=>$getBooking->booking_id,
                        'tutor_id'=>$getBooking->tutor_id,
                        'booking_date'=>$getBooking->booking_date,
                        'status'=>$getBooking->status,
                        'price'=>number_format($getBooking->price,2),
                        'tutor_image'=>$getBooking->tutor_image,
                        'tutor_email'=>$getBooking->tutor_email,
                        'tutors_fname'=>$getBooking->tutors_fname,
                        'tutors_lname'=>$getBooking->tutors_lname,
                        'typedegree'=>$getBooking->typedegree,                            
                        'address'=>$getBooking->address,
                        'city'=>$getBooking->city,
                        'contact_no'=>$getBooking->contact_no,                        

                        'start_time'=>$getBooking->start_time,
                        'start_time_plus'=>date('H:i', strtotime($getBooking->start_time.' +1 hour')),
                        
                    ]
                )->render();                    
            }
        }
        else{
            $returnData['html'] = "Invalid Booking details.";
        }
        return json_encode($returnData);
    }

    public function orderHistorySubmitReview(Request $request)
    {
        $looged_studentid       = Auth::guard('students')->id();
        $h_b_id = $request->h_b_id;
        $h_given_ratings = $request->h_given_ratings;
        $txt_review_desc = $request->txt_review_desc;
        if($h_b_id > 0 && ($h_given_ratings > 0 && $h_given_ratings <=5 )&& $txt_review_desc != '' && $looged_studentid > 0){
            //check Booking id with login user
            $q_checkBooking = DB::table('booking AS b')->select(DB::raw("b.id,b.tutor_id"))->where('b.id','=',$h_b_id)->where('b.student_id','=',$looged_studentid)->first();
            if(!empty($q_checkBooking) ){
                $get_booking_tutor_id = $q_checkBooking->tutor_id;                
                //check if already given review
                $q_checkBookingExisting = DB::table('review')->select("id")->where('order_id','=',$h_b_id)->where('student_id','=',$looged_studentid)->first();
                if(!empty($q_checkBookingExisting) ){
                    $review_id= $q_checkBookingExisting->id; 
                    //update review
                    $affectedRows =DB::table('review')->where('id', $review_id)->update([                                                            
                        'rating'=> $h_given_ratings,
                        'review_description'=> $txt_review_desc,
                    ]);
                    return redirect("/student/order-history")->with('success','Great! Your review has been successfully updated.');
                }
                else{
                    //Insert review                    
                    $booking_id = DB::table('review')->insertGetId([
                        'order_id' => $h_b_id,
                        'tutor_id' => $get_booking_tutor_id,
                        'student_id' => $looged_studentid,
                        'rating' => $h_given_ratings,
                        'review_description' => $txt_review_desc,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')                                                                
                    ]);
                    return redirect("/student/order-history")->with('success','Great! Your review has been successfully submitted.');
                }                
            }
            else{
                return redirect("/student/order-history")->with('Sorry!','Invalid booking details');
            }
        }
        else{
            return redirect("/student/order-history")->with('error','Please enter all details');
        }
    }
}
