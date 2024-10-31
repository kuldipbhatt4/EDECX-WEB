<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::paginate(20);
        return view('edecx-admin.location.index',compact('locations'));
    }

    public function create()
    {
        return view('edecx-admin/location/create');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'location'=>'required',
                'area_code'=>'required'
            ]);

            $location = new Location([
                 'location' => $request->get('location'),
                 'area_code' => $request->get('area_code'),
            ]);
            $location->save();
        }

        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('edecx-admin/location/index')->with('success', ' saved!');
    }

    public function edit($id)
        {
            $location= Location::find($id);
            return view('edecx-admin.location.edit', compact('location', 'id'));
        }


        public function update(Request $request, $id)
        {
            try
            {
                    $request->validate([
                        'location'=>'required',
                        'area_code'=>'required'

                ]);
                $location = Location::find($id);
                $location->location = $request->get('location');
                $location->area_code = $request->get('area_code');
                $location->save();
                return redirect('edecx-admin/location/index')->with('success', ' saved!');

            }

            catch (ModelNotFoundException $exception)
                {
                    return back()->withError($exception->getMessage())->withInput();
                }
        }

        public function destroy($id)
        {
            $location = Location::find($id);
            if(!$location)
            {
                return redirect('edecx-admin/location/index');
            }
            $delete_location=Location::where('id', $id)->forceDelete();

            if($delete_location)
            {
                return redirect('edecx-admin/location/index')->with('success', 'Successfully Deleted');
            }
        }


}
