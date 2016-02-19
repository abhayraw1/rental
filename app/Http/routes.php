<?php



Route::group(['middleware' => ['web']], function () {

	Route::get('login',array('as'=>'login','uses'=>'PagesController@login'));
	Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
	Route::get('signup',array('as'=>'signup','uses'=>'PagesController@signup'));
	Route::put('signupstep1',array('brfore'=>'csrf','uses'=>'PagesController@signupstep1'));
	Route::put('signupstep2',array('brfore'=>'csrf','uses'=>'PagesController@signupstep2'));
	Route::put('userlogin',array('brfore'=>'csrf','uses'=>'PagesController@userlogin'));

});
