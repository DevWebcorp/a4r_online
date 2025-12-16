<?php

namespace App\Controllers\a4r;
use App\Models\Model_login;

use App\Controllers\BaseController;

class Login extends BaseController{ 

  public function index()  {
    $session = session();
    if ($session->has('token')) {
      return redirect()->to(base_url() . '/inicio/index');
    } else {
      $data_header['title'] = "A4r Login";
      $data_header['description'] = "Login del usuario";
	  echo view('layout/head', $data_header);
      echo view('a4r/Login');
    }
  }

  public function verify_login() {
		$email=$_POST['email'];
		$password=$_POST['password'];
		$user = array();
		$passwordMinLenght = 8;
		$active = true;
		switch(true){
			case( $_POST['email'] == "" or $_POST['password'] == "" ):
					$error = "Todos los campos son obligatorios.";
				break;
			case( strlen($_POST['password']) < $passwordMinLenght):
					$error = "Usuario o contraseña incorrecta.";
				break;
			case( ! filter_var($email, FILTER_VALIDATE_EMAIL) ):
					$error = "Usuario o contraseña incorrecta.";
				break;
			case( ! $this->user_exist($email , $user) ):
					$error = "Usuario o contraseña incorrecta.";
				break;
			case( ! password_verify($password ,  $user[0]->password )):
					$error = "Usuario o contraseña incorrecta.";
				break;
			/*case( $user[0]->active == 0 ):
					$active = false;
					$error = "Para poder iniciar sesión tienes que confirmar tu correo. Por favor verifica tu correo y da clic en el enlace que te hemos enviado.";
				break;*/

			case($user[0]->active == 2):
				$active = false;
				$error = "Su cuenta esta suspendida comuniquese con mattes.";
			break;
			default:
				break;
		}
		$data['stage'] = $_SERVER['CI_ENVIRONMENT'];
		if(isset($error) && !$active ){ // Cuenta inactiva
			$data_header['title'] = "A4r";
			$data_header['error_warning'] = $error;

			$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css"];

			$data_fotter['scripts'] = [
			  "dashboard.js",
			  "../lib/jquery/jquery.js",
			  "../lib/jquery-ui/jquery-ui.js",
			  "Mattes/Principal.js"
			];    
    		$data_header['description'] = "Login del usuario";

			echo view('header', $data_header);

			echo view('Mattes/Menu_principal');
			echo view('Login/Login' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}else if(isset($error)){ // Error de autenticacion
			$data_header['title'] = "A4r";
			$data['error'] = $error;

			$data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css"];

			$data_fotter['scripts'] = [
			  "dashboard.js",
			  "../lib/jquery/jquery.js",
			  "../lib/jquery-ui/jquery-ui.js",
			  "Mattes/Principal.js"
			];    

    		$data_header['description'] = "Login del usuario error de autenticacion";

			echo view('header', $data_header);
			echo view('Mattes/Menu_principal');
			echo view('Login/Login' ,  $data);
			echo view('Mattes/Footer');
			echo view('fotter_panel', $data_fotter);
		}else{ //Datos correctos
			$session = session();
			
			$newdata = [
				'unique'    => $user[0]->id,
				'username'  => $user[0]->user_name,
				'email'     => $user[0]->email,
				'token'		=> $user[0]->activation_token,
				'utype'		=> $user[0]->id_group,
				'logged_in' => TRUE
			];
			$session->set($newdata);
			$user_id = $session->get('unique');
			$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
			$fecha=  date("Y-m-d H:i:s");
			$data_up = [
				'c_date' => $fecha
			];
			$model_users->update($user_id, $data_up);
			//return redirect()->to(base_url().'/inicio'); 
			return redirect()->to(base_url().'/a4r/Login'); 
		}
	}

	public function sign_out() {
		$session = session();
		$session->destroy();
	/* 	$model_sesssion_events = model('App\Models\Astsuite\supervisor\Session_events');
		$session = session();
		$data = [
			'id_astsuite_cat_session_event' => 2,
			'id_user' => $session->get('unique')
		];
		$result = $model_sesssion_events->insert($data); */
		return redirect()->to(base_url().'/a4r/Login');
	}

	/* 
	* Funcion para saber si un usuario ya esta registrado a traves de su correo
	* @param string email
	* @return boolean
	*/
	private function user_exist($email , &$array ){
		$log = new Model_login();
		$array = $log->get_login($email);
		switch (true){
			case (count( $array ) <= 0):
				return false;
				break;
		}
		return true;
	}
}
