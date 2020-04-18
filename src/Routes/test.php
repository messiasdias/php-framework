<?php 

 $app->get('/test' , $callback = function($app,$args) {  
	$app->controller('test');
 } , null);