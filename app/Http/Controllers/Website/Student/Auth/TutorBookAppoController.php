<?php
namespace App\Http\Controllers\Website\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class TutorBookAppoController extends Controller
{
    public function listView(Request $request){        
        
        $b_tutor_id = (!empty($request->b_tutor_id) ? (int)$request->b_tutor_id : 0);
        $looged_studentid = Auth::guard('students')->id();
        $reschedule_id          = (!empty($request->reschedule) ? (int)$request->reschedule : 0);     
        

        $getTutorDetails = DB::table('tutors AS t')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 't.id')
        ->select(            
            DB::raw('t.id,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image,td.typedegree,td.city,td.hrprice'),
            DB::raw('(SELECT COUNT(id) FROM review  WHERE tutor_id = t.id) AS total_tutor_review'),
            DB::raw('(SELECT AVG(rating) FROM review  WHERE tutor_id = t.id) AS avg_tutor_review'),
        )->where('t.status','=',0)->where('t.id','=',$b_tutor_id)->where('t.status','=',0)->get();

        return view('/student/book-appointment')->with(compact('b_tutor_id','looged_studentid','getTutorDetails','reschedule_id'));
       
    }
    
    public function getBookingSlots(Request $request){                
        $booking_t_id       = (!empty($request->booking_t_id) ? (int)$request->booking_t_id : 0);
        $s_date             = (!empty($request->s_date) ? date('Y-m-d',strtotime($request->s_date)) : ''); 
        $reschedule_id          = (!empty($request->reschedule_id) ? (int)$request->reschedule_id : 0);     
        
        $looged_studentid   = Auth::guard('students')->id();
        $returnData= array();
        $returnData['html']         = '';
        $returnData['booking_t_id'] = $booking_t_id;
        $returnData['s_date']       = $s_date;
        $dayName = strtoupper(date('l', strtotime($s_date)));
        

        $getTutorBookingSLots = DB::table('tutor_time AS tt')
        ->leftJoin('days AS d','d.id','=','tt.days_id')
        ->leftJoin('time AS t','t.id','=','tt.time_id')
        ->select(
            DB::raw('(SELECT COUNT(id) FROM booking  WHERE tutor_id = tt.tutor_id AND day_id= d.id AND time_id=t.id AND booking_date="'.$s_date.'") AS total_tutor_bookings'),
            DB::raw('tt.id AS tutor_time_id,t.id AS time_id,t.start_time')
        )
        ->where("tt.tutor_id",$booking_t_id)
        ->where("d.day",$dayName)
        ->groupBy("tt.id")
        ->orderBy("t.id",'ASC')        
        ->get();      
        if(!empty($getTutorBookingSLots) && count($getTutorBookingSLots) > 0){
            foreach($getTutorBookingSLots as $timeSlot){
                $returnData['html'] .= view('/student/book-appointment-time-listings',
                    [
                        'time_id'=>$timeSlot->time_id,
                        'total_tutor_bookings'=>$timeSlot->total_tutor_bookings,                        
                        'start_time'=>$timeSlot->start_time,
                        'start_time_plus'=>date('H:i', strtotime($timeSlot->start_time.' +1 hour')),
                        's_date'=>$s_date,
                    ]
                )->render();                                    
            }
        }
        else{
            $returnData['html'] = "Sorry! No any booking slots available for ".$request->s_date;
        }
        return json_encode($returnData);
    }

    public function bookingTutor(Request $request){                
        $booking_tutor_id       = (!empty($request->booking_tutor_id) ? (int)$request->booking_tutor_id : 0);
        $booking_date           = (!empty($request->booking_date) ? date('Y-m-d',strtotime($request->booking_date)) : '');   
        $txt_booking_slot       = (!empty($request->txt_booking_slot) ? (int)$request->txt_booking_slot : 0);  
        $reschedule_id          = (!empty($request->reschedule_id) ? (int)$request->reschedule_id : 0);           
        
        $looged_studentid       = Auth::guard('students')->id();
        $todayDateHour          = date('Y-m-d H:i');

        $returnData= array();
        $returnData['html']         = '';
        $returnData['status']       = false;
        $returnData['return_msg']   = "Sorry! Something went wrong, Please try after some time.";
        $returnData['page_link']    = '';

        //Common 
        $tutor_booking_rate         = 0;
        $days_id                    = 0;
        $student_wallet_hold_amount = 0;
        $student_wallet_amount      = 0;

        //for admin commission
        $admin_commission_per       = 0;
        $query_admin_commission = DB::table('edecx_admins')->select(DB::raw('id,price'))->where('id','=',1)->orderBy('id','DESC')->groupBy('id')->limit(1)->get();
        if(!empty($query_admin_commission) && count($query_admin_commission) > 0){  
            foreach($query_admin_commission as $res_query_admin_commission){
                $admin_commission_per = $res_query_admin_commission->price;
            }       
        
            if($booking_tutor_id > 0 && $booking_date != '' && $txt_booking_slot > 0 && $looged_studentid > 0){
                $dayName = strtoupper(date('l', strtotime($booking_date)));

                //Check student and tutor activation
                $query_tutor = DB::table('tutors AS t')->leftJoin('tutor_details AS td', 'td.tid', '=', 't.id')->select(DB::raw('t.id,td.hrprice'))->where('t.status','=',0)->where('t.id','=',$booking_tutor_id)->orderBy('t.id','DESC')->groupBy('t.id')->limit(1)->get();
                if(!empty($query_tutor) && count($query_tutor) > 0){  
                    
                    foreach($query_tutor as $res_query_tutor){                
                        $tutor_booking_rate = ($res_query_tutor->hrprice > 0 ? $res_query_tutor->hrprice : 0); 
                    }
                    //Check booking is not less than 0
                    if($tutor_booking_rate >= 0){

                        // Check booking time slot id
                        $queryBookingTime = DB::table('time AS time')->select(DB::raw('time.id,time.start_time,time.end_time'))->where('time.id','=',$txt_booking_slot)->orderBy('time.id','DESC')->groupBy('time.id')->limit(1)->get();                
                        if(!empty($queryBookingTime) && count($queryBookingTime) > 0){  
                            foreach($queryBookingTime as $res_queryBookingTime){       
                                $bookingStartTime =   date('H:i',strtotime($res_queryBookingTime->start_time));   
                                $bookingEndTime =   date('H:i',strtotime($res_queryBookingTime->end_time));   
                                $mixBookingDate = date('Y-m-d H:i',strtotime($booking_date.$bookingStartTime));   
                                $stringMixBookingDate = strtotime($mixBookingDate);
                                $stringTodayDateHour = strtotime($todayDateHour);

                                // Check booking time grater that today time
                                if($stringTodayDateHour < $stringMixBookingDate){
                                    //Check tutor time slot availability
                                    $dayName = strtoupper(date('l', strtotime($booking_date)));
                                    $q_day_id = DB::table('days')->select(DB::raw('id'))->where('day','=',$dayName)->orderBy('id','DESC')->groupBy('id')->limit(1)->get();
                                    if(!empty($q_day_id) && count($q_day_id) > 0){                                  
                                        foreach($q_day_id as $res_q_day_id){                
                                            $days_id = $res_q_day_id->id; 
                                        }
                                        $q_tutor_time_check = DB::table('tutor_time')->select(DB::raw('id'))->where('tutor_id','=',$booking_tutor_id)->where('time_id','=',$txt_booking_slot)->where('days_id','=',$days_id)->count();
                                        if($q_tutor_time_check > 0){

                                            //check total orders Validation for more than 8 orders in same time slot
                                            $q_tutor_total_order_check = DB::table('booking')->select(DB::raw('id'))->where('tutor_id','=',$booking_tutor_id)->where('time_id','=',$txt_booking_slot)->where('booking_date','=',$booking_date)->where('day_id','=',$days_id)->count();
                                            if($q_tutor_total_order_check  < 8){

                                                //check student order for same booking time
                                                $q_student_total_order_check = DB::table('booking')->select(DB::raw('id'))->where('student_id','=',$looged_studentid)->where('time_id','=',$txt_booking_slot)->where('booking_date','=',$booking_date)->where('day_id','=',$days_id)->count();
                                                if($q_student_total_order_check > 0){
                                                    $returnData['return_msg'] = "Sorry! You have are already occupied in this time slot. Please try again with another booking slot";
                                                }
                                                else{
                                                    //Check student wallet amount
                                                    $query_student = DB::table('students AS s')->leftJoin('student_details AS sd', 'sd.sid', '=', 's.id')->select(DB::raw('s.id,s.wallet_hold_amount,s.wallet_amount'))->where('s.id','=',$looged_studentid)->orderBy('s.id','DESC')->groupBy('s.id')->limit(1)->get();
                                                    if(!empty($query_student) && count($query_student) > 0){  
                                                        foreach($query_student as $res_query_student){                
                                                            $student_wallet_hold_amount = $res_query_student->wallet_hold_amount; 
                                                            $student_wallet_amount = $res_query_student->wallet_amount;                     
                                                        }
                                                        
                                                        if($student_wallet_amount >= $tutor_booking_rate){

                                                            $reschedule_error = false;
                                                            $reschedule_error_msg = 'Sorry! Invalid reschedule details.';
                                                            //Code for reschedule
                                                            if($reschedule_id > 0){
                                                                $reschedule_error = true;
                                                                $q_reschedule_check = DB::table('booking')->select(DB::raw('id,price,status,tutor_price,admin_commission'))->where('id','=',$reschedule_id)->where('tutor_id','=',$booking_tutor_id)->where('student_id','=',$looged_studentid)->get(); 
                                                                if(!empty($q_reschedule_check) && count($q_reschedule_check) > 0){
                                                                    foreach($q_reschedule_check as $res_q_reschedule_check){
                                                                        $reschedule_booking_amount = $res_q_reschedule_check->price;
                                                                        $reschedule_tutor_price = $res_q_reschedule_check->tutor_price;
                                                                        $reschedule_admin_commission = $res_q_reschedule_check->admin_commission;
                                                                        $reschedule_booking_status = $res_q_reschedule_check->status;

                                                                        if($reschedule_booking_status == 'Accept' || $reschedule_booking_status == 'Pending'){
                                                                            //Add wallet amount from student side
                                                                            if($reschedule_booking_amount > 0){
                                                                                $rescheduleStudentAffectedRows = DB::table('students')->where('id', $looged_studentid)->update([
                                                                                    'wallet_amount'=> DB::raw('wallet_amount+'. $reschedule_booking_amount), 
                                                                                    'wallet_hold_amount'=> DB::raw('wallet_hold_amount-'.$reschedule_booking_amount)                                                        
                                                                                ]);
                                                                            }
                                                                            else{
                                                                                $rescheduleStudentAffectedRows = 1;
                                                                            }

                                                                            if($reschedule_tutor_price > 0){
                                                                                //Deduct hold amount in tutor side
                                                                                $rescheduleTutorAffectedRows = DB::table('tutors')->where('id', $booking_tutor_id)->update([                                                            
                                                                                    'wallet_hold_amount'=> DB::raw('wallet_hold_amount-'.$reschedule_tutor_price)                                                        
                                                                                ]);
                                                                            }
                                                                            
                                                                            //Booking status update
                                                                            $rescheduleBookingAffectedRows =DB::table('booking')->where('id', $reschedule_id)->update([                                                            
                                                                                'status'=> 'Cancel',
                                                                                'is_rescheduled'=> 'y',
                                                                            ]);
                                                                            if($rescheduleStudentAffectedRows > 0 || $reschedule_booking_amount <= 0){
                                                                                $reschedule_error = false;
                                                                            }
                                                                            else{
                                                                                $reschedule_error = true;
                                                                                $reschedule_error_msg = 'Sorry! We can not update reschedule booking details at this moment. Please try again after some time.';
                                                                            }
                                                                        }
                                                                        else{
                                                                            $reschedule_error = true;
                                                                            $reschedule_error_msg = 'Sorry! Your existing booking status is invalid.';
                                                                        }

                                                                    }

                                                                }
                                                                else{
                                                                    $reschedule_error = true;
                                                                }

                                                            }

                                                            $admin_commission   = ($tutor_booking_rate * $admin_commission_per) / 100;
                                                            $admin_commission   = ($admin_commission > 0 ? $admin_commission : 0);
                                                            $tutor_price_after_admin_commission   =  ($tutor_booking_rate - $admin_commission );
                                                            $tutor_price_after_admin_commission   = ($tutor_price_after_admin_commission > 0 ? $tutor_price_after_admin_commission : 0);

                                                            if($reschedule_error == false){
                                                                //Deduct wallet amount from student side
                                                                if($tutor_booking_rate > 0){
                                                                    $studentAffectedRows = DB::table('students')->where('id', $looged_studentid)->update([
                                                                        'wallet_amount'=> DB::raw('wallet_amount-'. $tutor_booking_rate), 
                                                                        'wallet_hold_amount'=> DB::raw('wallet_hold_amount+'.$tutor_booking_rate)                                                        
                                                                    ]);
                                                                }
                                                                else{
                                                                    $studentAffectedRows = 1;
                                                                }
                                                                if($tutor_price_after_admin_commission > 0){
                                                                    //Add hold amount in tutor side
                                                                    $tutorAffectedRows = DB::table('tutors')->where('id', $booking_tutor_id)->update([                                                            
                                                                        'wallet_hold_amount'=> DB::raw('wallet_hold_amount+'.$tutor_price_after_admin_commission)                                                        
                                                                    ]);
                                                                }
                                                                if($studentAffectedRows > 0  || $tutor_booking_rate <= 0){
                                                                    //insert in booking table
                                                                    $booking_id = DB::table('booking')->insertGetId([
                                                                        'student_id' => $looged_studentid,
                                                                        'tutor_id' => $booking_tutor_id,
                                                                        'day_id' => $days_id,
                                                                        'time_id' => $txt_booking_slot,
                                                                        'tutor_time_id' => '0',
                                                                        'booking_date' => $booking_date,
                                                                        'card_id' => '0',
                                                                        'status' => 'Pending',
                                                                        'price' => $tutor_booking_rate,
                                                                        'tutor_price' => $tutor_price_after_admin_commission,
                                                                        'admin_commission' => $admin_commission,
                                                                        'created_at' => date('Y-m-d H:i:s'),
                                                                        'updated_at' => date('Y-m-d H:i:s')                                                                
                                                                    ]);

                                                                    if($booking_id > 0){
                                                                        //for success
                                                                        $returnData['status']       = true;
                                                                        $returnData['page_link']    = url("/student/booking");
                                                                        $returnData['return_msg']   = "Congratulations! Your booking has been successfully placed.";
                                                                    }       
                                                                    else{
                                                                        $returnData['return_msg'] = "Sorry! We can not update booking details at this moment. Please try again after some time.";                         
                                                                    }                                                                                                                 
                                                                }
                                                                else{
                                                                    $returnData['return_msg'] = "Sorry! We can not update wallet details at this moment. Please try again after some time.";                     
                                                                }
                                                            }
                                                            else{
                                                                $returnData['return_msg'] = $reschedule_error_msg;
                                                            }
                                                        }
                                                        else{
                                                            $returnData['return_msg'] = 'Insufficient wallet amount, Please deposit amount in your wallet for place an order.';
                                                        }                                                
                                                    }
                                                    else{
                                                        $returnData['return_msg'] = "Sorry! We can not fetching student details at this moment. Please try again after some time.";                     
                                                    }
                                                }
                                            }
                                            else{
                                                $returnData['return_msg'] = "Sorry! This time slot if fully booked. Please try again with another booking slot.";                     
                                            }
                                        }
                                        else{
                                            $returnData['return_msg'] = "Sorry! Tutor is not available in this date and time slot. Please try again with another booking slot.";                 
                                        }
                                    }
                                    else{
                                        $returnData['return_msg'] = "Sorry! Booking day not found. Please try again with another booking slot.";             
                                    }
                                }
                                else{
                                    $returnData['return_msg'] = "Sorry! Booking time must be greater than current time. Please try again with another booking slot.";         
                                }                    
                            }
                        }
                        else{
                            $returnData['return_msg'] = "Sorry! No time slot found. Please try again with another booking slot."; 
                        }
                    }
                    else{
                        $returnData['return_msg'] = "Invalid Amount. Please try again with another tutor."; 
                    }
                }
                else{
                    $returnData['return_msg'] = "Sorry! No tutor details found."; 
                } 
            }
            else{
                $returnData['return_msg'] = "Invalid booking and user details.";
            }
        }
        else{
            $returnData['return_msg'] = "Sorry! We could not be fetch details at this momment, Please try again after some time.";
        }
        
        return json_encode($returnData);
    }

    
    
}
