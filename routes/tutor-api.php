<?php

Route::namespace('Tutor\Auth')->group(function () {
	Route::post('login', 'TutorAuthController@login')->name('tutor_login');
	Route::post('register', 'TutorAuthController@register')->name('tutor_register');
});

Route::middleware('auth:tutorapi')->group(function () {
	Route::namespace('Tutor\Auth')->group(function () {
		Route::get('detail','TutorAuthController@getUser');
		Route::post('logout','TutorAuthController@logout');
	});
});