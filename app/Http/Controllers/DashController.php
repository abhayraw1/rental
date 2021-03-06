<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetails;
use App\College;
use App\Product;

use App\Lend;
use View;
use Response;
use Redirect;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 public function autocompletecollege()
 {
  $data = Input::get('term');
  $resp = array();
  $queries = College::where('college_name','like','%'.$data.'%' )->orWhere('SKU','like','%'.$data.'%' )->take(10)->get();
  foreach ($queries as $query) {
    $resp[] = $query->college_name;
  }
  return Response::json($resp);
 }
	public function dashboard()
	{
		$clg = Session::get('college');
		$college = College::where('college_name',$clg)->first();
		if(!$clg)
		{
			$clg = "Null";
		}
		else{
			$emails = UserDetails::where('college_id',$college->id)->get();
			$email = array();
			$user = array();
			foreach ($emails as $em) {
				$email[] = $em->email; 
			}
			foreach ($email as $em) {
				$user[] = User::where('email',$em)->get()[0]->id;
			}

			$products = array();
			$fpro = array();		
			$i=0;
			foreach ($user as $use) {

				$products[$i] = Product::where('user_id',$use)->get();
				foreach ($products[$i] as $pro) {
					$fpro[] = Product::where('id',$pro->id)->get()[0]; 
				}
				$i++;

			}
	$products = $fpro;
	
		}
		return \View::make('dashboard',compact('clg','products'));

	}
	public function collegesearch()
	{

		$search = Input::get('college');
		$college = College::where('college_name',$search)->first();
		if($college)
		{
			Session::put('college',$college->college_name);
			return Redirect::to('dashboard');
		}
		else
		{
			Session::put('message',"College Not Found");

			return Redirect::to('mmmm');
		}

	}

	public function searchitem()
	{

		$search = Input::get('item');
		$college = College::where('college_name',Session::get('college'))->first();
		if($college)
		{
			$products = Product::where('name','like','%'.$search.'%')->get();
			$clg = Session::get('college');
			return \View::make('dashboard',compact('clg','products'));
		}
		else
		{
			Session::put('message',"College Not Found");

			return Redirect::to('mmmm');
		}

	}
	public function myads()
	{}
}
