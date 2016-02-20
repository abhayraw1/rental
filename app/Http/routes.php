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


	Route::get('usersignup',array('uses'=>'PagesController@usersignup'));
	Route::get('collegesearch',array('uses'=>'DashController@collegesearch'));

	Route::get('usersignup',array('uses'=>'PagesController@usersignup'));
	Route::get('userlogin',array('uses'=>'PagesController@userlogin'));




});