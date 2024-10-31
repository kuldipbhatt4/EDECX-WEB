<?php

namespace App\Services\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Level;
use App\Http\Controllers\Admin\LevelController;

class LevelService extends LevelController
{
    public function IndexService()
    {
        $levels = Level::paginate(10);
        return $levels;
    }

}