<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Policy;

class PolicyController extends Controller
{
    public function policyindex()
    {
        $policies = Policy::paginate(10);
        return view('edecx-admin/pages/policy/policy-index' ,compact('policies'));
    }

    public function createpolicy()
    {
        return view('edecx-admin/pages/policy/create-policy');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'version'=>'required',
                'policy'=>'required'
            ]);
            $policy = new Policy([
                'version' => $request->get('version'),
                'policy' => $request->get('policy')
            ]);
            $policy->save();
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('edecx-admin/pages/policy/policy-index')->with('success', ' saved!');
    }
    public function edit($id)
    {
        $policy= Policy::find($id);
        return view('edecx-admin.pages.policy.policy-edit', compact('policy', 'id'));
    }
    public function update(Request $request, $id)
    {
        try
        {
            $request->validate([
                'version'=>'required',
                'policy'=>'required'
            ]);
            $policy = Policy::find($id);
            $policy->version = $request->get('version');
            $policy->policy = $request->get('policy');
            $policy->save();
            return redirect('/edecx-admin/pages/policy/policy-index')->with('success', ' Data updated!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        $policy = Policy::find($id);
        if(!$policy)
        {
            return redirect('/edecx-admin/pages/policy/policy-index');
        }
        $delete_policy=Policy::where('id', $id)->forceDelete();
        if($delete_policy)
        {
            return redirect('/edecx-admin/pages/policy/policy-index')->with('success', 'Data updated!');
        }
    }
}
