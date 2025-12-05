<?php 

namespace App\Controllers\Apis;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\a4r\Usuarios as UserModel;

class Login extends ResourceController 
{
    use ResponseTrait;
    var $model;
    var $db;

    public function __construct() { //Assign global variables
       	$this->model = new UserModel();
        $this->db = db_connect();
    }

	public function index(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (!$email || !$password) {
            return $this->fail('Email y contraseña son requeridos.', 400);
        }

        
        $user = $this->model->where('email', $email)->first();

        if (!$user) {
            return $this->respond([
            'status' => 400,
            'message' => 'Usuario no encontrado',
            
            ]);
        }

        if (!password_verify($password, $user['password'])) {
             return $this->respond([
            'status' => 400,
            'message' => 'Contraseña incorrecta',
            
            ]);
        }

        $session = session();

		$newdata = [
			'username'  => $user['user_name'],
			'token'		=> $user['activation_token'],
			'group'		=> $user['id_group'],
			'unique'    => $user['id'],
            'delegacion'    => $user['id_delegacion'],
			'logged_in' => TRUE
		];
		$session->set($newdata);

        $urls='Graficas';

        // $urls= array();
        // switch ($user['id_group']) {
        //     case '2':
        //         $urls='Graficas';
        //         break;
        //     case '12':
        //         $urls='Graficas';
        //         break;
        // }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Autenticación exitosa',
            'url'=>$urls,
            
        ]);
	}

}