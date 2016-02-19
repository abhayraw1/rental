<?php



Route::group(['middleware' => ['web']], function () {

	Route::get('login',array('as'=>'login','uses'=>'PagesController@login'));
	Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
	Route::get('/', function(){
		return time();
	});
	Route::get('signup',array('as'=>'signup','uses'=>'PagesController@signup'));



	Route::put('signupstep1',array('before'=>'csrf','uses'=>'PagesController@signupstep1'));
	Route::put('signupstep2',array('before'=>'csrf','uses'=>'PagesController@signupstep2'));
	Route::put('userlogin',array('before'=>'csrf','uses'=>'PagesController@userlogin'));




});