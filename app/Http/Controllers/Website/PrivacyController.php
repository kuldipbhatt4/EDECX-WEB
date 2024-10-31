<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Policy;

class PrivacyController extends Controller
{
    public function pc()
    {
        $pc = Policy::latest()->take(1)->get();
        return view('/privacy-policy',compact('pc'));
    }
}
