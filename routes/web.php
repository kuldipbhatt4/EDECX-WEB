<?php

use App\Http\Controllers\EdecxController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('/edecx-admin')->name('edecx-admin.')->namespace('Admin')->group(function()
{
        Route::get('/dashboard', 'DashboardController@dashboard')->middleware('auth:admins');
        Route::post('/dashboard','DashboardController@dashboard')->middleware('auth:admins');
        Route::get('/dashboard','DashboardController@dashboard')->middleware('auth:admins');
        Route::get('/dashboard','DashboardController@dashboard_verifytutor')->middleware('auth:admins');
        Route::post('/dashboard/update/{id}','DashboardController@updateTutorStatus')->name('tutor.updateTutorStatus')->middleware('auth:admins');

        Route::namespace('Auth')->group(function()
        {
            Route::get('/login','LoginController@login')->name('login')->middleware('guest:admins');
            Route::post('/login', 'LoginController@postLoginadmin')->name('login');
            Route::get('/logout', 'LoginController@logout');
            Route::get('/setting/profile-edit', 'ProfileController@editprofile')->name('profileedit')->middleware('auth:admins');
            Route::post('/setting/profile-edit/update/{id}', 'ProfileController@updateprofile')->name('updateprofile ')->middleware('auth:admins');

            // Students Routes
            Route::post('/student/student-list','StudentController@studentlist');
            Route::get('/student/student-list','StudentController@studentlist')->middleware('auth:admins');
            Route::get('/student/{id}','StudentController@destroy')->name('student.destroy');

            // Tutors Routes
            Route::get('/tutor/tutor-approved-list','TutorController@tutor_approved_tutor')->middleware('auth:admins');
            Route::get('/tutor/tutor-approved-list/{id}','TutorController@destroyapprove')->name('tutor.destroyapprove');
            Route::get('/tutor/tutor-denied-list','TutorController@tutor_denied_tutor')->middleware('auth:admins');
            Route::get('/tutor/tutor-denied-list/{id}','TutorController@destroydisapprove')->name('tutor.destroydisapprove');

            // Subject Routes
            Route::get('/subject/index','SubjectController@index')->middleware('auth:admins');
            Route::post('/subject/create','SubjectController@store');
            Route::get('/subject/create','SubjectController@create')->middleware('auth:admins');
            Route::get('/subject/{id}','SubjectController@destroy')->name('subject.destroy');
            Route::get('/subject/{id}/edit', 'SubjectController@edit')->name('subject.edit');
            Route::post('/subject/update/{id}','SubjectController@update')->name('subject.update');

            // Level Routes
            Route::get('/level/create','LevelController@create')->middleware('auth:admins');
            Route::post('/level/create','LevelController@store');
            Route::get('/level/index','LevelController@index')->middleware('auth:admins');
            Route::get('/level/{id}','LevelController@destroy')->name('level.destroy');
            Route::get('/level/{id}/edit', 'LevelController@edit')->name('level.edit');
            Route::post('/level/update/{id}','LevelController@update')->name('level.update');

            // Location Routes
            Route::get('/location/create','LocationController@create')->middleware('auth:admins');
            Route::post('/location/index','LocationController@store');
            Route::get('/location/index','LocationController@index')->middleware('auth:admins');
            Route::get('/location/{id}','LocationController@destroy')->name('location.destroy');
            Route::get('/location/{id}/edit', 'LocationController@edit')->name('location.edit');
            Route::post('/location/update/{id}','LocationController@update')->name('location.update');

            // Profile Routes
            Route::get('/setting/profile-edit','ProfileController@editprofile')->middleware('auth:admins');
            Route::post('/setting/profile-edit','ProfileController@updateprofile');
            Route::get('/setting/account-setting','SettingController@setting')->middleware('auth:admins');
            Route::post('/setting/account-setting','SettingController@adminsetting');

            // Pages Routes
            Route::get('/pages/about-us','StaticpagesController@about')->middleware('auth:admins');
            Route::get('/pages/contact-us/','StaticpagesController@contactus')->name('contactf')->middleware('auth:admins');
            Route::post('/pages/contact-us/update/{id}','StaticpagesController@contactstore')->name('contactstore')->middleware('auth:admins');
            Route::get('/pages/inquiry-email','StaticpagesController@inquirylist')->middleware('auth:admins');
            Route::get('/pages/privacy-policy','StaticpagesController@privacy');
            Route::get('/pages/terms-condition','StaticpagesController@terms');

            //FAQ
            Route::get('/pages/faq/create-faq','FaqController@createfaq')->middleware('auth:admins');
            Route::post('/pages/faq/create-faq','FaqController@store');
            Route::get('/pages/faq/faq-index','FaqController@faqindex')->middleware('auth:admins');
            Route::post('/pages/faq/faq-index','FaqController@faqindex');
            Route::get('/pages/faq/{id}','FaqController@destroy')->name('faqs.destroy');
            Route::get('/pages/faq/{id}/edit', 'FaqController@edit')->name('faqs.edit');
            Route::post('/pages/faq/update/{id}','FaqController@update')->name('faqs.update');

            //T&C
            Route::get('/pages/term/create-term','TermsConditionController@createterm')->middleware('auth:admins');
            Route::post('/pages/term/create-term','TermsConditionController@store');
            Route::get('/pages/term/term-index','TermsConditionController@termindex')->middleware('auth:admins');
            Route::post('/pages/term/term-index','TermsConditionController@termindex');
            Route::get('/pages/term/{id}','TermsConditionController@destroy')->name('term.destroy');
            Route::get('/pages/term/{id}/edit', 'TermsConditionController@edit')->name('term.edit');
            Route::post('/pages/term/update/{id}','TermsConditionController@update')->name('term.update');

            //Privacy Policy
            Route::get('/pages/policy/create-policy','PolicyController@createpolicy')->middleware('auth:admins');
            Route::post('/pages/policy/create-policy','PolicyController@store');
            Route::get('/pages/policy/policy-index','PolicyController@policyindex')->middleware('auth:admins');
            Route::get('/pages/policy/{id}','PolicyController@destroy')->name('policy.destroy');
            Route::get('/pages/policy/{id}/edit', 'PolicyController@edit')->name('policy.edit');
            Route::post('/pages/policy/update/{id}','PolicyController@update')->name('policy.update');

            //Order History
            Route::get('/orderhistory/student/complete','AdminOrderHistoryController@studentcomplete')->middleware('auth:admins');
            Route::get('/orderhistory/student/pending','AdminOrderHistoryController@studentpending')->middleware('auth:admins');
            Route::get('/orderhistory/tutor/complete','AdminOrderHistoryController@tutorcomplete')->middleware('auth:admins');
            Route::get('/orderhistory/tutor/pending','AdminOrderHistoryController@tutorpending')->middleware('auth:admins');
        });
});

//website Routes
Route::get('/edecx-homepage','Website\HomeController@home');

//student
Route::prefix('/student')->name('student.')->namespace('Website\Student')->group(function()
{
     Route::namespace('Auth')->group(function()
     {
        Route::get('register','RegisterController@register');
        Route::post('postRegister','RegisterController@postRegister');
        Route::get('/login','LoginController@login')->name('login')->middleware('guest:students');
		Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth:students');
        Route::post('/postLoginstudent','LoginController@postLoginstudent')->name('postLoginstudent');
        Route::get('/student-dashboard','DashboardController@dashboard')->middleware('auth:students');
        Route::get('/student-dashboard-page','DashboardController@dashboardlistPagination')->middleware('auth:students');
        Route::get('/student-dashboard-page-details','DashboardController@dashboardlistDetails')->middleware('auth:students');

        
        Route::get('/forgot-password','LoginController@forgot')->middleware('guest:students');
        Route::get('change-password','LoginController@change_student_pwd')->middleware('auth:students');
        Route::post('change-password','LoginController@studentupdateoldpwd');
        Route::get('/student-profile','StudentProfileController@profile')->middleware('auth:students');
        Route::get('/student-profile-setting','StudentProfileController@student_profilesetting')->middleware('auth:students');
        Route::post('/student-profile-setting','StudentProfileController@updatestudentprofile')->middleware('auth:students');
        Route::any('/tutor-list','TutorListController@tutorlist')->middleware('auth:students');
        Route::get('/tutor-list-page','TutorListController@tutorlistPagination')->middleware('auth:students');

        Route::get('/book-appointment/{b_tutor_id}','TutorBookAppoController@listView')->middleware('auth:students');
        Route::post('/book-appointment-get-timeslots','TutorBookAppoController@getBookingSlots')->middleware('auth:students');
        Route::post('/student-book-appointment','TutorBookAppoController@bookingTutor')->middleware('auth:students');
    });
        
        Route::get('/student-faq','FaqStudentController@faq')->middleware('auth:students');
        Route::post('/student-faq','FaqStudentController@faq')->middleware('auth:students');
        Route::get('/booking','BookingController@booking')->middleware('auth:students');
        Route::get('/booking-page','BookingController@bookinglistPagination')->middleware('auth:students');
        Route::get('/booking-order-details','BookingController@bookinglistDetails')->middleware('auth:students');
        Route::get('/repeat-tutor-list','RepeatTutorController@repeattutor')->middleware('auth:students');
        Route::get('/order-history','OrderHistoryController@orderhistory')->middleware('auth:students');        
        Route::get('/order-history-page','OrderHistoryController@orderHistorylistPagination')->middleware('auth:students');
        Route::get('/order-history-details','OrderHistoryController@orderHistorylistDetails')->middleware('auth:students');
        Route::post('/order-history-submit-review','OrderHistoryController@orderHistorySubmitReview')->middleware('auth:students');

        Route::get('/my-wallet','MyWalletController@wallet')->middleware('auth:students');
        Route::post('/my-wallet/add-money','MyWalletController@walletAddMoney')->middleware('auth:students');        
        Route::get('change-pwd','ChangePsdStudentController@change_pwd')->middleware('auth:students');
        Route::post('change-pwd','ChangePsdStudentController@studentupdateoldpwd')->middleware('auth:students');
        
        Route::get('/my-given-review','GivenReviewController@myGivenReview')->middleware('auth:students'); 
        Route::get('/my-given-review-page','GivenReviewController@myGivenReviewPagination')->middleware('auth:students');       
        
});

// Tutor
Route::prefix('/tutor')->name('tutor.')->namespace('Website\Tutor')->group(function()
{
     Route::namespace('Auth')->group(function()
     {
         Route::get('register','RegisterTutorController@register');
         Route::post('postTutorRegister','RegisterTutorController@postTutorRegister');
         Route::get('/login','LoginController@login')->name('login')->middleware('guest:tutors');
		 Route::get('/logout', 'LoginController@logout')->name('logout')->middleware('auth:tutors');
         Route::post('postLogintutor','LoginController@postLogintutor');
         Route::get('/tutor-dashboard','DashboardController@dashboard')->middleware('auth:tutors');
         Route::get('/tutor-dashboard-page','DashboardController@dashboardlistPagination')->middleware('auth:tutors');
         Route::get('/tutor-dashboard-details','DashboardController@odashboardlistDetails')->middleware('auth:tutors');
         Route::post('/tutor-dashboard-change-status','DashboardController@dashboardChangeStatus')->middleware('auth:tutors');

         Route::get('/forgot-password','LoginController@forgot')->middleware('guest:tutors');
         Route::get('/change-password','LoginController@change_pwd')->middleware('auth:tutors');
         Route::post('/change-password','LoginController@updateoldpwd')->middleware('auth:tutors');
         Route::get('student-request','StudentRequestController@studentrequest')->middleware('auth:tutors');
         Route::get('/student-request-page','StudentRequestController@studentrequestlistPagination')->middleware('auth:tutors');
         Route::get('/student-request-details','StudentRequestController@ostudentrequestlistDetails')->middleware('auth:tutors');
         Route::post('/student-request-change-status','StudentRequestController@studentRequestChangeStatus')->middleware('auth:tutors');
      });
        Route::get('schedule-timing','ScheduleTimingController@scheduletiming')->middleware('auth:tutors');
        Route::post('schedule-timing-submit','ScheduleTimingController@scheduleTimingSubmit')->middleware('auth:tutors');
        Route::get('tutorbooking','BookingController@booking')->middleware('auth:tutors');
        Route::get('tutor-faq','FaqTutorController@faq')->middleware('auth:tutors');
        Route::post('tutor-faq','FaqTutorController@faq')->middleware('auth:tutors');
        Route::get('review','ReviewController@myreceivedReview')->middleware('auth:tutors');
        Route::get('/my-recevied-review-page','ReviewController@myReceivedReviewPagination')->middleware('auth:tutors');       
        Route::get('student-list','StudentListController@orderhistory')->middleware('auth:tutors');
        Route::get('/student-list-page','StudentListController@orderHistorylistPagination')->middleware('auth:tutors');
        Route::get('/student-list-details','StudentListController@orderHistorylistDetails')->middleware('auth:tutors');
        Route::post('/student-list-change-status','StudentListController@orderHistoryChangeStatus')->middleware('auth:tutors');
        Route::get('tutor-profile','TutorProfileController@tutorprofile')->middleware('auth:tutors');        
        Route::get('profile-setting','TutorProfileController@editprofile')->middleware('auth:tutors');
        Route::post('profile-setting','TutorProfileController@updatetutorprofile')->name('tutor.profile')->middleware('auth:tutors');
        //Route::get('student-request','StudentRequestController@studentrequest')->middleware('auth:tutors');
        Route::get('/change-pwd','ChangePsdTutorController@change_pwd')->middleware('auth:tutors');
        Route::get('/my-wallet','MyWalletTutorController@walletTutor')->middleware('auth:tutors');
});

Route::get('/about-us','Website\AboutController@about');
Route::get('/online-tutoring','Website\OnlinetutoringController@onlinetutor');
Route::get('/become-tutor','Website\BecometutorController@becometutor');
Route::get('/find-tutor','Website\FindTutorController@findtutor');
Route::get('/contact-us','Website\ContactusController@contactus');
Route::post('/contact-us','Website\ContactusController@contactstore');
Route::get('/terms-conditions','Website\TermsController@tc');
Route::post('/terms-conditions','Website\TermsController@tc');
Route::get('/privacy-policy','Website\PrivacyController@pc');
Route::post('/privacy-policy','Website\PrivacyController@pc');
//Route::post('/find-tutor','Website\FindTutorController@listlevel');
Route::get('/', 'Website\HomeController@home')->name('edecx');
Route::get('tutor/tutor-profile/{id}','Website\Tutor\TutorProfileController@tutorPublicProfile')->middleware('auth:students');
Route::get('student/student-profile/{id}','Website\Student\Auth\StudentProfileController@studentPublicProfile')->middleware('auth:tutors');
Route::post('payment-knet/my-wallet-get-knet-responce','Website\Student\MyWalletController@knetResponce');