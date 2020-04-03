<?php 
namespace App\Controllers;
use App\Controller\Controller;
use App\App;

/**
 * Auth Controller Class
 */
class Auth  extends Controller
{


	public function index(App $app, $args=null){
		//adminlte/login
		return  $app->view(  $app->user() ? 'adminlte/dashboard' : 'adminlte/login' , ['user' => $app->user()] );
	}


	public function login(App $app, $args=null){
		
		$response = $app->auth()->login($app->request->data);
		
		return $app->mode_trigger( 
			function ($app, $args,$response) {
			$app->response->set_log($response);
			$redirect_function = 'redirect';
			if($response->status){
				$redirect_function .= '_header';
			}
			return $app->$redirect_function('/admin');
		},function($app, $args, $response){
			return $app->json($response);
		}, $response);

	}


	public function logout(App $app, $args=null){
		$response = $app->auth()->logout();
		return $app->mode_trigger( 
			function ($app, $args,$response) {
			return $app->redirect_header('/admin');
		}, function ($app, $args,$response){
			return $app->json($response);
		}, $response);
	
	}


}




