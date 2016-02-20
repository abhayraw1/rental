<?php
use App\User;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::all();
        for($i = 0; $i < ($user->count() * 2); $i++){

    		DB::table('product')->insert([
    			'name' => str_random(20),
    			'user_id' => $user[$i / 2]->id,
    			'details' => str_random(100),
    			'image' => str_random(12),
    			'rent_time' => json_encode(['dwm' => rand(1, 3), 'no' => rand(1, 31)]),
    			'cost' => rand(20, 1000)
    			]);
    	}
    }
}
