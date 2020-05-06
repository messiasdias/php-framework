<?php
use App\Models\User;

 //admin painel
 $this->router_group(['/admin', '/login', '/painel'], function($app,$args) {  
	return $app->controller('auth@index', $args);
 } );


 $this->router_group(['/admin', '/login', '/painel'], function($app,$args) {  
	return $app->controller('auth@index', $args);
 } );

//login
$this->post('/login', function(){
	return $this->app->controller('Auth@login', $this->args);
});

//logout
$this->router_group( [ [ 'url' => '/logout'], [ 'url'=> '/logout', 'method' => 'post' ] ], function($app,$args){
	//logout painel Twig	
	return $app->controller('Auth@logout', $args);

	//logout painel Vuejs
	//$app->auth()->logout();
	//return $app->view('vue-template');
});


//list
$this->router_group(['/users', '/users/list', '/users/{page}int/{ppage}int'], function($app, $args){
	return $app->controller('users@list', $args);
} , 'admin');


//search
$this->post('/users/search', function($app, $args){
	return $app->controller('users@search', $args);
} , 'admin', 200);



//create form
$this->get('/users/add', function($app, $args){
	$args->type = 'add';
	return $app->view('panel/users/form', ['type' => $args->type ]);
} , 'admin');


//create
$this->post('/users/add', function($app, $args){
	return $app->controller('users@create', $args);
} , 'admin');



//update update form - {attr} => name|email|type|pass
$this->get('/users/edit/{attr}str|minlen:4/{id}int|mincount:1', function($app, $args){
	$user =  User::find('id', $args->id);
	
	if($user){
		$app->middleware_obj = $user;

		if( $app->middlewares(['is_self','admin']) | ( $args->attr == 'type' && $app->middlewares('admin')  ) ){
			$app->inputs( $app->middleware_obj );
			return $app->view('user/form', ['type' => $args->attr ]);
		}
		return $app->controller('users@denied');

	}

	return $app->controller('users@notfound');
	
} ,  'auth');




//get profile
$this->group(['/users/{id}int', '/user/{id}int' ], function($app, $args){
	$user =  User::find('id', $args->id);
	unset($user->pass);
	return $app->view('adminlte/users/profile', ['user_item' =>  $user ]);
} , 'auth');


//delete
$this->post('/users/del', function($app, $args){
	return $app->controller('users@delete', $args);
},'admin' );


//Img upload
$this->post('/users/img', function($app, $args){
	$user = User::find('id', $app->request->data['id']);
	$app->middleware_obj = $user;
	if($app->middlewares('is_self, admin')) {
		return $app->controller('users@img_upload', $args);
	}
	return  $app->controller('users@denied', $args);
},'auth' );