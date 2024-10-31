<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Location;
use DB;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::select('id','location','area_code')->get();
        return response()->json($locations);
    }
}
