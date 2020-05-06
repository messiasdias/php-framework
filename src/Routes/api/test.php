<?php 

$app->get('/test' , function() {  

	/*
	$response = $this->app->api('http://portifolio.local/api/login', 'POST',
	 [ 'form_params' => [ 'username' => '@messiasdias', 'pass' => 'P@55w0rd123' ]]
	);
	var_dump($response->data ); */

	/*
	//https://api.github.com/users/messiasdias/repos
	foreach($response->data as $item){
		echo "<p>".ucfirst($item->name)." | private:" .$item->private. "</p>";
	} */

	//75b2bc913ecae473bea6c49b4f1fca7f6cc0e046
	$response = $this->app->api('https://api.github.com/user/repos', 'get', [ 
		'headers' => ['Authorization' => 'token 75b2bc913ecae473bea6c49b4f1fca7f6cc0e046' ],
		]);
		
	$this->app->json((array)$response);
	//return $this->app->controller('test');
 } , null);