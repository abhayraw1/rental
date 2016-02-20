<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetails;
use App\College;
use App\Lend;
use View;
use Redirect;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function home()
	{
		return \View::make('index');
	}
	public function login()
	{
		return\View::make('login');
	}
	
	public function signup()
	{
		return\View::make('signup');
		
	}
	public function  userlogin()
	{
		$user=array(
			'email'=>Input::get('email'),
			'password'=>Input::get('password')
			);

		if(\Auth::attempt($user)){
			Session::put('email', $user['email']);
			return Redirect::to('dashboard')->with('message','Successfully Logged In!');
		}
		else{
			return Redirect::to('login')->with('message','Your email/password combination is incorrect!')->withInput();
		}
	}
	public function  usersignup()
	{
		$rules=array(
			'name'=>'min:2',
			'email'=>'required|unique:users',
			'password'=>'required|min:4|confirmed',
			'password_confirmation'=>'required|min:4'



			);
		$data = Input::all();
		$user = array(
			'email'=>Input::get('email'),
			'password'=>\Hash::make(Input::get('password')));

		$validation = Validator::make($data, $rules);
		if($validation->passes())
		{
			User::create($user);
			$userdetail = new userDetails;
			$userdetail->name = $data['name'];
			$userdetail->contact = $data['contact'];
			$collegeid = College::where('college_name',$data['college'])->pluck('id');
			$userdetail->college_id = $collegeid;
			$userdetail->save();
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
