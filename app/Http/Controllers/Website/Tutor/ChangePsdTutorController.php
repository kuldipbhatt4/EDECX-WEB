<?php

namespace App\Http\Controllers\Website\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePsdTutorController extends Controller
{
    public function change_pwd()
    {
        return view('/tutor/change-pwd');
    }
}
