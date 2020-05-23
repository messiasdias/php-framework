<?php


 //home - Twig
$this->group([ '/', '/home'], function() {  
	return $this->app->view('home');
 } );


//home2 - VueJs
$this->router_group([ '/2', '/home2'], function() {  
	return $this->app->view('vue');
 } );


 //home3 - VueJs RunTime
$this->router_group([ '/3', '/home3'], function() {  
	return $this->app->view('vue-runtime');
 } );





