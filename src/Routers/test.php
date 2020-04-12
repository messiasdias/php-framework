<?php 

$app->get('/test' , $callback = function($app,$args) {  
	return $app->controller('test');
 } , null);



 $app->get('/test/{id}int' , $callback = function($app,$args) {  
	return $app->controller('test@test');
 } , null);
