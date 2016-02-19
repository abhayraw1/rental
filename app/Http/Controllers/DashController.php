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
  $queries = College::where('name','like','%'.$data.'%' )->take(10)->get();
  foreach ($queries as $query) {
    $resp[] = $query->name;
  }
  return Response::json($resp);
 }
 public function dashboard()
 {
 	$clg = Session::get('college');
 	$college = College::where('college_name',$clg)->first();
	$products = Product::where('user_id',User::where('college',$college->id)->pluck('id'))->get();
	return \View::make('dashboard',compact('clg','products'));

 }
 public function collegesearch()
 {

 	$search = Input::get('college');
 	$college = College::where('college_name',$search)->first();
 	 if($college)
 	 {
 	 	Session::put('college',$college);
 	 	return Redirect::to('dashboard');
 	 }
 	 else
 	 {

 	 }

 }
}
