<?php
namespace App\Http\Controllers\Website\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class TutorListController extends Controller
{
    public function tutorlist(Request $request){        
        
        $tutor_subject = (!empty($request->tutor_subject) ? (int)$request->tutor_subject : 0);
        $tutor_level = (!empty($request->tutor_level) ? (int)$request->tutor_level : 0); 
        $tutor_class = (!empty($request->tutor_class) ? (int)$request->tutor_class : 0); 
        $orderBy = (!empty($request->orderBy) ? $request->orderBy :'latest');
        $view_type = (!empty($request->view_type) ? $request->view_type :'list');

        
        $linkparam = url('student/tutor-list').'?tutor_subject='.$tutor_subject.'&tutor_level='.$tutor_level.'&tutor_class='.$tutor_class; 
        $linkparamPage = url('student/tutor-list-page').'?tutor_subject='.$tutor_subject.'&tutor_level='.$tutor_level.'&tutor_class='.$tutor_class.'&orderBy='.$orderBy.'&view_type='.$view_type;
        if($view_type == 'list'){
            return view('/student/tutor-list')->with(compact('tutor_subject','tutor_level','tutor_class','orderBy','view_type'));
        }
        else{
            return view('/student/tutor-list')->with(compact('tutor_subject','tutor_level','tutor_class','orderBy','view_type'));
        }
    }
    public function tutorlistPagination(Request $request){        
        
        $tutor_subject = (!empty($request->tutor_subject) ? (int)$request->tutor_subject : 0);
        $tutor_level = (!empty($request->tutor_level) ? (int)$request->tutor_level : 0); 
        $tutor_class = (!empty($request->tutor_class) ? (int)$request->tutor_class : 0);
        $orderBy = (!empty($request->orderBy) ? $request->orderBy :'latest');
        $view_type = (!empty($request->view_type) ? $request->view_type :'list');
        

        $getTutors = DB::table('tutors AS t')
        ->leftJoin('tutor_details AS td', 'td.tid', '=', 't.id')
        ->select(
            DB::raw('(SELECT COUNT(id) FROM review  WHERE tutor_id = t.id) AS total_tutor_review'),
            DB::raw('(SELECT AVG(rating) FROM review  WHERE tutor_id = t.id) AS avg_tutor_review'),
            DB::raw('(SELECT COUNT(id) FROM booking  WHERE tutor_id = t.id) AS total_tutor_order'),
            DB::raw('t.id,t.tutors_fname,t.tutors_lname,t.tutor_email,t.contact_no,t.address,td.tutor_image,td.typedegree,td.city,td.hrprice')
            
        )->where('t.status','=',0);

        if($tutor_subject > 0){
            $getTutors = $getTutors->where('td.sid','=',$tutor_subject);
        }
        if($tutor_level > 0){
            $getTutors = $getTutors->where('td.lid','=',$tutor_level);
        }
        if($tutor_class > 0){
            $getTutors = $getTutors->where('td.classid','=',$tutor_class);
        }
        else{}
        //For Order by
        
        if($orderBy =='rating'){
            $getTutors =  $getTutors->orderBy('avg_tutor_review','DESC');
        }
        elseif($orderBy =='popular'){
            $getTutors =  $getTutors->orderBy('total_tutor_order','DESC');
        }
        else if($orderBy =='latest'){
            $getTutors =  $getTutors->orderBy('t.id','DESC');
        }
        else if($orderBy =='free'){
            $getTutors =  $getTutors->orderBy('td.hrprice','ASC');
        }
        else{
            $getTutors =  $getTutors->orderBy('t.id','DESC');
        }
                
        $totalTutors = $getTutors->count(); 
        $getTutors = $getTutors->groupBy('t.id');             
        $getTutors = $getTutors->paginate(env('PAGE_DISPLAY_LIMIT'));        
        $returnData= array();
        $returnData['html'] = '';
        $returnData['nextPage'] = false;
        $returnData['totalTutors'] = $totalTutors;
        if(!empty($getTutors) && count($getTutors) > 0){
            if($getTutors->total() >= $getTutors->currentPage()){
                foreach($getTutors as $getTutor){                    
                    $returnData['html'] .= view('/student/tutor-list-rec',
                        [
                            'tutor_id'=>$getTutor->id,
                            'tutor_image'=>$getTutor->tutor_image,
                            'tutors_fname'=>$getTutor->tutors_fname,
                            'tutors_lname'=>$getTutor->tutors_lname,
                            'typedegree'=>$getTutor->typedegree,
                            'total_tutor_review'=>$getTutor->total_tutor_review,
                            'address'=>$getTutor->address,
                            'city'=>$getTutor->city,
                            'hrprice'=>$getTutor->hrprice,
                            'avg_tutor_review'=>$getTutor->avg_tutor_review,
                            'total_tutor_order'=>$getTutor->total_tutor_order,
                        ]
                    )->render();
                    
                }
                $returnData['nextPage'] = true;
            }
            else{
                $returnData['html'] = "No more record found";
            }
        }
        else{
            if($getTutors->currentPage() > 1){
                $returnData['html'] = "No more record found";
            }
            else{
                $returnData['html'] = "No record found";
            }
        }
        return json_encode($returnData);
    }
}
