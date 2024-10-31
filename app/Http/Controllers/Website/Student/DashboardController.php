<?php

namespace App\Http\Controllers\Website\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('/student/student-dashboard');
    }
}
