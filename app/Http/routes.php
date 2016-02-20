<?php
use App\User;
use App\UserDetails;


Route::group(['middleware' => ['web']], function () {

	Route::get('login',array('as'=>'login','uses'=>'PagesController@login'));
	Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
	Route::get('/',array('as'=>'home','uses'=>'PagesController@home'));
	Route::get('dashboard',array('as'=>'dashboard','uses'=>'DashController@dashboard'));

	Route::get('/ss', function(){
		return UserDetails::where('college_id', '2')->pluck('id');
	});
	Route::get('signup',array('as'=>'signup','uses'=>'PagesController@signup'));
	Route::get('autocompletecollege',array('as'=>'autocompletecollege','uses'=>'DashController@autocompletecollege'));
	Route::get('common', function(){
		return \View::make('common');
	});

	Route::post('usersignup',array('before'=>'csrf','uses'=>'PagesController@usersignup'));
	Route::post('collegesearch',array('before'=>'csrf','uses'=>'DashController@collegesearch'));

	Route::post('userlogin',array('before'=>'csrf','uses'=>'PagesController@userlogin'));



	Route::get('api/usersignup',array('before'=>'csrf','uses'=>'ApiController@usersignup'));
	Route::get('api/collegesearch',array('before'=>'csrf','uses'=>'ApiController@collegesearch'));
	Route::get('api/userlogin',array('before'=>'csrf','uses'=>'ApiController@userlogin'));
	Route::get('api/logout',array('before'=>'csrf','uses'=>'ApiController@logput'));



});