<?php 

 $this->get('/test' , function() { 
	$this->app->view('ui');
 } , null);