<?php
use App\Models\User;

 //admin painel
 $app->router_group(['/admin', '/login', '/painel'], function($app,$args) {  
	return $app->controller('auth@index', $args);
 } );


 $app->router_group(['/admin', '/login', '/painel'], function($app,$args) {  
	return $app->controller('auth@index', $args);
 } );

//login
$app->post('/login', function($app,$args){
	return $app->controller('Auth@login', $args);
});

//logout
$app->router_group( [ [ 'url' => '/logout'], [ 'url'=> '/logout', 'method' => 'post' ] ], function($app,$args){
	//logout painel Twig	
	return $app->controller('Auth@logout', $args);

	//logout painel Vuejs
	//$app->auth()->logout();
	//return $app->view('vue-template');
});


//list
$app->router_group(['/users', '/users/list', '/users/{page}int/{ppage}int'], function($app, $args){
	return $app->controller('users@list', $args);
} , 'admin');


//search
$app->post('/users/search', function($app, $args){
	return $app->controller('users@search', $args);
} , 'admin', 200);



//create form
$app->get('/users/add', function($app, $args){
	$args->type = 'add';
	return $app->view('user/form', ['type' => $args->type ]);
} , 'admin');


//create
$app->post('/users/add', function($app, $args){
	return $app->controller('users@create', $args);
} , 'admin');



//update update form - {attr} => name|email|type|pass
$app->get('/users/edit/{attr}str|minlen:4/{id}int|mincount:1', function($app, $args){
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
$app->router_group(['/users/{id}int', '/user/{id}int' ], function($app, $args){
	$user =  User::find('id', $args->id);
	unset($user->pass);
	return $app->view('adminlte/users/profile', ['user_item' =>  $user ]);
} , 'auth');


//delete
$app->post('/users/del', function($app, $args){
	return $app->controller('users@delete', $args);
},'admin' );


//Img upload
$app->post('/users/img', function($app, $args){
	$user = User::find('id', $app->request->data['id']);
	$app->middleware_obj = $user;
	if($app->middlewares('is_self, admin')) {
		return $app->controller('users@img_upload', $args);
	}
	return  $app->controller('users@denied', $args);
},'auth' );