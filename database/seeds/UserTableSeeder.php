<?php
use App\College;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$count = College::all()->count();
    	
    	for($i = 0; $i < $count*10; $i++){
    		DB::table('users')->insert([
    			'active' => 1,
    			'email' => str_random(10).'@gmail.com',
    			'password' => \Hash::make('secret'),
    			]);
    	}
    }
}
