<?php 

use App\ORM\DB;
use App\Models\User;

$this->get('/test/new' , function($app) { 

	$user = new User();
	$user->setFirstName('Messias');
	$user->setLastName('Dias');
	$user->setUsername('messiasdias');
	$user->setPass('P@55w0rd123');
	$user->setEmail('messias@mail.test');
	$user->setRol(1);
	$user->setStatus(1);
	$user->setCreated();
	$user->setUpdated();
	try{
		$user->save();
		echo 'Save Successfuly!';
	}catch( Exception $e){
		echo $e->getMessage();
	}
	

	//var_dump($user);
	//$app->json($user ); 

	
 } , null); 


 $this->get('/test/del' , function($app) { 

	$user = User::find(1);
	echo $user->getFirstName()."<br>"; 
	try{
		$user->delete();
		echo 'Deleted Successfuly!';
	}catch( Exception $e){
		echo $e->getMessage();
	}

	$app->json( [ 'user' => (array) $user ]); 
 } , null); 



 $this->get('/test' , function($app) { 

	$user = new User(['first_name' => 'marcos']);
	var_dump( $user->getFirstName(), $user->save() );	
	//$app->json( [ 'user' => (array) $user ]); 
 } , null); 

