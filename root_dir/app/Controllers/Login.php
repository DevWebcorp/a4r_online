<?php
namespace App\Controllers;
use App\Models\Model_login;
	
class Login extends BaseController
{
	public function verify_login()
	{
		// Obtener datos del request (JSON o POST)
		$request = $this->request;
		
		// Intentar obtener JSON primero, si no, obtener POST
		$input = $request->getJSON(true); // true convierte a array
		if (empty($input)) {
			$input = $request->getPost();
		}
		
		$email = $input['email'] ?? '';
		$password = $input['password'] ?? '';
		
		$user = array();
		$passwordMinLenght = 8;
		$active = true;
		$error = null;
		
		// Validaciones
		switch(true){
			case(empty($email) || empty($password)):
				$error = "Todos los campos son obligatorios.";
				break;
			case(strlen($password) < $passwordMinLenght):
				$error = "Usuario o contraseña incorrecta.";
				break;
			case(!filter_var($email, FILTER_VALIDATE_EMAIL)):
				$error = "Usuario o contraseña incorrecta.";
				break;
			case(!$this->user_exist($email, $user)):
				$error = "Usuario o contraseña incorrecta.";
				break;
			case(!password_verify($password, $user[0]->password)):
				$error = "Usuario o contraseña incorrecta.";
				break;
			case($user[0]->active == 0):
				$active = false;
				$error = "Para poder iniciar sesión tienes que confirmar tu correo. Por favor verifica tu correo y da clic en el enlace que te hemos enviado.";
				break;
			case($user[0]->active == 2):
				$active = false;
				$error = "Su cuenta está suspendida. Comuníquese con soporte.";
				break;
			default:
				break;
		}
		
		// Si hay error, retornar JSON
		if(isset($error) && $error !== null){
			return $this->response->setJSON([
				'success' => false,
				'message' => $error
			]);
		}
		
		// Datos correctos - crear sesión
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
		
		// Actualizar fecha de conexión
		$model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
		$fecha = date("Y-m-d H:i:s");
		$data_up = [
			'c_date' => $fecha
		];
		$model_users->update($user_id, $data_up);
		
		// Retornar JSON con éxito
		return $this->response->setJSON([
			'success' => true,
			'message' => '¡Bienvenido!',
			'redirect' => base_url('/inicio')
		]);
	}

	public function sign_out()
	{
		$session = session();
		$session->destroy();
	/* 	$model_sesssion_events = model('App\Models\Astsuite\supervisor\Session_events');
		$session = session();
		$data = [
			'id_astsuite_cat_session_event' => 2,
			'id_user' => $session->get('unique')
		];
		$result = $model_sesssion_events->insert($data); */
		return redirect()->to(base_url());
	}

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