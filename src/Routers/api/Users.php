<?php

use App\Models\User;

//login
$app->post('/login', function($app,$args){
	return $app->controller('Auth@login', $args);
});


//social/login
$app->post('/social/login', function($app,$args){
	return $app->controller('Auth@social_login', $args);
});

//user
$app->post('/user', function($app, $args){
	return $app->json([ 'user' => $app->user() ] );
} );


//list
$app->get('/users', function($app, $args){
	return $app->redirect('/users/1/12');
} , 'admin');

$app->get('/users/{page}int/{ppage}int', function($app, $args){
	return $app->controller('users@list', $args);
} , 'admin');

//create
$app->post('/users/add', function($app, $args){
	return $app->controller('users@create', $args);
} , 'admin');



//update
/*
$app->post('/users/edit', function($app, $args){
	return $app->controller('users@update', $args);
} , 'auth');
*/


//Users Update form
$app->post('/{us}/edit', function($app, $args){
    $app->middleware_obj = $app->request->data;

    if( in_array($args->us , [ 'user','users' ]) && $app->middlewares('admin, is_self') ){
        return $app->controller('users@update', $args);
    }
    else{
        return $app->json([],401);
    }

}, 'auth' );



//get profile
$app->get('/users/{id}int', function($app, $args){
	$user =  User::find('id', $args->id);
	unset($user->pass);
	return $app->json( ['user' =>  $user ]);
} , 'auth,admin');



//delete
$app->post('/users/del', function($app, $args){
	return $app->controller('users@delete', $args);
},'admin' );


//Img upload
$app->post('/users/img', function($app, $args){
	$user = User::find('id', $app->request->data['id']);
	$app->middleware_obj = $user;
	if($app->middlewares('is_self,admin')) {
		return $app->controller('users@img_upload', $args);
	}
	return  $app->json([],401);
},'auth' );
