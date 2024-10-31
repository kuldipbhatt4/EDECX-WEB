<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\TutorDetails;
use App\Tutor;
use App\StudentDetails;
use App\Student;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['website.partials.footer', 'student.partials.footer', 'tutor.partials.footer'], function ($view) {
            view()->share('footer', \App\ContactUs::find(1)->get());
        });
        view()->composer(['website.partials.footer', 'student.partials.footer', 'tutor.partials.footer'], function ($view) {
            view()->share('footerlinks', \App\EdecxAdmin::find(1)->get());
        });
        view()->composer(['tutor.partials.sidebar', 'tutor.partials.header'], function ($view) {
            $id = Auth::guard('tutors')->id();
            $tutordetails = TutorDetails::where('tid','=',$id)->get();
           view()->share('tutordetails', $tutordetails);
        });

        view()->composer(['student.partials.sidebar', 'student.partials.header'], function ($view) {
            $id = Auth::guard('students')->id();
            $studentdetails = StudentDetails::where('sid','=',$id)->get();
           view()->share('studentdetails', $studentdetails);
        });
    }
}
