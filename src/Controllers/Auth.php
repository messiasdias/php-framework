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
		//login
		return  $app->view(  $app->user() ? 'user/dashboard' : 'user/login' , ['user' => $app->user()] );
	}


	public function login(App $app, $args=null){
		
		$response = $app->auth()->login($app->request->data);
		$app->response->setLog($response);

		return $app->mode_trigger( 
			function ($app, $args,$response) {
				if($response->status){
					return $app->redirect_header('/admin');
				}else{
					return $app->redirect('/admin');
				}
			},function($app, $args, $response){
				return $app->json($response);
			}, $response);

	}


	public function logout(App $app, $args=null){
		$response = $app->auth()->logout();
		$app_callback = function ($app, $args,$response) {
			return $app->redirect_header('/admin');
		};
		$api_callback = function ($app, $args,$response) {
			return $app->json($response);
		};

		return $app->mode_trigger($app_callback,$api_callback,$response=null);
	}


}




