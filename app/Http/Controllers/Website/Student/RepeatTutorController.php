<?php

namespace App\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepeatTutorController extends Controller
{
    public function repeattutor()
    {
        return view('/student/repeat-tutor-list');
    }
}
