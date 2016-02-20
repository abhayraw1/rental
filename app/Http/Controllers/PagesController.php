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
			$uname = UserDetails::where('email', $user['email'])->first()->name;
			Session::put('email', $user['email']);
			Session::put('uname', $uname);
			return 1;
		}
		else{
			return 0;
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
		if(!$validation->fails())
		{
			User::create($user);
			$userdetail = new userDetails;
			$userdetail->email = $user['email'];
			$userdetail->name = $data['name'];
			$userdetail->contact = $data['contact'];
			$collegeid = College::where('college_name',$data['college'])->OrWhere('SKU', $data['college'])->first()->id;
			$userdetail->college_id = $collegeid;
			$userdetail->save();
			$user_sign=User::whereemail(Input::get('email'))->first();
			\Auth::login($user_sign);
			Session::put('uname', $data['name']);
			Session::put('email', $data['email']);
			return 1;
		}
		return $validation->errors();
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

	public function addpost(){
		if(\Auth::check()){
			return View::make('addpost');
		}
		return Redirect::route('home');
	}
}
