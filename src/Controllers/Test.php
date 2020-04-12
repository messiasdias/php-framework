<?php 
namespace App\Controllers;
use App\Controller\Controller;
use App\App;
use App\Models\Test as TestModel;
/**
 * TestController Class
 */
class Test extends Controller
{	public $app;
	
	function __construct(App $app=null)
	{
		$this->app = $app;
	}


	public function index(App $app, $args=null){

		return $app->mode_trigger(
			//app
			function ($app, $args, $data) {
				return $app->view('layout/msg', $data);
			},
			//api
			function ($app, $args, $data) {
				return $app->json($data);
			},
			//$data
			['title' => 'Test', 'subtitle' => 'Teste View OK!'] 
		);

	}

	public function test(App $app, $args=null){
		return $app->json($args);
	}


}


