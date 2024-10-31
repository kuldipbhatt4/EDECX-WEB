<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Level;
use DB;
use Illuminate\Http\Request;

class LevelApiController extends Controller
{
    public function index()
    {
        $levels = Level::select('id','level')->get();
        return response()->json($levels);
    }
}
