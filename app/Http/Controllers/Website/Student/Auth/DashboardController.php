<?php

namespace App\Http\Controllers\Website\Student\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function dashboard()
    {   
        $looged_studentid   = Auth::guard('students')->id();        
        $totalClassBookings = DB::table('booking AS b')->select('b.id')->where('b.student_id','=',$looged_studentid)->count();

        $q_totalSpent         = DB::table('booking AS b')->select('b.id',DB::raw('SUM(price) as total_price'))
        ->where('b.student_id','=',$looged_studentid)->where('b.status','!=','Rejected')->where('b.status','!=','Cancel')->where('b.status','!=','Missed')->limit(1)->get();
        
        if(!empty($q_totalSpent)){
            foreach($q_totalSpent as $value){
                $totalSpent = $value->total_price;
            }
        }
        else{
            $totalSpent         =0;
        }
        $totalAttendHours   = DB::table('booking AS b')->select('b.id')->where('b.student_id','=',$looged_studentid)->where('b.status','=','Completed')->count();
        return view('/student/student-dashboard')->with(compact("totalClassBookings","totalSpent","totalAttendHours"));
    }

    public function dashboardlistPagination(Request $request){   
        $looged_studentid       = Auth::guard('students')->id();
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')        
        ->select(            
            DB::raw('b.id AS booking_id,b.tutor_id,b.booking_date,b.price,b.status,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image,time.start_time')            
        )->where('b.student_id','=',$looged_studentid)->where('b.booking_date','=',date('Y-m-d'));
        
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
                    $returnData['html'] .= view('/student/student-dashboard-rec',
                        [                            
                            'booking_id'=>$getBooking->booking_id,                            
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
                $returnData['html'] =  "<tr><td>No any booking found for ".date('d F yy')."</td></tr>";
            }
        }
        return json_encode($returnData);
    }

    public function dashboardlistDetails(Request $request){        
        
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
                $returnData['html'] .= view('/student/student-dashboard-rec-details',
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
}
