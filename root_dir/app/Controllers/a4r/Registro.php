<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Registro extends BaseController
{
  	public function index(){

		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/a4r/Login');
		}else{
			$data_header['title'] = "Registro general";
			$data_header['description'] = "Vista de registro general donde deciden si es propietario o cliente";
			echo view('layout/head', $data_header);
			echo view('a4r/Registro');	
		}
	}  


	public function register(){
		helper('sendmail');
		$url_confirmation = base_url()."/a4r/Registro/confirm_email/";
		$email = $_POST['email'];
		$password=$_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$password_hashed=password_hash($password,PASSWORD_DEFAULT);
		$id_group = $_POST['id_group'];
		if($id_group == "Usuario"){
			$id_group = 3;
		}else{
			$id_group = 4;
		}
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
				$error = "La contraseña debe tener al menos 8 caracteres,una letra mayúscula, una letra minúscula y un número";
				break;
			case( $this->user_exist($email) ):
				$error = "El correo ya se encuentra registrado. Si ha olvidado su contraseña, puede recuperarla en el siguiente enlace <a href=\"".base_url()."/register/password_recover\">Recuperar contraseña</a>";
				break;
			default:
				break;
		} 

		if(isset($error)){
			$data_header['error'] = $error ;
			$data_header['email'] = $email;

            $data_header['title'] = "Registro de usuario";
            $data_header['description'] = "Error de registro del usuario";
            echo view('layout/head', $data_header);
			echo view('a4r/Registro', $data_header);
		}else{
			date_default_timezone_set('America/Mexico_City');
			$datos = [
				"created_at"=>date("Y-m-d h:i:s"),
				"password" => $password_hashed,
				"email"=>$email,
				"activation_token"=> $activation_token,
				"id_group"=>$id_group,
				"active"=>0
			];

			$model_register=model('App\Models\Model_register\Register');
			$id = $model_register->insert_user($datos);
			if($id > 0){
				$model_users = model('App\Models\a4r\Datos_users');
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
				$subject = "Gracias por unirte a A4r";
				$activation_token = str_replace( '/' , '&&&' , $activation_token);
				$data['url'] = $url_confirmation.urlencode($activation_token);
				$message = view('Login/confirm_mail' , $data);
				$file_path = null;
				send_email($email,$subject,$message,$file_path);
				
				return redirect()->to(base_url().'/inicio'); 
				
			}else{
				$data['email'] = $email;
				$data['title'] = "A4r";
				$data['error'] = "Ha ocurrido un error inesperado, por favor intentelo de nuevo. Si el problema persiste, por favor envie un correo electrónico a A4r" ;
				//echo view('Login/sign_up' ,  $data);
				echo view('layout/head', $data);
				echo view('a4r/Registro',  $data);
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
			//$token = str_replace( '&' , '.' , $token);
			$affected_rows = $model_register->confirm_email($token);
			if($affected_rows > 0){
				$data_header['title'] = "A4r";
				$data_header['description'] = "A4r - confirmacion de correo";
				$data['success'] = "Tu correo ha sido confirmado, ahora puedes iniciar sesión en A4r. Muchas gracias por tu confianza.";
        echo view('layout/head', $data_header);			
				echo view('a4r/Login', $data_header);
			}else{
				$data_header['title'] = "A4r";
				$data_header['description'] = "A4r";

				echo view('layout/head', $data_header);			
				echo view('a4r/Login', $data_header);
			}
		}
	}

    /* 
	* Funcion para saber si un usuario ya esta registrado a traves de su correo
	* @param string email
	* @return boolean
	*/
	private function user_exist($email){
		$model_register = model('App\Models\Model_register\Register');
		return $model_register->user_exist($email) > 0 ? true : false;
	}

    /* 
	* Funcion para validar la estructura predeterminada de la contraseña
	* @param string password
	* @return boolean
	*/
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