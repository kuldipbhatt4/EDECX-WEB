<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;
use App\Subject;
use DB;
use Illuminate\Support\Facades\Auth;


class FindTutorController extends Controller
{
    public function findtutor()
    {   $studentid = Auth::guard('students')->id();
        $levels = Level::paginate(10);
        $subjects=Subject::paginate(10);
        $days = DB::table('days')->orderBy('sequence_number','asc')->get();
        $time = DB::table('time')->orderBy('time_sequence_number','asc')->get();        
        $classtype = DB::table('classtype')->where("is_active",'y')->get();        
        return view('/find-tutor', compact('levels', 'subjects','days','time','classtype','studentid'));
    }
}
