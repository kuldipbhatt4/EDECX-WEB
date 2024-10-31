<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use DB;
class AdminOrderHistoryController extends Controller
{
    public function studentcomplete()
    {
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')   
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->select(DB::raw('b.id AS booking_id,b.student_id,b.tutor_id,b.booking_date,b.price,b.admin_commission,b.tutor_price,b.status,time.start_time,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address AS tutor_address,td.tutor_image,td.city as tutor_city,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address AS student_address,s.street_address,s.city as student_city'))
        //->where('b.status','=','pending')
        ->orderBy('b.id','DESC')
        ->groupBy('b.id')             
        ->paginate(20);  
        return view('edecx-admin.orderhistory.student.complete',compact('getBookings'));
    }

    public function studentpending()
    {
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')   
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->select(DB::raw('b.id AS booking_id,b.student_id,b.tutor_id,b.booking_date,b.price,b.admin_commission,b.tutor_price,b.status,time.start_time,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address AS tutor_address,td.tutor_image,td.city as tutor_city,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address AS student_address,s.street_address,s.city as student_city'))
        ->where('b.status','=','pending')
        ->orderBy('b.id','DESC')
        ->groupBy('b.id')             
        ->paginate(20);  
        return view('edecx-admin.orderhistory.student.pending',compact('getBookings'));
    }

    public function tutorcomplete()
    {
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')   
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->select(DB::raw('b.id AS booking_id,b.student_id,b.tutor_id,b.booking_date,b.price,b.admin_commission,b.tutor_price,b.status,time.start_time,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address AS tutor_address,td.tutor_image,td.city as tutor_city,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address AS student_address,s.street_address,s.city as student_city'))
        //->where('b.status','=','pending')
        ->orderBy('b.id','DESC')
        ->groupBy('b.id')             
        ->paginate(20);           
        return view('edecx-admin.orderhistory.tutor.complete',compact('getBookings'));
    }

    public function tutorpending()
    {   
        $getBookings = DB::table('booking AS b')
        ->leftJoin('tutors AS t', 't.id', '=', 'b.tutor_id')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 'b.tutor_id')
        ->leftJoin('days AS d','d.id','=','b.day_id')
        ->leftJoin('time AS time','time.id','=','b.time_id')   
        ->leftJoin('students AS s', 's.id', '=', 'b.student_id')
        ->leftJoin('student_details AS sd', 'sd.sid', '=', 'b.student_id')
        ->select(DB::raw('b.id AS booking_id,b.student_id,b.tutor_id,b.booking_date,b.price,b.admin_commission,b.tutor_price,b.status,time.start_time,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address AS tutor_address,td.tutor_image,td.city as tutor_city,s.fname ,s.lname,s.email,s.mobile_no,sd.student_image,s.address AS student_address,s.street_address,s.city as student_city'))
        ->where('b.status','=','pending')
        ->orderBy('b.id','DESC')
        ->groupBy('b.id')             
        ->paginate(20); 
        
        return view('edecx-admin.orderhistory.tutor.pending',compact('getBookings'));
    }
}
