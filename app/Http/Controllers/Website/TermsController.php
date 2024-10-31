<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Terms;
use DB;

class TermsController extends Controller
{
    public function tc()
    {
       $tc = Terms::latest()->take(1)->get();
        return view('/terms-conditions',compact('tc'));
    }
}
