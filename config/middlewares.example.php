<?php
use App\App;

/* Middlewares 

    ex: 
   
 $this->middlewares = (object) [   

    'name' => function(App $app, object $middleware_obj){
        return true;
    },

    ...
 ];

*/

$this->middlewares = (object) [

    //debug
    'debug' => function (App $app){
        return $app->config->debug;
    }, 

    //guest
    'guest' => function(App $app){
        return !$app->user() ? true : false;
    },

    //admin
    'admin' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 1 ) ) ;
    },


    //manager
    'manager' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 2) ) ;
    },

    //user
    'user' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 3) ) ;
    },


    //auth
    'auth' => function(App $app){
        return $app->user() ? true : false;
    },
    

    
    /*
    //is Self
    'is_self' => function(App $app, object $obj){
        if( isset($obj)){
            return $app->user()->id == $obj->id ? true : false;
        }
        return false;
    },
    */


     
    
    

];

