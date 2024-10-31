<?php


Route::namespace('api')->group(function () {
	Route::post('student/login', 'StudentAuthController@login')->name('student_login');
	Route::post('register', 'StudentAuthController@register')->name('student_register');
	Route::post('forgot-password', 'StudentAuthController@forgot_password')->name('forgot-password');
	Route::post('otp-verify', 'StudentAuthController@otp_verify')->name('otp-verify');
	Route::post('update-password', 'StudentAuthController@update_password')->name('update-password');
	Route::post('change-password', 'StudentAuthController@change_password')->name('change-password');
});

Route::middleware('auth:studentapi')->group(function () {
	Route::namespace('Student\Auth')->group(function () {
		Route::get('detail','StudentAuthController@getUser');
		Route::post('logout','StudentAuthController@logout');
	});
});
