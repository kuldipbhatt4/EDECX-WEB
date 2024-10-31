<?php

namespace App\RestResource;

use Illuminate\Support\Facades\Facade;

class RestResponseFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'RestResponse';
    }
}