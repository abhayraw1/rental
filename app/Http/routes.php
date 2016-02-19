<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
Route::get('login',array('as'=>'login','uses'=>'PagesController@login'));
Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
Route::get('signup',array('as'=>'signup','uses'=>'PagesController@signup'));
Route::put('signupstep1',array('brfore'=>'csrf','uses'=>'PagesController@signupstep1'));
Route::put('signupstep2',array('brfore'=>'csrf','uses'=>'PagesController@signupstep2'));
Route::put('userlogin',array('brfore'=>'csrf','uses'=>'PagesController@userlogin'));





});
