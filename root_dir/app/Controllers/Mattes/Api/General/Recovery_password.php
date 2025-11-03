<?php

namespace App\Controllers\Mattes\Api\General;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;



class Recovery_password extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $token = $_POST['token'];
        $token = urldecode($token);
        $token = str_replace('&&&', '/', $token);
        $data_user = $model_users->token_id($token);

        if(!empty($data_user)){
            $password = $_POST["password"];
            $user_id = $data_user[0]->id;
            $password = password_hash($password,PASSWORD_DEFAULT);
			$token = password_hash($password, PASSWORD_DEFAULT);
			$user = [
				'activation_token' => $token,
				'password' => $password,
			];
			$model_users->update($user_id, $user);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CONTRASEÑA ACTUALIZADA'
                ]
            ];
            return $this->respondCreated($response);

        }else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'EL TOKEN EXPIRO INTENTA NUEVAMENTE'
                ]
            ];
            return $this->respondCreated($response);

        }
    }
}
