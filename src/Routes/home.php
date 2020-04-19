<?php

 //home - Twig
$app->router_group([ '/', '/home'], function($app,$args) {  
	return $app->controller('home');
 } );


//home2 - VueJs
$app->router_group([ '/2', '/home2'], function($app,$args) {  
	return $app->view('vue-app');
 } );





