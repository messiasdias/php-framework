<?php

 //home - Twig
$app->router_group([ '/', '/home'], function() {  
	return $this->app->controller('home');
 } );


//home2 - VueJs
$app->router_group([ '/2', '/home2'], function() {  
	return $this->app->view('vue-app');
 } );





