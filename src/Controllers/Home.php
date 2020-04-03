<?php 
namespace App\Controllers;
use App\Controller\Controller;
use App\App;
/**
 * Home Controller Class
 */
class Home extends Controller
{	

	public function index($app, $args=null){
		return $app->view('welcome', $args);
	}


}


