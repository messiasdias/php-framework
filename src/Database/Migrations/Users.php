<?php
/**
 *  Users Migration Class
 */

namespace App\Database\Migrations;
use App\Database\DB;
use App\Database\Table;
use App\Database\Migration;


class Users extends Migration 
{
		public $class = 'User';

		public function cols(){
			// table cols
			// $this->table->addCol('col-name','col-type',col-size [100], NULL [false | true], AI [true|false], DEFAULT ['value'] );
			$this->table->addCol('id','int',100, false, true);	
			$this->table->addCol('first_name','varchar');
			$this->table->addCol('last_name','varchar');
			$this->table->addCol('email','varchar');
			$this->table->addCol('username','varchar');
			$this->table->addCol('pass','text',1000);
			$this->table->addCol('img','text',1000, true);
			$this->table->addCol('rol','int',1 , false, false, 2);
			$this->table->addCol('status','int',1 , false, false, [0]);
			$this->table->addCol('remember_token','text', 1000 , true);
			$this->table->addCol('created','timestamp');
			$this->table->addCol('updated','timestamp');

		}


}