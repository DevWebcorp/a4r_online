<?php namespace App\Controllers;

class Registro_propietario extends BaseController
{
	public function index()
	{
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_header['title'] = "Registro propietario";
			$data_header['description'] = "Registro de los datos del propietario";
			$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

			$data_fotter['scripts'] = [
			  "dashboard.js",
			  "../lib/jquery/jquery.js",
			  "../lib/jquery-ui/jquery-ui.js",
			  "Mattes/Principal.js"
			];    
    		$data_header['description'] = "Login del usuario";

			echo view('header', $data_header);
			echo view('Mattes/Menu_principal');
			echo view('Login/Registro_propietario' ,  $data_header);
			echo view('Mattes/Footer');
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function register(){
		helper('sendmail');
		$url_confirmation = base_url()."/Registro_propietario/confirm_email/";
		//$username=$_POST['name'];
		$password=$_POST['password'];
		$email = $_POST['email'];
		//$tel = $_POST['tel'];
		$confirm_password = $_POST['confirm_password'];
		$password_hashed=password_hash($password,PASSWORD_DEFAULT);
		$id_group=3;
		$activation_token = password_hash($email,PASSWORD_DEFAULT);
		$search = ['/','.'];
		$remplace = ['&&&','z'];
		$activation_token = str_replace($search,$remplace, $activation_token);
		switch(true){
			case( $password != $confirm_password ):
				$error = "Las contraseñas no coinciden";
				break;
			case($_POST['email'] == "" or $_POST['password'] == "" or $_POST['confirm_password'] == "" ):
				$error = "Todos los campos con * son obligatorios.";
				break;
			case( !filter_var($email, FILTER_VALIDATE_EMAIL) ):
				$error = "Por favor ingrese un correo valido.";
				break;
			case( !$this->validate_password($password) ):
				$error = "La contraseña debe tener al menos 8 caracteres y al menos una letra mayúscula , una letra minúscula y un número";
				break;
			case( $this->user_exist($email) ):
				$error = "El e-mail ya se encuentra registrado. Si ha olvidado su contraseña, puede recuperala en el siguiente enlace <a href=\"".base_url()."/register/password_recover\">Recuperar contraseña</a>";
				break;
			default:
				break;
		}

		if(isset($error)){
			$data_header['error'] = $error ;
			//$data['username'] = $username;
			$data_header['email'] = $email;
			//$data['tel'] = $tel;
			$data_header['title'] = "Mattes";
			$data_header['description'] = "Login del usuario";
			//echo view('Login/sign_up' ,  $data);
			$data_header['title'] = "Registro propietario";
			$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
			$data_fotter['scripts'] = [
				"dashboard.js",
				"../lib/jquery/jquery.js",
				"../lib/jquery-ui/jquery-ui.js",
				"/Mattes/Principal.js"
			];  

			echo view('header', $data_header);
			echo view('Mattes/Menu_principal');
			echo view('Login/Registro_propietario' ,  $data_header);
			echo view('Mattes/Footer');
			echo view('fotter_panel' , $data_fotter); 
		}else{
			date_default_timezone_set('America/Mexico_City');
			$datos = [
				//"user_name" => $username,
				"created_at"=>date("Y-m-d h:i:s"),
				"password" => $password_hashed,
				"email"=>$email,
				"activation_token"=> $activation_token,
				"id_group"=>$id_group,
				"active"=>0
			];
			$model_register=model('App\Models\Model_register\Register');
			$id = $model_register->insert_user($datos);
			//$affected_rows = 1;
			if($id > 0){
				$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
				$user_id = $model_users->select('id')->where('email', $email)->first();
				$session = session();
				$newdata = [
					'unique'    => $user_id['id'],
					'email'     => $email,
					'token'		=> $activation_token,
					'utype'		=> $id_group,
					'logged_in' => TRUE
				];
				$session->set($newdata);

				$fecha=  date("Y-m-d H:i:s");
				$data_up = [
					'c_date' => $fecha
				];
				$model_users->update($id, $data_up);

				$subject = "Gracias por unirte a Mattes";
				$activation_token = str_replace( '/' , '&&&' , $activation_token);
				$data['url'] = $url_confirmation.urlencode($activation_token);
				$message = view('Login/confirm_mail' , $data);
				$file_path = null;
				send_email($email,$subject,$message,$file_path);

				return redirect()->to(base_url().'/inicio'); 
				/*$data_header['title'] = "Registro propietario";
				$data_header['description'] = "Mattes";
				$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
				$data_fotter['scripts'] = [
					"dashboard.js",
					"../lib/jquery/jquery.js",
					"../lib/jquery-ui/jquery-ui.js",
					"/Mattes/Principal.js"
				];  
				
				$data_header['success'] = "Tu usuario se ha creado con exito, se ha enviado un e-mail a ".$email." , por favor confirma tu e-mail para concluir el proceso.";
				$subject = "Gracias por unirte a Mattes";
				$activation_token = str_replace( '/' , '&&&' , $activation_token);
				//$data['user'] = $username;
				$data['url'] = $url_confirmation.urlencode($activation_token);
				$message = view('Login/confirm_mail' , $data);
				$file_path = null;
				send_email($email,$subject,$message,$file_path);

				//var_dump($active);

				echo view('header', $data_header);
				echo view('Mattes/Menu_principal');
				echo view('Login/Registro_propietario',  $data_header);
				echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter); */
				
			}else{
				//$data['username'] = $username;
				$data['email'] = $email;
				//$data['tel'] = $tel;
				$data['title'] = "Mattes";
				$data['description'] = "Mattes";
				$data['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];
				$data_fotter['scripts'] = [
					"dashboard.js",
					"../lib/jquery/jquery.js",
					"../lib/jquery-ui/jquery-ui.js",
					"/Mattes/Principal.js"
				];  
				$data['error'] = "Ha ocurrido un error inesperado, por favor intentelo de nuevo, si el problema persiste por favor envie un correo electronico a ma" ;
				//echo view('Login/sign_up' ,  $data);
				echo view('header', $data);
				echo view('Mattes/Menu_principal');
				echo view('Login/Registro_propietario' ,  $data);
				echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter);
			}
		}
	}

	public function confirm_email($token = ""){
		$model_register=model('App\Models\Model_register\Register');
		if(empty($token)){
			header("Location: ".base_url());
			exit();
		}else{
			
			$token = urldecode($token);
			//$token = str_replace( '&&&' , '/' , $token);
			$affected_rows = $model_register->confirm_email($token);
			if($affected_rows > 0){
				$data_header['title'] = "Mattes";
				$data_header['description'] = "Mattes";
				$data['success'] = "Tu correo ha sido confirmado, ahora puedes iniciar sesión en Mattes, muchas gracias por tu confianza.";

				$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

				$data_fotter['scripts'] = [
				"dashboard.js",
				"../lib/jquery/jquery.js",
				"../lib/jquery-ui/jquery-ui.js",
				"/Mattes/Principal.js"
				];    
				echo view('header', $data_header);
				echo view('Mattes/Menu_principal');
				echo view('Login/Login', $data_header);
				echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter); 
			}else{
				$data_header['title'] = "Mattes";
				$data_header['description'] = "Mattes";

				$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

				$data_fotter['scripts'] = [
				"dashboard.js",
				"../lib/jquery/jquery.js",
				"../lib/jquery-ui/jquery-ui.js",
				"/Mattes/Principal.js"
				];    
				echo view('header', $data_header);
				echo view('Mattes/Menu_principal');
				
				echo view('Login/Login', $data_header);
				echo view('Mattes/Footer');
				echo view('fotter_panel' , $data_fotter); 
				//echo view('Login/Signin_view' ,  $data);
			} 
		}
	}

	private function user_exist($email){
		$model_register=model('App\Models\Model_register\Register');
		return $model_register->user_exist($email) > 0 ? true : false;
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

	/* public function admin_paciente(){
		$data['title'] = "REGISTRO PROPIETARIO";
		echo view('Login/sign_up' ,  $data);
	} */
}