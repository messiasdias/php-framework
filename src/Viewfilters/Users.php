<?php 
/*

    Example:
    //array
    $filters = [
        //optional '$arg' and 'use (&$app)'
        'function_name' => function ($arg) use (&$app) {
            echo $text;
        },
    ];


*/

$filters = [
    //name_encode
    'name_encode' => function ($name) {
        return str_replace( ['%20',' '],'-',strtolower($name)) ;
    }, 

    //is_self
    'is_self' => function (Object $user) use (&$app) {
        if( $app->user() && ( $user->id == $app->user()->id  ) ) { 
            return  true;
        }
        return false;
    },

    //user_rol_name
    'user_rol_name' => function (int $rol=null) use (&$app) {
    
        if( is_null($rol) && $app->user() ){
            $rol = $app->user()->rol;
        }

        switch ($rol) {
            case 1:
                return 'admin';
            break;

            case 2:
                return 'manager';
            break;

            case 3:
                return 'user';
            break;
            
            default:
              return 'guest';
            break;
        }

    },

 ];

