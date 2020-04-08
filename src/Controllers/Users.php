<?php 
namespace App\Controllers;
use App\Controller\Controller;
use App\App;
use App\Models\User;
use App\Auth\Auth;


/**
 * Users Controller Class
 */
class Users extends Controller
{	


	public function index(App $app,$args=null){
		return $this->list($app,$args);
	}


	public function list(App $app,$args=null, $search=null){

		$response = User::all([isset($args->page)? $args->page : 1 , 
				isset($args->ppage) ? $args->ppage : 10, $search] );	

		if ($response){

			foreach($response['data'] as $user ){
				unset($user->pass);
			}

			$data = array (
					 'title' => 'Users',
					 'galery' => 'users',
					 'users' =>  $response['data'] ,
					 'count' => $response['count'],
					 'page' => $response['page'],
					 'pages' => $response['pages'],
					 'icon' => 'fa fa-users'
					);

			}


		return $app->mode_trigger( 
		function ($app, $args,$data) {
			return $app->view('adminlte/users/list', $data);
		},function($app, $args, $data){
			return $app->json($data);
		}, $data);

	}


	public function search(App $app,$args=null){
		$search = ['first_name','last_name','username','id', 'email',strtolower($app->request->data['search']) ];
		return $this->list($app, $args, $search); 
	}




	public function create(App $app,$args=null){
		$app->request->data['username'] =  preg_match('/^(@[0-9a-zA-Z_-]{0,})$/' , $app->request->data['username']  ) ? $app->request->data['username'] : '@'.$app->request->data['username'];
		$user = new User($app->request->data);
		$response = $user->create();
		$response->user = User::find('username',$app->request->data['username']);		
		

		return $app->mode_trigger( 
		function ($app, $args,$response) {
			
			if($response->status){
				return $app->redirect("/users/".$response->user->id );
			}else{
				return $app->redirect("/users/add", "GET", ['input' => $response->data, 'errors' => $response->errors ]);
			}

		},function($app, $args, $response){
			return $app->json($response);
		}, $response);
		
	}





	public function update(App $app,$args=null){

		$user = new User( (array) User::find('id', $app->request->data['id'])   );

		foreach( (array) $user as $key => $value ){
			unset($user->$key);
		}
	
		foreach ($app->request->data as $key => $value) {
			$user->$key = $value;
		}

		$response = $user->update();
		$app->response->set_log($response);
	
		return $app->mode_trigger( 
		function ($app, $args,$response) {
			
			if($response->status){
				return $app->redirect( $app->request->data['redirect_url'] );
			}else{
				return $app->redirect("/users/edit/".$app->request->data["type_form"]."/".$app->request->data["id"] , 'GET', 
				['input' => $response->data, 'errors' => $response->errors ] );
			}

		},function($app, $args, $response){
			return $app->json($response);
		}, $response);


	}


	public function delete(App $app,$args=null){
		$user = User::find('id', $app->request->data['id']);
		$response = $user->delete();
		$app->response->set_log($response);
	
		return $app->mode_trigger( 
		function ($app,$args,$response) {
			return $app->redirect( isset($app->request->data['redirect_url'])  ? $app->request->data['redirect_url'] : '/users' );
		},
		function($app,$args,$response){
			return $app->json($response);
		}, $response);
	}



	public function img_upload($app, $args=null){

		$filename = "../assets/public/img/users/user-".$app->request->data['id'].date("YmdHis").".".explode('.', $app->request->files['file']['name'])[1] ;
		$app = $app->upload($filename); $response = null;
		
		if( file_exists($filename) ){
			$user = User::find('id', $app->request->data['id']);
				
			if( !strpos('/img/default/', $filename) ){
				@unlink(explode( '/img/', $filename )[0].$user->img );
			}

			$user = new User( [
				'id' => $user->id,
				'img' => "/img/".explode( '/img/', $filename )[1]
			]);

			$response = $user->update();
			
			$app->response->set_log($response);
		}


		return $app->mode_trigger( 
		function ($app,$args,$response) {
			return $app->redirect( isset($app->request->data['redirect_url'])  ? $app->request->data['redirect_url'] : '/users/'.$app->request->data['id']);
		},function($app,$args,$response){
			return $app->json($response);
		}, $response);

	}

	





}


