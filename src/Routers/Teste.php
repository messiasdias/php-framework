<?php

$app->get( '/teste', function($app,$args){
	return $app->controller('teste@index');
} );