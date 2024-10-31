<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Terms;

class TermsConditionController extends Controller
{
    public function termindex()
    {
        $terms = Terms::paginate(10);
        return view('edecx-admin/pages/term/term-index' ,compact('terms'));
    }

    public function createterm()
    {
        return view('edecx-admin/pages/term/create-term');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'version'=>'required',
                'condition'=>'required'
            ]);
            $term = new Terms([
                'version' => $request->get('version'),
                'condition' => $request->get('condition')
            ]);
            $term->save();
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('edecx-admin/pages/term/term-index')->with('success', ' saved!');
    }
    public function destroy($id)
    {
        $term = Terms::find($id);
        if(!$term)
        {
            return redirect('/edecx-admin/pages/term/term-index');
        }
        $delete_term=Terms::where('id', $id)->forceDelete();
        if($delete_term)
        {
            return redirect('/edecx-admin/pages/term/term-index');
        }
    }
    public function edit($id)
    {
        $term= Terms::find($id);
        return view('edecx-admin.pages.term.term-edit', compact('term', 'id'));
    }
    public function update(Request $request, $id)
    {
        try
        {
            $request->validate([
                'version'=>'required',
                'condition'=>'required'
            ]);
            $term = Terms::find($id);
            $term->version = $request->get('version');
            $term->condition = $request->get('condition');
            $term->save();
            return redirect('/edecx-admin/pages/term/term-index')->with('success', ' Data updated!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
