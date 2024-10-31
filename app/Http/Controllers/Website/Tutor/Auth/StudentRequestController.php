<?php
namespace App\Http\Controllers\Website\Tutor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Auth;

class StudentRequestController extends Controller
{
    public function studentrequest()
    {       
        return view('/tutor/student-request');
    }
    
    public function studentrequestlistPagination(Request $request){   
        $logged_tutor_id       =  Auth::guard('tutors')->id();
        $getBookings = DB::table('booking AS b')
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')        
        ->select(            
            DB::raw('b.id AS booking_id,b.student_id,b.booking_date,b.price,b.status,time.start_time,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address,s.street_address,s.city')            
        )->where('b.tutor_id','=',$logged_tutor_id)->where('b.status','=','Pending');
        
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
                    $returnData['html'] .= view('/tutor/student-request-rec',
                        [                            
                            'booking_id'=>$getBooking->booking_id,                            
                            'student_id'=>$getBooking->student_id,
                            'booking_date'=>$getBooking->booking_date,
                            'status'=>$getBooking->status,
                            'price'=>number_format($getBooking->price,2),
                            'start_time'=>$getBooking->start_time,
                            'start_time_plus'=>date('H:i', strtotime($getBooking->start_time.' +1 hour')),                            
                            'fname'=>$getBooking->fname,
                            'lname'=>$getBooking->lname,
                            'email'=>$getBooking->email,
                            'mobile_no'=>$getBooking->mobile_no,
                            'student_image'=>$getBooking->student_image,
                            'address'=>$getBooking->address,
                            'street_address'=>$getBooking->street_address,
                            'city'=>$getBooking->city
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

    public function ostudentrequestlistDetails(Request $request){        
        $logged_tutor_id       =  Auth::guard('tutors')->id();
        $id = (!empty($request->id) ? (int)$request->id : 0);
        $getBookings = DB::table('booking AS b')
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')        
        ->select(            
            DB::raw('b.id AS booking_id,b.student_id,b.booking_date,b.price,b.status,time.start_time,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address,s.street_address,s.city')            
        )->where('b.tutor_id','=',$logged_tutor_id)->where('b.id','=',$id)->orderBy('b.id','DESC')->groupBy('b.id')->get();

        $returnData= array();
        $returnData['html'] = '';
        
        
        if(!empty($getBookings) && count($getBookings) > 0){
            foreach($getBookings as $getBooking){                    
                $returnData['html'] .= view('/tutor/student-request-rec-details',
                    [                            
                        'booking_id'=>$getBooking->booking_id,
                        'student_id'=>$getBooking->student_id,
                        'booking_date'=>$getBooking->booking_date,
                        'status'=>$getBooking->status,
                        'price'=>number_format($getBooking->price,2),
                        'start_time'=>$getBooking->start_time,
                        'start_time_plus'=>date('H:i', strtotime($getBooking->start_time.' +1 hour')),
                        'fname'=>$getBooking->fname,
                        'lname'=>$getBooking->lname,
                        'email'=>$getBooking->email,
                        'mobile_no'=>$getBooking->mobile_no,
                        'student_image'=>$getBooking->student_image,
                        'address'=>$getBooking->address,
                        'street_address'=>$getBooking->street_address,
                        'city'=>$getBooking->city

                        
                        
                    ]
                )->render();                    
            }
        }
        else{
            $returnData['html'] = "Invalid Booking details.";
        }
        return json_encode($returnData);
    }

    public function studentRequestChangeStatus(Request $request)
    {
        $logged_tutor_id       =  Auth::guard('tutors')->id();
        $get_b_id = $request->get_b_id;
        $get_value = $request->get_value;

        $returnData= array();
        $returnData['msg'] = 'Sorry! Invalid booking details.';
        $returnData['status'] = false;
        
        if($logged_tutor_id > 0 && ($get_value == 'r'||  $get_value == 'a') && $get_b_id){
            //check Booking id with login user
            $q_checkBooking = DB::table('booking AS b')->select(DB::raw("b.id,b.status,b.student_id,b.price,b.tutor_price,b.admin_commission"))->where('b.id','=',$get_b_id)->where('b.tutor_id','=',$logged_tutor_id)->first();
            if(!empty($q_checkBooking) ){
                $get_booking_status = $q_checkBooking->status;      
                $get_booking_student_id = $q_checkBooking->student_id;   
                $get_booking_price = $q_checkBooking->price;
                $get_booking_tutor_price = $q_checkBooking->tutor_price;
                $get_booking_admin_commission = $q_checkBooking->admin_commission;

                if($get_booking_status == 'Pending'){
                    $get_status = ($get_value == 'r' ? 'Rejected' : 'Accept');
                    $affectedRows =DB::table('booking')->where('id', $get_b_id)->where('tutor_id', $logged_tutor_id)->update([                                                            
                        'status'=> $get_status,                        
                    ]);   
                    if($get_status  == 'Rejected'){
                        if($get_booking_price > 0){
                            //Give money to student
                            DB::table('students')->where('id', $get_booking_student_id)->update([
                                'wallet_amount'=> DB::raw('wallet_amount+'. $get_booking_price), 
                                'wallet_hold_amount'=> DB::raw('wallet_hold_amount-'.$get_booking_price)                                                        
                            ]);
                        }
                        if($get_booking_tutor_price > 0){
                            //hold amount manage tutor
                            DB::table('tutors')->where('id', $logged_tutor_id)->update([                                                            
                                'wallet_hold_amount'=> DB::raw('wallet_hold_amount-'.$get_booking_tutor_price)                                                        
                            ]);
                        }
                    }
                    if($affectedRows > 0){
                        $returnData['msg'] = 'Booking status has been successfully updated.';
                        $returnData['status'] = true;
                    }
                    else{
                        $returnData['msg'] = 'Sorry! We can not update booking status at this moment. Please try again after some time.';    
                    }
                }
                else{
                    $returnData['msg'] = 'Sorry! Invalid booking status.';
                }                
            }
            else{
                $returnData['msg'] = 'Sorry! Invalid booking details.';
            }
        }
        else{            
            $returnData['msg'] = 'Sorry! Please enter all details.';
        }
        return json_encode($returnData);
    }
    
}
