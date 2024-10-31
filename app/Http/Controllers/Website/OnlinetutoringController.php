<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlinetutoringController extends Controller
{
    public function onlinetutor()
    {
        return view('/online-tutoring');
    }
}
