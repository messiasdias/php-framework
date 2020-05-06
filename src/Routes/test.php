<?php 

use App\ORM\ORM;
 $this->get('/test' , function($app) { 


	$orm = new ORM();
	$app->write( var_dump($orm) );

 } , null); 

