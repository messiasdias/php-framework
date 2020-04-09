<?php 
/**
 * Test Migration Class
 */

namespace App\Database\Migrations;
use App\Database\Migration;
use App\Database\DB;
use App\Database\Table;



class Test extends Migration 
{
		public $class = 'Test';

		public function cols(){
			/* 
			   Table cols definitions:
			   $this->table->addCol('col-name','col-type',col-size [100], NULL [false | true], AI [true|false]);
			*/
			$this->table->addCol('id','int',100, false, true);	
			$this->table->addCol('name','varchar');	
			$this->table->addCol('created','timestamp');
			$this->table->addCol('updated','timestamp');

		}


}