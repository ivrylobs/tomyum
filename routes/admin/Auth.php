<?php
	// Admin User Auth
	Route::auth();
   	Route::get('/register/{plan?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::get('/verify/{token?}', 'Auth\RegisterController@verify')->name('verify');
	Route::get('/logout' , 'Auth\LoginController@logout');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('admin.login.social');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.social.callback');
