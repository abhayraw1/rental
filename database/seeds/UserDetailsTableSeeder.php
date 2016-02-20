<?php
use App\User;
use App\College;

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::all();
        $college = College::all();

    	for($i = 0; $i < $users->count(); $i++){
    		DB::table('user_details')->insert([
    			'email' => $users[$i]->email,
    			'college_id' => $college[$i % 10]->id,
    			'contact' => rand(12345678, 999999),
    			'name' => str_random(7) . ' '. str_random(6)
    			]);
    	}
    }
}
