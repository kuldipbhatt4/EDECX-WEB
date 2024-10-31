<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;

class FaqTutorController extends Controller
{
    public function faq()
    {
        $faqstutors = Faq::select('*')->where('student_tutor','=','1')->get();
        return view('/tutor/tutor-faq',compact('faqstutors'));
    }
}
