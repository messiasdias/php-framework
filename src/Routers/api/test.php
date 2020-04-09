<?php 

$app->get('/test' , $callback = function($app,$args) {  
	return $app->controller('test');
 } , null);