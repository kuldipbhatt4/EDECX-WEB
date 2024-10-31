<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
        return view('/tutor/tutor-faq');
    }
}
