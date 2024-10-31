<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\ClassType;
use DB;
use Illuminate\Http\Request;
use RestResponse;

class ClassTypeController extends Controller
{
    public function index()
    {
        $callstype = ClassType::select('id','classtype')->get();
        
        foreach($callstype as $list){
            $response['classtype'][] = [
                'id' => $list->id,
                'classtype' => $list->classtype,
            ];
        }
        return response()->json($response);
    }

     public function get_tutor_class_type(Request $request)
    {
        $tutor_id = $request->tutor_id;

             if($tutor_id != ''){
                 $query =  DB::table('classtype')->get()->toArray();
                 $main = array();
                 foreach($query as $data){
                    $id = $data->id;
                    $tutor_check =  DB::table('tutor_details')->where('tid', $tutor_id)->where('classid', $id)->get()->count();

                    if($tutor_check > 0){
                        $selected= 1;
                    }else{
                        $selected=0;
                    }

            $response['classtype'][] = [
                'id' => $id,
                'classtype' => $data->classtype,
                'selected' => $selected,
            ];
                   
                 }
                
            return RestResponse::success_new('true',$response);
           }else{
           
             return RestResponse::success_new('false','Tutor classtype failed.');
           }
        

    }

    //edit rate
    public function set_tutor_class_type(Request $request)
    {
        $tutor_id = $request->tutor_id;
        $classid = $request->classid;

          /* $check = $request->validate([
                'rate' => 'required|min:1'
            ]);*/
             if($classid != '' & $tutor_id != ''){
                 $query =  DB::table('tutor_details')->where('tid', $tutor_id)->update(['classid' =>  $classid]);

            return RestResponse::success_new('true','Tutor Class Type Update successfully.');
           }else{
           
             return RestResponse::success_new('false','Tutor Class Type Update failed.');
           }
        

    }
}
