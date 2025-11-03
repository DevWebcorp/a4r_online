<?php 

namespace App\Controllers\Mattes\Api\Agente_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');


class Datos_agente extends ResourceController
{
    use ResponseTrait;

    public function index(){
            $request = \Config\Services::request();
            $token = $request->getPost('token');
            $user_model = model('App\Models\Mattes\Agente_Models\Datos_agente');
            //$model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $data = $user_model->get_agente($token);
            return $this->respond($data, 200); 

        
       
    }

    public function update_agente(){
            $user_model = model('App\Models\Mattes\Agente_Models\Datos_agente');
            $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $request = \Config\Services::request();
            $file = $this->request->getFile('file_agente');
            $path = 'uploads/Mattes/Agente';
            $path_absolute = "../../mattes/writable/uploads/Mattes/Agente/";   
            
            if(!$file->isValid()){
                $photo = $request->getPost('name_img');
               
               
            } else{
                $filename = $path_absolute.$request->getPost('name_img');
                unlink($filename);
                $newName = $file->getRandomName();
                $file->move(WRITEPATH.$path, $newName);
                $photo = $file->getName(); 
            }
    
            $password = $request->getPost('password');
            $password =  password_hash($password,PASSWORD_DEFAULT);
            $token = $request->getPost('correo_agente');
            $token =  password_hash($token,PASSWORD_DEFAULT);
    
            $user = [
                "activation_token" => $token,
                "password" => $password,
                "activation_token" => $token,
            ];
    
            $user_model->update($request->getPost('id_user'),$user);
    
            $owner = [
                'phone' => $request->getPost('telefono'),
                'photo' => $photo,               
                'name' => $request->getPost('nombre_agente'),
                'first_name' => $request->getPost('apellidof'),
                'second_name' => $request->getPost('apellidos')
            ];
           $dato_owner = $model_identity->update($request->getPost('id_identity'),$owner);
    
            $id_group = $user_model->select('id_group')->where('id',$request->getPost('id_user'))->first();
    
    
            $session = session();
                $newdata = [
                    'unique'    => $request->getPost('id_user'),
                    'email'     => $request->getPost('correo_agente'),
                    'token'		=> $token,
                    'utype'		=> $id_group['id_group'],
                    'logged_in' => TRUE
                ];
                $session->set($newdata);

             
                    $this->status($request->getPost('id_user'));
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS GUARDADOS CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);   

                

    }

    public function perfil_agente(){
        $acceso = Acceso();
        if($acceso){
            $model = model('App\Models\Mattes\Agente_Models\Datos_agente');
            $session = session();
            $id_agente = $session->get('unique');
            $data = $model->get_agente_data($id_agente);
            return $this->respond($data, 200);
        }

    }

    public function update_perfil(){
        $request = \Config\Services::request();
        $file = $this->request->getFile('file_agente');
        $path_absolute = "../../mattes/writable/uploads/Mattes/Agente/";   
        $user_model = model('App\Models\Mattes\Agente_Models\Datos_agente');
        $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
        $path = 'uploads/Mattes/Agente';

       if(!$file->isValid()){
            $photo = $request->getPost('name_img');
           
           
        } else{
            $filename = $path_absolute.$request->getPost('name_img');
            unlink($filename);
            $newName = $file->getRandomName();
            $file->move(WRITEPATH.$path, $newName);
            $photo = $file->getName(); 
        } 


        $password = $request->getPost('password');

        if($password == ""){
            $owner = [
                'phone' => $request->getPost('telefono'),
                'photo' => $photo,               
                'name' => $request->getPost('nombre_agente'),
                'first_name' => $request->getPost('apellidof'),
                'second_name' => $request->getPost('apellidos')
            ];

            $dato_owner = $model_identity->update($request->getPost('id_identity'),$owner);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS GUARDADOS CON EXITO'
                ]
              ];
            return $this->respondCreated($response);   
            
        }else{
            $password =  password_hash($password,PASSWORD_DEFAULT);

            $user = [
            
                "password" => $password,
            ];
            $user_model->update($request->getPost('id_user'),$user);

            $owner = [
                'phone' => $request->getPost('telefono'),
                'photo' => $photo,               
                'name' => $request->getPost('nombre_agente'),
                'first_name' => $request->getPost('apellidof'),
                'second_name' => $request->getPost('apellidos')
            ];

            $dato_owner = $model_identity->update($request->getPost('id_identity'),$owner);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS GUARDADOS CON EXITO'
                ]
              ];
            return $this->respondCreated($response);   
    

        }

    }

    public function status($id_user)
    {
        $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $model_status = model('App\Models\Mattes\Back_office/Back_Arrendador');

        $data = [
            'id_user' => $id_user,
            'id_status' => 100,
        ];

        $model_status->insert($data);
        $id_datos = $model->select('id')->where('id_user', $id_user)->first();

        $data_indentity = [
            'status' => 100,
        ];

        $model->update($id_datos['id'], $data_indentity);

        return true;
    }



}