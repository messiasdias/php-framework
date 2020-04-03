<?php

/**
 *  User Class
 */

namespace App\Models;
use App\App;
use App\Model\Model;
use App\Database\DB;



class User extends Model
{	
	public $first_name, $last_name, $username, $pass, $confirm_pass, $email, $confirm_email,  $remember_token, $rol, $status, $img;	
	public $table = 'users';



	public function create (){	

		if( is_null($this->img) ){
			$this->img = 'img/default/avatar.png';
		}

		$validations = [
			'username' => 'username|minlen:5|noexists:user',
			'pass' => 'string|minlen:6',
			'confirm_pass' => 'compare_hash:pass',
			'first_name' => 'string|minlen:4',
			'last_name' => 'string|minlen:4',
			'email' => 'email|noexists:user',
			'img' => 'minlen:0',
			'status' => 'mincount:1|maxlen:2',
			'rol' => 'int|minlen:1|maxlen:1'
		];

	
		$this->first_name = ucwords($this->first_name);
		$this->last_name = ucwords($this->last_name);

		return self::save( (array) $this , $validations);
	
	}




	public function update (){

		$validations = [
			'id' => 'int|mincount:1|exists:user',
			'first_name' => 'string|minlen:4',
			'last_name' => 'string|minlen:4',
			'username' => 'username|minlen:5|exists:user',
			'email' => 'email',
			'confirm_email' => 'confirm:email|noexists:user',
			'status' => 'mincount:-1|maxlen:2',
			'rol' => 'int|mincount:1|maxlen:1',
			'pass' => 'string|minlen:8',
			'confirm_pass' => 'confirm:pass',
			'img' => 'string|minlen:0',
		];

		if( isset($this->first_name) && isset($this->last_name) ) {
			$this->first_name = ucwords($this->first_name);
			$this->last_name = ucwords($this->last_name);
		}
		
		return self::save( (array) $this , $validations);

	}


	public function name(){
		return $this->first_name.' '.$this->last_name;
	}
	
	public function delete(array $validations=null){
        parent::remove($validations);
	}


}



?>