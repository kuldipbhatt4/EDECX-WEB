<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Level;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::paginate(20);
        return view('edecx-admin.level.index', compact('levels'));
    }

    public function create()
    {
        return view('edecx-admin/level/create');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'level'=>'required'
            ]);
            $level = new Level([
                 'level' => $request->get('level'),
            ]);
            $level->save();
            return redirect('edecx-admin/level/index')->with('success', 'New Level saved');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $level= Level::find($id);
        return view('edecx-admin.level.edit', compact('level', 'id'));
    }

    public function update(Request $request, $id)
    {
        try
        {
            $request->validate([
                'level'=>'required'
            ]);
            $level = Level::find($id);
            $level->level = $request->get('level');
            $level->save();
            return redirect('/edecx-admin/level/index')->with('success', ' Data updated!');
        }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $level = Level::find($id);
        if(!$level)
        {
            return redirect('/edecx-admin/level/index');
        }
        $delete_level=Level::where('id', $id)->forceDelete();
        if($delete_level)
        {
            return redirect('/edecx-admin/level/index')->with('suucess', 'Level Successfully Deleted!');
        }
    }
}
