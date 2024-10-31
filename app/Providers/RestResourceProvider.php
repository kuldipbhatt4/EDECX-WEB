<?php

namespace App\Providers;

use App\RestResource\RestResponse;
use Illuminate\Support\ServiceProvider;

class RestResourceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('RestResponse',function (){
            return new RestResponse();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
