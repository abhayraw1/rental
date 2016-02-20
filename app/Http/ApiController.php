<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetails;
use App\College;
use App\Lend;
use Validator;
use View;
use Redirect;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
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
			$userdetail.= UserDetails::where('email',$user['email'])->pluck('name');
			$userdetail.=",";
			$college = College::where('id',UserDetails::where('email',$user['email'])->pluck('college'))->pluck('college_name');
			$userdetail.= ;
			$userdetail.=",";
			$userdetail.= UserDetails::where('email',$user['email'])->pluck('email');
			$userdetail.=",";
			$userdetail.= UserDetails::where('email',$user['email'])->pluck('contact');

			return $userdetail;
		}
		else{
			return "";
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

   $validation = Validator::make($data, $rules);
if($validation->passes())
		{
			$user = array(
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password')));
			User::create($user);
			$userdetail = new userDetails;
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

 public function collegesearch()
 {

 	$search = Input::get('college');
 	$college = College::where('college_name',$search)->orWhere('SKU',$search)->first();
 	 if($college)
 	 {
 	 $products = Product::where('user_id',User::where('email',UserDetail::where('college',$search)->pluck('email'))->pluck('id'))->get();
 	 }
 	 else
 	 {
 	 	Session::put('message',"College Not Found");
 	 
 	 	return Redirect::to('/');
 	 }

 }
}
