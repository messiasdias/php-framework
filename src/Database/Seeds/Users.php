<?php
namespace App\Database\Seeds;
use App\Database\Seeder;
use App\Models\User;
/**
 * Users Seeder Class
 */
class Users extends Seeder
{	
	
	public function __construct(array $users){
		
		
		foreach ($users as $value ) {
				$user = new User($value);
				$user->confirm_pass = $user->pass;
				$this->set_response( $user->create() , 'User '.$user->first_name);
		}

		
	}

	



}


