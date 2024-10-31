<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Subject;
use DB;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $envpath = env("APP_URL");
        $subjects = Subject::select('id','subject_app_icon','subject_name')->get();
        $path = $envpath.('/edecx/admin/subject-icon/'); 
        foreach($subjects as $subject){
            $response['subjects'][] = [
                'id' => $subject->id,
                'subject_app_icon' => $path.$subject->subject_app_icon,
                'subject_name' => $subject->subject_name,
            ];
        }
        return response()->json($response);
    }
}
