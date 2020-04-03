<?php

/*

    Example:

    $view->addFunction(
        new \Twig\TwigFunction('function_name', function ($arg) {
            return $arg;
        })
    ); 


*/


$view->addFunction(
    new \Twig\TwigFunction('teste', function (string $text) {
         echo $text;
    })
); 