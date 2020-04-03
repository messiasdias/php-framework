<?php

//include App
require_once "../vendor/autoload.php";
use App\App;
use App\Tools\File;

/* 
Start App using the argument 'app' for site, 
and with argument 'api'for API
--------------------------------------
Iniciar App usando o argumento 'app', 
Para API, o argumento 'api'.
*/

//Start App
$app = new App([ 'mode' => 'app', 'debug' => true]);
$app->run();