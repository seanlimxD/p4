<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
    		['test', 'test@test.com', 'test'],
    		['testa', 'testa@test.com', 'testa'],
    	];

    	$count = count($users);
	    
	    foreach ($users as $key => $userData) {
	        $user = new User();
	        $user->name = $userData[0];
	        $user->email = $userData[1];
	        $user->password = Hash::make($userData[2]);

	        $user->save();
	        $count--;
	    }
    }
}
