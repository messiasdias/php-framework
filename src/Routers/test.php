<?php 
use App\Models\Test;
$app->get('/test' , $callback = function($app,$args) {  
	//return $app->controller('test');
	//var_dump(Test::find('name', 'Teste') );
	echo "<br>";
	$test = new Test(['name' => 'Test 1']);
	var_dump($test->create() );

	var_dump( Test::all() );

	return $app;
 } , null);



 $app->get('/test/{id}int' , $callback = function($app,$args) {  
	return $app->redirect('/test2', 'POST', [ 'id' => $args->id]);
 } , null);



 $app->post('/test2' , $callback = function($app,$args) {  
	return $app->controller('test@test', $app->request->data);
 } , null);