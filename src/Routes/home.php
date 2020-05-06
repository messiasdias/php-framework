<?php


 //home - Twig
$this->group([ '/', '/home'], function() {  
	return $this->app->controller('home');
 } );


//home2 - VueJs
$this->router_group([ '/2', '/home2'], function() {  
	return $this->app->view('vue-app');
 } );




