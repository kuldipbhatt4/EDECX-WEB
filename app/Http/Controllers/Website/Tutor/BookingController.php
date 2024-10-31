<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking()
    {
        return view('/tutor/tutorbooking');
    }
}
