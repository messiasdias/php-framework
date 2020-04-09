<?php 
/**
 * Test Model Class
 */
namespace App\Models;
use App\Model\Model;
use App\Database\DB;

class Test extends Model {

	public $name, $table = 'test' ;

	public function create (){
		$validations = [
			'name' => 'string|noexists:test',
		];
		$this->name = ucwords($this->name);
		return self::save( (array) $this , $validations);
	}

	public function update(){
		$validations = [
			'id' => 'int|exists:test',
			'name' => 'string|minlen:5|noexists:test',
		];
		$this->name = ucwords($this->name);
		return self::save( (array) $this , $validations);
	}

	public function delete(){
		return self::delete();
	}


}
