<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\College;
use App\Lend;
use App\Product;
use App\Notifications;

use Illuminate\Support\Facades\Input;

use View;
use Redirect;
use Session;
use Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OpController extends BaseController
{
	public function post_notification($user_id = null, $lr){
		if(Auth::check()){
			$user = User::where('email', Session::get('email'))->first()->get();
			$notification = new Notification;
			$notification->to = $user_id;
			$notification->from = $user->id;
			$notification->lent_rent = $lr;
			$notification->read = 0;
			$notification->added_on = time();
		}
	}

	public function my_notifications(){
		if(Auth::check()){
			$user = User::where('email', Session::get('email'))->first()->get();
			$my_nots = Notification::where('to', $user->id);
			$request = $my_nots->where('lr', 1)->get();
			$approved = $my_nots->where('lr', 2)->get();
		}
	}

	public function createpost(){
		$user = User::where('email', Session::get('email'))->first();
		//dd($user);
		if(\Auth::check()){
			$data = Input::all();
			//$ext = Input::file('file')->guessClientExtension();
			$product = new Product;
			$product->name = $data['title'];
			$product->user_id = $user;
			$product->details = $data['details'];
			$time = '';
			switch($data['tim']){
				case 1:
					$time .= $data['tim'] . 'Days';
					break;
				case 2:
					$time .= $data['tim'] . 'Weeks';
					break;
				case 3:
					$time .= $data['tim'] . 'Months';
					break;
			}

			//$product->rent_time = $time;
			//$product->file = str_random(10) . '.' . $ext;
			//Input::file('photo')->move(__DIR__.'/uploads/', $fileName);
			$product->cost = $data['cost'];
			$product->save();

			dd($product);
		}
		return Redirect::route('home');
	}

}