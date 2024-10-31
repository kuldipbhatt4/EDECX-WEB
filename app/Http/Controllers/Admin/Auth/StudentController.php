<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Level;
use App\StudentDetails;
use App\Subject;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    public function studentlist()
    {
        $students = Student::paginate(10);
        $levels = Level::all();
        $subjects = Subject::all();
        return view('edecx-admin/student/student-list',compact('students','levels','subjects'));
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if(!$student)
        {
            return redirect('/edecx-admin/student/student-list');
        }

        $delete_student = Student::where('id', $id)->forceDelete();
        $delete_studentdetails = StudentDetails::where('sid', $id)->forceDelete();

        if($delete_student && $delete_studentdetails)
        {
            return redirect('/edecx-admin/student/student-list')->with('success', 'Successfully Data Deleted');
        }
    }
}
