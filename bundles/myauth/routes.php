<?php

/*
|--------------------------------------------------------------------------
| Bundle Home Route
|--------------------------------------------------------------------------
*/

$bundle_route = '(:bundle)/';

if(Config::get('myauth::config.bundle_route') != ''){

	Route::get($bundle_route, function(){ 

		if (Auth::guest()){
			return Redirect::to(Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.login_route'));
		} else {
			if(Config::get('myauth::config.login_redirect') != ''){
				return Redirect::to(Config::get('myauth::config.login_redirect'));
			} else {
				return View::make('myauth::dashboard');
			}
		}

	});

}

/*
|--------------------------------------------------------------------------
| Bundle Login Routes
|--------------------------------------------------------------------------
*/

$login_route = $bundle_route . Config::get('myauth::config.login_route');

Route::get($login_route, 'myauth::user@login' );

Route::post($login_route, 'myauth::user@login');

/*
|--------------------------------------------------------------------------
| Bundle Logout Route
|--------------------------------------------------------------------------
*/

$logout_route = $bundle_route . Config::get('myauth::config.logout_route');

Route::get($logout_route, 'myauth::user@logout');


/*
|--------------------------------------------------------------------------
| Bundle Signup Routes
|--------------------------------------------------------------------------
*/

$signup_route = $bundle_route . Config::get('myauth::config.signup_route');

// We won't be allowing signup for the time being, so disable these routes for now
//Route::get($signup_route, 'myauth::user@signup' );

//Route::post($signup_route, 'myauth::user@signup');



/*
|--------------------------------------------------------------------------
| Bundle Dashboard Route
|--------------------------------------------------------------------------
*/

if(Config::get('myauth::config.login_redirect') != ''){
	
		return Redirect::to(Config::get('myauth::config.login_redirect'));

} else {

	$dashboard_route = $bundle_route . 'dashboard';

	Route::get($dashboard_route, function(){ 
		if (Auth::guest()){
			return Redirect::to(Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.login_route'));
		} else {
			return View::make('myauth::dashboard'); 
		}
	});

}