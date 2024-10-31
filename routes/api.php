<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('api')->group(function () {
	Route::post('student-login', 'StudentAuthController@login')->name('student_login');
	Route::post('student_register', 'StudentAuthController@register')->name('student_register');
	Route::post('forgot-password', 'StudentAuthController@forgot_password')->name('forgot-password');
	Route::post('otp-verify', 'StudentAuthController@otp_verify')->name('otp-verify');
	Route::post('update-password', 'StudentAuthController@update_password')->name('update-password');
	Route::post('change-password', 'StudentAuthController@change_password')->name('change-password');
});

Route::middleware('auth:studentapi')->group(function () {
	Route::namespace('api')->group(function () {
		Route::get('detail','StudentAuthController@getUser');
		Route::post('logout','StudentAuthController@logout');
	});
});

Route::namespace('api')->group(function () {
	Route::post('tutor-login', 'TutorAuthController@login')->name('tutor_login');
		Route::post('tutor_login_new', 'TutorAuthController@login_new')->name('tutor_login_new');
	Route::post('register', 'TutorAuthController@register')->name('tutor_register');
});

Route::middleware('auth:tutorapi')->group(function () {
	Route::namespace('api')->group(function () {
		Route::get('detail','TutorAuthController@getUser');
		Route::post('logout','TutorAuthController@logout');
    });
});

Route::post('/level-list','api\LevelApiController@index');
Route::post('/subject-list','api\SubjectController@index');
Route::post('/location-list','api\LocationController@index');
Route::get('/get-class-type','api\ClassTypeController@index');
Route::post('/get-tutor-list','api\TutorListController@tutor_list');
Route::post('/tutor-detail','api\TutorDetailController@tutor_detail');
Route::post('/tutor-profile-upload','api\TutorDetailController@tutor_profile');
Route::post('/tutor-rate','api\TutorDetailController@tutor_rate');
Route::post('/tutor-bio','api\TutorDetailController@tutor_bio');
Route::post('/get-tutor-bio','api\TutorDetailController@get_tutor_bio');
Route::post('/get-rate-bio','api\TutorDetailController@get_tutor_rate');
Route::post('/get-tutor-class-type','api\ClassTypeController@get_tutor_class_type');
Route::post('/set-tutor-class-type','api\ClassTypeController@set_tutor_class_type');
Route::post('/tutor-profile-detail','api\TutorDetailController@tutor_profile_detail');
Route::post('/review','api\ReviewController@review');
Route::post('/get-faq','api\ReviewController@faq');
Route::post('/get-tutor-available-timeslot','api\TimeController@getTutorTime');
Route::post('/set-tutor-available-timeslot','api\TimeController@setTutorTime');

Route::post('/get-qualification','api\TutorDetailController@get_qualification');
Route::post('/set-qualification','api\TutorDetailController@set_qualification');

Route::post('/get-student-info','api\StudentDetailController@getPersonalInfo');
Route::post('/set-student-info','api\StudentDetailController@setPersonalInfo');
Route::post('/get-qualification-info','api\StudentDetailController@getQualificationInfo');
Route::post('/set-qualification-info','api\StudentDetailController@setQualificationInfo');

Route::post('/get-address-info','api\StudentDetailController@getAddressInfo');
Route::post('/set-address-info','api\StudentDetailController@setAddressInfo');
Route::post('/get-notification','api\StudentDetailController@getNotification');
Route::post('/delete-account','api\StudentDetailController@deleteAccount');
Route::post('/get-payment','api\PaymentController@getPayment');
Route::post('/set-payment','api\PaymentController@setPayment');

Route::post('/add-booking','api\BookingController@addBooking');
Route::post('/get-tutor-day-time','api\TimeController@getTutorDayTime');




Route::post('/student-history','api\BookingController@studentHistory');
Route::post('/tutor-history','api\BookingController@tutorHistory');




Route::post('/get-notification-setting','api\StudentDetailController@getNotificationSetting');
Route::post('/set-notification-setting','api\StudentDetailController@setNotificationSetting');
