<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Faq;
class FaqController extends Controller
{
    public function faqindex()
    {
        $faqsstudents = Faq::where('student_tutor','=','0')->paginate(10);
        $faqstutors = Faq::where('student_tutor','=','1')->paginate(10);

        return view('edecx-admin/pages/faq/faq-index', compact('faqsstudents','faqstutors'));
    }

    public function createfaq()
    {
        return view('edecx-admin/pages/faq/create-faq');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'faq_question'=>'required',
                'faq_answer'=>'required',
                'student_tutor'=>'required'
            ]);
            $faq = new Faq([
                'faq_question' => $request->get('faq_question'),
                'faq_answer' => $request->get('faq_answer'),
                'student_tutor'=> $request->get('student_tutor')
            ]);
            $faq->save();
            return redirect('/edecx-admin/pages/faq/faq-index')->with('success', ' Data Saved');
        }

        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $faqs= Faq::find($id);
        return view('edecx-admin.pages.faq.edit', compact('faqs', 'id'));
    }


    public function update(Request $request, $id)
    {
        try
        {
                $faq = Faq::find($id);
                $faq->student_tutor = $request->get('student_tutor');
                $faq->faq_question = $request->get('faq_question');
                $faq->faq_answer = $request->get('faq_answer');
                $faq->save();
                return redirect('/edecx-admin/pages/faq/faq-index')->with('success', ' Data updated!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

        public function destroy($id)
        {
            $faq = Faq::find($id);
            if(!$faq)
            {
                return redirect('/edecx-admin/pages/faq/faq-index');
            }
            $delete_faq=Faq::where('id', $id)->forceDelete();
            if($delete_faq)
            {
                return redirect('/edecx-admin/pages/faq/faq-index')->with('success', 'Successfully Data Deleted');;
            }
        }

}
