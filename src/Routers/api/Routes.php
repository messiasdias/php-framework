<?php

use App\App;
use App\Models\Galeries;
use App\Models\Job;
use App\Models\Demo;

//User and Galery Update form
$app->post('/{us}/edit', function($app, $args){
    $app->middleware_obj = $app->request->data;

    if( in_array($args->us , [ 'user','users' ]) && $app->middlewares('admin, is_self') ){
        return $app->controller('users@update', $args);
    }
    else{
        return $app->json([],401);
    }

}, 'auth' );
