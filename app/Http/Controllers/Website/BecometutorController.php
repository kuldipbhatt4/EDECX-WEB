<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BecometutorController extends Controller
{
    public function becometutor()
    {
        return view('/become-tutor');

    }
}
