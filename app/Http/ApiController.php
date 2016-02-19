<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\College;
use App\Lend;
use View;
use Redirect;
use Session;
use Auth;
use Input;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function  userlogin()
	{
		$user=array(
			'email'=>Input::get('email'),
			'password'=>Input::get('password')
			);

		if(\Auth::attempt($user))
		{
			$userdetail = "";
			$userdetail.= UserDetail::where('email',$user['email'])->pluck('name');
			$userdetail.=",";
			$college = College::where('id',UserDetail::where('email',$user['email'])->pluck('college'))->pluck('college_name');
			$userdetail.= ;
			$userdetail.=",";
			$userdetail.= UserDetail::where('email',$user['email'])->pluck('email');
			$userdetail.=",";
			$userdetail.= UserDetail::where('email',$user['email'])->pluck('contact');

			return $userdetail;
		}
		else{
			return "";
		}
	}
	public function  usersignup()
	{
		$validation=User::validate(Input::all());
		if($validation->passes())
		{
			$data = Input::all();
			$user = array(
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password')));
			User::create($user);
			$userdetail = new userDetail;
			$userdetail->name = $data['name'];
			$userdetail->contact = $data['contact'];
			$collegeid = College::where('college_name',$data['college'])->pluck('id');
			$userdetail->college = $collegeid;
			$user_sign=User::whereemail(Input::get('email'))->first();
			\Auth::login($user_sign);
			return "1";
		}	
		else{

			return "0"	}
	}
	public function logout()
	{
		if(\Auth::check())
		{
			\Auth::logout();
		
			return "1" ; 
		}
		else
		{
			return "0"; 
		}
	}
}
