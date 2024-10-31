<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\Tutor;
use App\TutorDetails;
use \DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return redirect('edecx-admin.dashboard');
    }

    public function dashboard_verifytutor()
    {
        $tutors = Tutor::select('id','tutors_fname','tutors_lname', 'tutor_email','contact_no','resume','status')->where('status',1)->paginate(10);
        $totaltutors = Tutor::where('status',"=","0")->count();
        $totalstudents = Student::count();

        $q_total_earning        = DB::table('booking AS b')->select('b.id',DB::raw('SUM(admin_commission) as total_admin_price'))
        ->where('b.status','!=','Rejected')->where('b.status','!=','Cancel')->where('b.status','!=','Missed')->limit(1)->get();
        
        if(!empty($q_total_earning)){
            foreach($q_total_earning as $value){
                $totalEarning = $value->total_admin_price;
            }
        }
        else{
            $totalEarning         =0;
        }
        $totalBookings = DB::table('booking AS b')->select('b.id')->count();


        return view('edecx-admin.dashboard',compact('tutors','totaltutors','totalstudents','totalEarning','totalBookings'));
    }
    public function updateTutorStatus(Request $request, $id)
    {
            $value = $request->get('accept');
            $value1 = $request->get('denied');
            $id = $request->get('id');
            if ($value == '1')
            {
                $tutorstatus = Tutor::find($id);
                $tutorstatus->status = '0';
                $tutorstatus->save();

                $tutordetails = new TutorDetails([
                    'tid'=> $id
                ]);
                $tutordetails->save();

                return redirect('edecx-admin/dashboard')->with('success', ' saved!');
            }
            if ($value1 == '2')
            {
                $tutorstatus = Tutor::find($id);
                $tutorstatus->status = '2';
                $tutorstatus->save();
                return redirect('edecx-admin/dashboard')->with('success', ' saved!');
            }
    }
}
