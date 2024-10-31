<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects=Subject::paginate(10);
        return view('edecx-admin.subject.index',compact('subjects'));
    }

    public function create()
    {
        return view('edecx-admin/subject/create');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'subject_app_icon'=>'required|image|mimes:jpeg,png,jpg|max:2048',
                'subject_web_icon'=>'required|image|mimes:jpeg,png,jpg|max:2048',
                'subject_name'=>'required'
            ]);
            $appimage = time().'.'.$request->file('subject_app_icon')->getClientOriginalExtension();
            $webimage = rand(99,9999).time().'.'.$request->file('subject_web_icon')->getClientOriginalExtension();
            $subject = new Subject([
                'subject_app_icon' => $appimage,
                'subject_web_icon' => $webimage,
                 'subject_name' => $request->get('subject_name')
            ]);
            $subject->save();

            $path = public_path().'/edecx/admin/subject-icon/';
            if (!is_dir($path))
            {
                mkdir($path, 0755, true);
            }
            $request->subject_app_icon->move($path, $appimage);
            $request->subject_web_icon->move($path, $webimage);
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('edecx-admin/subject/index')->with('success', ' saved!');
    }

        public function edit($id)
        {
            $subject= Subject::find($id);
            return view('edecx-admin.subject.edit', compact('subject', 'id'));
        }

        public function update(Request $request, $id)
        {
            try
            {
                $request->validate([
                    'subject_app_icon'=>'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'subject_web_icon'=>'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'subject_name'=>'required'
                ]);
                $subject = Subject::find($id);
                $path = public_path().'/edecx/admin/subject-icon/';
                if (!empty($request->file('subject_web_icon')) || $request->file('subject_web_icon') != null )
                {
                    if($subject->subject_app_icon != ''  && $subject->subject_app_icon != null)
                    {
                        if(file_exists(public_path('edecx/admin/subject-icon/'.$subject->subject_app_icon )))
                        {
                            $app_icon_old = $path.$subject->subject_app_icon;
                            unlink($app_icon_old);
                        }
                    }
                }

                if (!empty($request->file('subject_web_icon')) || $request->file('subject_web_icon') != null )
                {
                    if($subject->subject_web_icon !== ''  && $subject->subject_web_icon !== null)
                    {
                        if(file_exists(public_path('edecx/admin/subject-icon/'.$subject->subject_web_icon )))
                        {
                            $web_icon_old = $path.$subject->subject_web_icon;
                            unlink($web_icon_old);
                        }
                    }
                }
                if ($request->hasFile('subject_app_icon'))
                {
                    $appimage = time().'.'.$request->file('subject_app_icon')->getClientOriginalExtension();
                }else
                {
                    $appimage = $request->subject_app_icon ?? null;
                }
                if ($request->hasFile('subject_web_icon'))
                {
                    $webimage = time().'.'.$request->file('subject_web_icon')->getClientOriginalExtension();
                }else
                {
                    $webimage = $request->subject_web_icon ?? null;
                }
                if ($webimage !== null)
                    $subject->subject_web_icon = $webimage;
                if ($appimage !== null)
                    $subject->subject_app_icon = $appimage;

                $subject->subject_name = $request->get('subject_name');
                $subject->save();

                if ($request->subject_app_icon !== null)
                    $request->subject_app_icon->move($path, $appimage);
                if ($request->subject_web_icon !== null)
                    $request->subject_web_icon->move($path, $webimage);
                return redirect('edecx-admin/subject/index')->with('success', ' Data updated!');
            }
            catch (ModelNotFoundException $exception)
            {
                return back()->withError($exception->getMessage())->withInput();
            }
        }

        public function destroy($id)
        {
            $subject = Subject::find($id);
            if(!$subject)
            {
                return redirect('edecx-admin/subject/index');
            }
            if ($subject->subject_app_icon != null || $subject->subject_app_icon != '')
            {
                if(file_exists(public_path('edecx/admin/subject-icon/'.$subject->subject_app_icon )))
                {
                    $appimage = public_path().'/edecx/admin/subject-icon/'.$subject->subject_app_icon;
                    unlink($appimage);
                }
            }
            if ($subject->subject_web_icon != null || $subject->subject_web_icon != '')
            {
                if(file_exists(public_path('edecx/admin/subject-icon/'.$subject->subject_web_icon )))
                {
                    $webimage = public_path().'/edecx/admin/subject-icon/'.$subject->subject_web_icon;
                    unlink($webimage);
                }
            }
            $delete_subject=Subject::where('id', $id)->forceDelete();
            if($delete_subject)
            {
                return redirect('edecx-admin/subject/index')->with('success', ' Data Deleted!');
            }
        }

}
