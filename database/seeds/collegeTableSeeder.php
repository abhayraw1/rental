<?php

use Illuminate\Database\Seeder;

class collegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i = 0; $i < 10; $i++){
    		$college = str_random(40);
    		DB::table('college')->insert([
    			'college_name' => $college,
    			'SKU' => substr($college, 0, 3),
    			]);
    	}
    }
}
