<?php namespace App\Controllers;

class Register extends BaseController
{
	public function index()
	{
		//Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js", "Mattes/Password_update.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css"];

        //Vars

        //Database
        $entity=model('App\Models\Model_register\Register');
		$data['groups']=$entity->get_groups();
        $data_header['title'] = "Dashboard";
        $data_header['description'] = "Main Admin";
        $entity_model=model('App\Models\session\Group_modules',false);
        $data_left['menu']=$entity_model->find();
        echo view('header' , $data_header);
		echo view('left_panel',$data_left);
        echo view('head_panel');
		echo view('Register/Register_view',$data);
		echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);
	}


	public function insert_user(){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_hashed=password_hash($password,PASSWORD_DEFAULT);
		$about=$_POST['about'];
		$email=$_POST['email'];
		$id_group=$_POST['id_group'];
		date_default_timezone_set('America/Mexico_City');
		$datos = [
					"user_name" => $username,
					"c_date"=>date("Y-m-d h:i:s"),
					"password" => $password_hashed,
					"email"=>$email,
					"activation_token"=>"",
					"id_group"=>$id_group,
					"about" => $about,
					"active"=>0
				];
		$model_register=model('App\Models\Model_register\Register');
		$model_register->insert_user($datos);
		return redirect()->to(base_url().'/register');
	}

	public function password_recover(){
		$data_header['title'] = 'Recupera tu cuenta';
		$data_header['description'] = 'Correo en el cual se recuperara la contraseña';
		$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

		$data_fotter['scripts'] = [
		"dashboard.js",
		"../lib/jquery/jquery.js",
		"../lib/jquery-ui/jquery-ui.js",
		"/Mattes/Principal.js"
		];    
		
		echo view('header', $data_header);
		echo view('Mattes/Menu_principal');
		echo view('Login/password_recover', $data_header);
		echo view('Mattes/Footer');
		echo view('fotter_panel' , $data_fotter);
	}

	public function update_password(){
		$email = $_POST['email'];
		$url_confirmation = base_url().'/register/password_update/'; 
		$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
		$email_val = $model_users->validar_email($email);
		$val = $email_val[0]->validar;

		switch(true){
			case( !filter_var($email, FILTER_VALIDATE_EMAIL) ):
				$error = "Por favor ingrese un correo válido.";
			break;			
		}

		if($val > 0){
			if(isset($error)){ 
				//$data['title'] = "Mattes";
			 	$data_header['error'] = $error;
	
			 	$data_header['title'] = 'Recupera tu cuenta';	
				$data_header['description'] = 'Correo en el cual se recuperara la contraseña';
			 	$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
		
			 	$data_fotter['scripts'] = [
				 	"dashboard.js",
				 	"../lib/jquery/jquery.js",
				 	"../lib/jquery-ui/jquery-ui.js",
				 	"/Mattes/Principal.js"
			 	];    
					
				echo view('header', $data_header);
			 	echo view('Mattes/Menu_principal');
			 	echo view('Login/password_recover', $data_header);
			 	echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter);
		
				/* $data = [
			 		'status'   => 404,
			 		'error'     => 404,
			 		'msg' => $error
			 	];			
				return $this->response->$data; */
		
			}//End if
			else{
				$user_model = model('App\Models\Model_user\User');
			 	$data = $user_model->getToken($email);
			 	if(count($data) > 0){
				 	helper('sendmail');
					$subject = "Recuperación de contraseña";
			 		$activation_token = str_replace( '/' , '&&&' , $data[0]->activation_token);
			 		$data['url'] = $url_confirmation.urlencode($activation_token);
			 		$data['user'] = '';
			 		$message = view('Login/password_recover_mail' , $data);
				 	$file_path = null;
				 	send_email($email , $subject , $message , $file_path );
		
				 	$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
		
				 	$data_fotter['scripts'] = [
				 		"dashboard.js",
				 		"../lib/jquery/jquery.js",
				 		"../lib/jquery-ui/jquery-ui.js",
				 		"/Mattes/Principal.js"
				 	];    
					$data_header['title'] = "Reestablecer contraseña";
				 	$data_header['description'] = 'Correo en el cual se recuperara la contraseña';
				 	$data_header['success'] = "Se te ha enviado un correo electrónico con instrucciones para reestablecer tu contraseña.";
		
				 	echo view('header', $data_header);
				 	echo view('Mattes/Menu_principal');
				 	echo view('Login/password_recover', $data_header);
				 	echo view('Mattes/Footer');
				 	echo view('fotter_panel' , $data_fotter);
						
				}else{// end if
				 	$data_header['title'] = "Reestablecer contraseña";
					$data_header['description'] = 'Correo en el cual se recuperara la contraseña';
				 	$success = "Se ha enviado un correo electrónico con instrucciones para poder reestablecer tu contraseña.";
				 	$data_header['success'] = $success;
		
				 	$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
		
					$data_fotter['scripts'] = [
			 			"dashboard.js",
						"../lib/jquery/jquery.js",
				 		"../lib/jquery-ui/jquery-ui.js",
						"/Mattes/Principal.js"
					];    
				 	echo view('header', $data_header);
				 	echo view('Mattes/Menu_principal');
				 	echo view('Login/password_recover', $data_header);
				 	echo view('Mattes/Footer');
				 	echo view('fotter_panel' , $data_fotter);
		
				 	/* $data=[
				 		"status"=>200,
			 			"msg"=>$success					
				 	];	
				 	return $this->response->$data; */
				}//end else
			} 
		}else {
			$error = "Por favor ingrese un correo que haya sido registrado. Resgistrate <a href='../../Mattes/Principal'>AQUI<a>";
			$data_header['error'] = $error;
	
			 	$data_header['title'] = 'Recupera tu cuenta';	
				$data_header['description'] = 'Correo en el cual se recuperara la contraseña';
			 	$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
		
			 	$data_fotter['scripts'] = [
				 	"dashboard.js",
				 	"../lib/jquery/jquery.js",
				 	"../lib/jquery-ui/jquery-ui.js",
				 	"/Mattes/Principal.js"
			 	];    
					
			echo view('header', $data_header);
		 	echo view('Mattes/Menu_principal');
		 	echo view('Login/password_recover', $data_header);
		 	echo view('Mattes/Footer');
			echo view('fotter_panel' , $data_fotter);
		}
	} // end update password



	public function password_update($token){
		//echo $token;
		$data_fotter['scripts'] = ["Mattes/Password_update.js", "general/general.js"];
		$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

		if(empty($token)){
			header("Location: ".base_url());
			exit();
		}else{
			$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
			$token = str_replace( '&&&' , '/' , $token);
			$data['token'] = urlencode($token);
			$data_user = $model_users->user_exist_token($token);
			if( $data_user == "1") {
				$data_header['title'] = 'Actualizar contraseña.';
				$data_header['description'] = 'Actualizar contraseña.';
				$token_url = str_replace( '/' , '&&&' , $token);
				$data['token'] = urlencode($token_url);
				echo view('header', $data_header);
				echo view('Mattes/Menu_principal');
				echo view('Login/password_update' ,  $data);
				echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter); 
			} else {
				return redirect()->to(base_url().'/Mattes/Login'); 
			}

		}
	}

	public function save_password_updated($token = ''){
		$data['title'] = 'Actualizar contraseña.';
		$token_url = str_replace( '&&&', '/', $token);
		$data['token'] = urlencode($token_url);

		$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
		$data_user = $model_users->token_id($token_url);
		$user_id = $data_user[0]->id;

		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		switch(true){
			case( empty($token) ):
				$error = "Sin token";
				break;
			case( $password != $confirm_password ):
		 		$error = "Las contraseñas no coinciden";
			break;

			case( !$this->validate_password($password) ):
				$error = "La contraseña debe tener al menos 8 caracteres y al menos una letra mayuscula , una letra minuscula y un numero";
			break;
		}

		



		if(isset($error)){
			$data['error'] = $error;
			echo view('Login/password_update' ,  $data);
		}else{
			echo("no hay error");
			// $password = password_hash($password,PASSWORD_DEFAULT);
			// $token = password_hash($password, PASSWORD_DEFAULT);
			// $user = [
			// 	'activation_token' => $token,
			// 	'password' => $password,
			// ];
			// $model_users->update($user_id, $user);
			// $data['success'] = "Se ha restablecido la contraseña correctamente.";
			// //var_dump($user);
			// echo view('Login/password_update' ,  $data);
		} 
		//return redirect()->to(base_url().'/Mattes/Login'); 
	}

	private function validate_password($password){
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		//$specialChars = preg_match('@[^\w]@', $password);
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			return false;
		}else{
			return true;
		}
	}
}