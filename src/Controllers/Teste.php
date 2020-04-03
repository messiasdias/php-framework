<?php
namespace App\Controllers;
use App\App;
use App\Controller\Controller;


/**
 * Teste Controller Class
 */

class Teste extends Controller
{	

	public function index($app, $args=null){
		//$args['name'] = str_replace( '%20', ' ', $args['name']);
		return $app->view('vue-template', $args);
	}


	public function upload($app, $args=null){
		$app = $app->upload();
		return $app->view('teste/upload');
	}


	public function download($app, $args=null){
		$app = $app->download( $app->request->data['path'].'/'.$app->request->data['name'] );
		return $app->redirect('/download');
	}


}