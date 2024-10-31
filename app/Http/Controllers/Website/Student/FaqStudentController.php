<?php

namespace App\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;

class FaqStudentController extends Controller
{
    public function faq()
    {
        $faqsstudents = Faq::select('*')->where('student_tutor','=','0')->get();
        return view('/student/student-faq', compact('faqsstudents'));
    }
}
