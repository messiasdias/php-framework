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
   'teste' => function() use (&$app) {
       var_dump($app->request->url);
        return "Teste ok!";
    },
]; 