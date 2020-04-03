<?php
/*
-->> Use Class Example
use App\NameSpace\Class;

//Setting First Route

$app->{method_name} ( {url_signature} , $callback = function($app,$args) {  
	
	$app->response->write("Home ok!");
	return $app; 

 } , { [$midlewares|null] });


--> method_name: [get|post|put|delete]
{En} Method name | {PT} Nome do método 

****************************************************************
--> url_signature: 
Exs:
 	--> /myurl/{param1}string|min:1|max:255/{param2}int|min:1
    --> /myurl/{col}str|min:2/{value}int|exists:users
    --> /myurl/test

Regexs: 
[[string|str] email| url | [int|integer] | float | boolean | [nonull|null] | [min:[0-9]|max:[0-9] ] | [exists|noexists:table_name[a-z] ] ]


******************************************************************************
--> $callback: 	

{En}
A callback function that receives the instance of App $ current app in the first parameter and an Object $ args, which are the arguments passed in the called URL if the middleware allows to continue.

{PT}
Uma função callback que recebe a instância de App $app corrente no primeiro paâmetro e um Object $args, que são os argumentos passados na URL chamada se o middleware permitir continuar.


********************************************************************************
--> $midlewares:

{En}
Where it defines which user groups have access to the route in question.
{PT}
Onde define quais os grupos de usuários que tem acesso a rota em questão. 


*********************************************************************************
--> return:
{En} Return $app at the end of code 
{PT} Retorne $app ao fim do Código


*/

//Set Home Route
/*
$app->router_group(['/', '/home'], function($app,$args) {  
	return $app->view('home');
 } ); */


 //admin painel
$app->router_group([ '/', '/home', 'api'], function($app,$args) {  
	return $app->json([ 'data' => 'Teste Home Page api OK!']);
 } );


