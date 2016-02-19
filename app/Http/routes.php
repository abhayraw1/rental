<?php



Route::group(['middleware' => ['web']], function () {

	Route::get('login',array('as'=>'login','uses'=>'PagesController@login'));
	Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
	Route::get('/',array('before'=>'csrf','uses'=>'PagesController@home'));
	Route::get('signup',array('as'=>'signup','uses'=>'PagesController@signup'));



	Route::post('usersignup',array('before'=>'csrf','uses'=>'PagesController@usersignup'));
	Route::post('userlogin',array('before'=>'csrf','uses'=>'PagesController@userlogin'));



	
});