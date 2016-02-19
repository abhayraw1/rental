<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function login()
	{
		return\View::make('login');
	}
	
	public function signup1()
	{
		return\View::make('signupstep1');
		
	}
	public function signup2()
	{
		return\View::make('signupstep2');
		
	}
	public function  userlogin()
	{
		$user=array(
			'email'=>Input::get('email'),
			'password'=>Input::get('password')
			);

		if(\Auth::attempt($user))
		{
			return Redirect::to('dashboard')->with('message','Successfully Logged In!');
		}
		else{
			return Redirect::to('login')->with('message','Your email/password combination is incorrect!')->withInput();

		}
	}
	public function  signupstep1()
	{
		$validation=User::validate(Input::all());
		if($validation->passes())
		{
			$user = array(
				'name'=>Input::get('name'),
				'college'=>Input::get('college'),
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password')));
			User::create($user);
			$user_sign=User::whereemail(Input::get('email'))->first();
			\Auth::login($user_sign);
			return Redirect::to('dashboard')->with('message','Successfully Registered! Now you are logged in!');
		}	
		else{
			return Redirect::to('signup')->withErrors($validation->errors())->withInput();
		}
	}

	public function  signupstep2()
	{
		$validation=User::validate(Input::all());
		if($validation->passes())
		{
			$user = array(
				'name'=>Input::get('name'),
				'college'=>Input::get('college'),
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password')));
			User::create($user);
			$user_sign=User::whereemail(Input::get('email'))->first();
			\Auth::login($user_sign);
			return Redirect::to('dashboard')->with('message','Successfully Registered! Now you are logged in!');
		}	
		else{
			return Redirect::to('signup')->withErrors($validation->errors())->withInput();
		}
	}
	public function logout()
	{
		if(\Auth::check())
		{
			\Auth::logout();
		
			return Redirect::to('/')->with('message','Successfully Logged Out!'); 
		}
		else
		{
			return Redirect::to('login')->with('message','You need to login first!'); 
		}
	}
}
