<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Days;
use App\Time;
use App\TutorTime;
use Illuminate\Support\Facades\Auth;
use DB;
class ScheduleTimingController extends Controller
{
    public function scheduletiming()
    {
        $tutor = Auth::guard('tutors')->id();
        $days = DB::table('days')->orderBy('sequence_number','asc')->get();
        $time = DB::table('time')->orderBy('time_sequence_number','asc')->get();        
        $tutor_time = DB::table('tutor_time')->where('tutor_id',$tutor)->get();        
        $selectedSlot = array();
        if(!empty($tutor_time)){
            foreach($tutor_time as $slot){
                $selectedSlot[] = $slot->days_id.'_'.$slot->time_id;
            }
        }
        return view('/tutor/schedule-timing')->with(compact('days','time','selectedSlot'));

    }
    /*public function scheduletimingdetails(Request $request)
    {
        
        $days = Days::all();
        $times = Time::all();
        $ttime = TutorTime::all();
        $tutor = Auth::guard('tutors')->id();
        $time_id = $request->get('starttime');
        $day = $request->get('day');

        $tutor_time = new TutorTime([
            'tutor_id' =>  $tutor,
            'days_id' => $day,
            'time_id' =>  $time_id,
       ]);
       $tutor_time->save();
        return view('/tutor/schedule-timing')->with(compact('days','times','ttime'));
    }*/
    public function scheduleTimingSubmit(Request $request){
        $getUserselectedSlots = $request->txt_time_slot;
        $tutor = Auth::guard('tutors')->id();
        if(!empty($getUserselectedSlots) && count($getUserselectedSlots) > 0){
            DB::table('tutor_time')->where('tutor_id', $tutor)->delete();

            foreach($getUserselectedSlots as $key=> $slot){
                $explodeSlot = explode('_',$slot);                
                $days_id     = $explodeSlot[0];
                $time_id     = $explodeSlot[1];
                $tutor_time = new TutorTime([
                    'tutor_id' =>  $tutor,
                    'days_id' => $days_id,
                    'time_id' =>  $time_id,
               ]);
               $tutor_time->save();               
            }
            return redirect('tutor/schedule-timing/')->with('info', 'Time availability has been successfully updated.');
        }
        else{
            return redirect('tutor/schedule-timing/')->with('error', 'Sorry! No any selection found for time availability.');
        }
    }   
}
