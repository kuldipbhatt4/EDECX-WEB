<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Student;
use App\Tutors;
use App\StudentDetails;
use App\Level;
use App\ClassType;
use App\Subject;
use DB;
use Illuminate\Http\Request;
use RestResponse;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{

	public function addBooking(Request $request){
            

             $data['student_id'] = $request->student_id;
             $data['tutor_id'] = $request->tutor_id;
             $data['tutor_time_id'] = $request->tutor_time_id;
             $data['tutor_time_id'] = $request->booking_date;
             $data['card_id'] = $request->card_id;
             $data['status'] = $request->status;
             $data['price'] = $request->price;

             if($request->student_id != '' & $request->tutor_id != '' & $request->tutor_time_id != '' & $request->booking_date != '' & $request->card_id != '' & $request->status != '' & $request->price != ''){

	            $query =  DB::table('booking')->insert($data);
	            return RestResponse::success_new('true','Booking info added');
            }else{
             return RestResponse::warning('all fields are required',200);
            }
	}

      //history student
      public function studentHistory(Request $request){
            $student_id = $request->student_id;
            if($request->student_id != ''){
                  $booking_data = DB::table('booking')
                    ->select('*')
                    ->where('student_id', '=', $student_id)
                    ->get();
                  $array_main = array();
                  foreach($booking_data as $booking){
                        $book_loop['booking_id'] = $booking->id;
                        $book_loop['booking_date'] = $booking->booking_date;
                        $book_loop['booking_status'] = $booking->status;
                        $book_loop['booking_price'] = $booking->price;
                        $card_id = $booking->card_id;

                        $card = DB::table('card')
                                ->select('*')
                                ->where('id', '=', $card_id)
                                ->get()->first();

                        $book_loop['booking_card'] = $card;

                        $tutor_id = $booking->tutor_id;
                        $tutor = DB::table('tutors')
                                ->select('*')
                                ->join('tutor_details', 'tutors.id', '=', 'tutor_details.tid')
                                ->join('classtype', 'classtype.id', '=', 'tutor_details.classid')
                                ->join('subjects', 'subjects.id', '=', 'tutor_details.sid')
                                ->join('levels', 'levels.id', '=', 'tutor_details.lid')
                                ->where('tutors.status', '=', 0)
                                ->where('tutors.id', '=', $tutor_id)
                                ->get()->first();
                    $book_loop['tutor_detail'] = $tutor;
                    $array_main[] = $book_loop;
                  }

                  return RestResponse::success_new('true',$array_main);

            }else{
                  return RestResponse::warning('Student Id are required',200);
            }

      }


      public function tutorHistory(Request $request){
            $tutor_id = $request->tutor_id;
            if($request->tutor_id != ''){
                  $booking_data = DB::table('booking')
                    ->select('*')
                    ->where('tutor_id', '=', $tutor_id)
                    ->get();
                  $array_main = array();
                  foreach($booking_data as $booking){
                        $book_loop['booking_id'] = $booking->id;
                        $book_loop['booking_date'] = $booking->booking_date;
                        $book_loop['booking_status'] = $booking->status;
                        $book_loop['booking_price'] = $booking->price;
                        $card_id = $booking->card_id;

                        $card = DB::table('card')
                                ->select('*')
                                ->where('id', '=', $card_id)
                                ->get()->first();

                        $book_loop['booking_card'] = $card;

                        $student_id = $booking->student_id;
                        $student = DB::table('students')
                                ->select('*')
                                ->join('student_details', 'students.id', '=', 'student_details.sid')
                                ->join('classtype', 'classtype.id', '=', 'student_details.classid')
                                ->join('subjects', 'subjects.id', '=', 'student_details.sid')
                                ->where('students.status', '=', 0)
                                ->where('students.id', '=', $student_id)
                                ->get()->first();
                    $book_loop['student_detail'] = $student;
                    $array_main[] = $book_loop;
                  }

                  return RestResponse::success_new('true',$array_main);

            }else{
                  return RestResponse::warning('Student Id are required',200);
            }

      }
}