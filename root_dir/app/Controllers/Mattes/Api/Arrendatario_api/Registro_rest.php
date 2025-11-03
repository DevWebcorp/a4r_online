<?php 

namespace App\Controllers\Mattes\Api\Arrendatario_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');

class Registro_rest extends ResourceController 
{
    use ResponseTrait;
    
    public function index(){
        $model_gender = model('App\Models\Mattes\Arrendatario_Models\Model_catgender');
        $data['gender'] = $model_gender->get_gender();
        return $this->respond($data, 200);  
    }

    public function get_state() {
        $model_state = model('App\Models\Mattes\Arrendatario_Models\Model_catstate');
        $data['state'] = $model_state->get_state();
        return $this->respond($data, 200);
    }

    public function insert_datos() {
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_tenant = model('App\Models\Mattes\Back_office_models\Model_tenant_admin');
            $registro1 = count($model_identity_student->where('id_user',$session->get('unique'))->find());
            $path = 'uploads/Mattes/Arrendatario';
            $path_absolute = "writable/uploads/Mattes/Arrendatario/";
            $request_form = \Config\Services::request();

            $file = $this->request->getFile('file');

            if($registro1 > 0) {
                $id_datos = $model_identity_student->get_id($session->get('unique'));

                if(!$file->isValid()){
                    $file_user = $id_datos->photo;
                   
                } else{
                    if($id_datos->photo == ""){
                        $newName = $file->getRandomName();
                        $file->move(WRITEPATH.$path, $newName);
                        $file_user = $file->getName();
                    } else {
                        $filename = $path_absolute.$id_datos->photo;
                        unlink($filename);
                        $newName = $file->getRandomName();
                        $file->move(WRITEPATH.$path, $newName);
                        $file_user = $file->getName(); 
                    }
                }

                $data = [
                    'id_user' => $user_id,
                    'name' => $request_form->getPost('nombre'),
                    'first_name' => $request_form->getPost('primer_apellido'),
                    'second_name' => $request_form->getPost('segundo_apellido'),
                    'phone' => $request_form->getPost('num_cel'),
                    'date_of_Birth' => $request_form->getPost('f_nacimiento'),
                    'id_gender' => $request_form->getPost('sexo'),
                    'description' =>$request_form->getPost('describete'),
                    'photo' => $file_user,
                    'status' => 302,
                    'verify' => 0,
                    'prefix' => $request_form->getPost('prefix'),
    
                ];

                $data_admin = [
                    'id_user' => $user_id,
                    'id_status' => 302
                ];
                
                $respuesta = $model_identity_student->update($id_datos->id,$data);
                $model_tenant->insert($data_admin);

                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'ACTUALIZADO CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);   
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                      ];
                    return $this->respondCreated($response);    
    
                }
            } else {
                if(!$file->isValid()) {
                    $file_user = "";
                } else {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH.$path, $newName);
                    $file_user =$file->getName();
                }


                $required_fields = [
                    'nombre_e', 'prim_apellido', 'seg_apellido', 'num_cel', 'nacimiento', 
                    'sexo',  'prefix'
                ];
        
               
                foreach ($required_fields as $field) {
                    if (empty($request_form->getPost($field))) {
                        return $this->sendResponse(400, "El campo '$field' es obligatorio y no puede estar vacío.");
                    }
                }
        
                $data = [
                    'id_user' => $user_id,
                    'name' => $request_form->getPost('nombre_e'),
                    'first_name' => $request_form->getPost('prim_apellido'),
                    'second_name' => $request_form->getPost('seg_apellido'),
                    'phone' => $request_form->getPost('num_cel'),
                    'date_of_Birth' => $request_form->getPost('nacimiento'),
                    'id_gender' => $request_form->getPost('sexo'),
                    'description' =>$request_form->getPost('describete'),
                    'photo' => $file_user,
                    'status' => 300,
                    'prefix' => $request_form->getPost('prefix'),
    
                ];
    
                $respuesta = $model_identity_student->insert($data);
                //$model_tenant->insert($data_admin);
    
                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'AGREGADO CON EXITO'
                        ]
                    ];
                    return $this->respondCreated($response);
                   
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                    ];
                    return $this->respondCreated($response);    
                }
            }
        }
    }

    private function sendResponse($status, $message) {
        return $this->respondCreated([
            'status' => $status,
            'error' => null,
            'messages' => [
                'success' => $message
            ]
        ]);
    }

    public function insert_datos_student() {
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $user_id = $session->get('unique');
            $model_studentdata = model('App\Models\Mattes\Arrendatario_Models\Model_studentdata');
            $model_tenant = model('App\Models\Mattes\Back_office_models\Model_tenant_admin');
            $registro2 = count($model_studentdata->where('id_user',$session->get('unique'))->find());
            $path = 'uploads/Mattes/Arrendatario';
            $path_absolute = "writable/uploads/Mattes/Arrendatario/";
            $request_form = \Config\Services::request();

            //var_dump($request_form);

            //$carta =  $this->request->getFile('file_carta');
            //$identificacion = $this->request->getFile('file_INE');

            if($registro2 > 0){
                $id_datos = $model_studentdata->get_id($session->get('unique'));

                /* if(!$carta->isValid()){
                    $carta_user = $id_datos->university_file;
                } else {
                    if($id_datos->university_file == ""){
                        $newName = $carta->getRandomName();
                        $carta->move(WRITEPATH.$path, $newName);
                        $carta_user = $carta->getName(); 
                    } else {
                        $filename = $path_absolute.$id_datos->university_file;
                        unlink($filename);
                        $newName = $carta->getRandomName();
                        $carta->move(WRITEPATH.$path, $newName);
                        $carta_user = $carta->getName(); 
                    }
                    
                }

                if(!$identificacion->isValid()){
                    $identificacion_user = $id_datos->ine;
                } else {
                    if($id_datos->ine == ""){
                        $newName = $identificacion->getRandomName();
                        $identificacion->move(WRITEPATH.$path, $newName);
                        $identificacion_user = $identificacion->getName();
                    } else {
                        $filename = $path_absolute.$id_datos->ine;
                        unlink($filename);
                        $newName = $identificacion->getRandomName();
                        $identificacion->move(WRITEPATH.$path, $newName);
                        $identificacion_user = $identificacion->getName(); 
                    }
                    
                } */

                if($request_form->getPost('estado') == ""){
                    $estado = 0;
                } else {
                    $estado = $request_form->getPost('estado');
                }

                $data = [
                    'id_user' => $user_id,
                    'university_id' => $request_form->getPost('id_univ'),
                    'college_career' => $request_form->getPost('carrera'),
                    'id_state' => $estado,
                    //'university_file' => $carta_user,
                    //'ine' => $identificacion_user
                ];

                $data_admin = [
                    'id_user' => $user_id,
                    'id_status' => 302
                ];

                $respuesta = $model_studentdata->update($id_datos->id,$data);
                $model_tenant->insert($data_admin);

                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'ACTUALIZADO CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);   
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                      ];
                    return $this->respondCreated($response);    
    
                }
                

               

            } else {
                /* if(!$carta->isValid()) {
                    $carta_user = "";
                } else {
                    $newName = $carta->getRandomName();
                    $carta->move(WRITEPATH.$path, $newName);
                    $carta_user = $carta->getName();
                }

                if(!$identificacion->isValid()){
                    $identificacion_user = "";
                } else {
                    $newName = $identificacion->getRandomName();
                    $identificacion->move(WRITEPATH.$path, $newName);
                    $identificacion_user = $identificacion->getName();
                } */

                if($request_form->getPost('estado') == ""){
                    $estado = 0;
                } else {
                    $estado = $request_form->getPost('estado');
                }

                

                $data = [
                    'id_user' => $user_id,
                    'university_id' => $request_form->getPost('id_univ'),
                    'college_career' =>$request_form->getPost('nombre_career'),
                    'id_state' => $estado,
                    //'university_file' => $carta_user,
                    //'ine' => $identificacion_user

                ];


                $data_admin = [
                    'id_user' => $user_id,
                    'id_status' => 300
                ];

                $respuesta = $model_studentdata->insert($data);
                $model_tenant->insert($data_admin);
    
                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'AGREGADO CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                      ];
                    return $this->respondCreated($response);    
    
                }
            } 
            
        }
        

    }

    public function get_alumno() {
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
            $data = $model->total($session->get('unique'));
            return $this->respond($data, 200);    
        }
    }

    public function get_documentos() {
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $model = model('App\Models\Mattes\Arrendatario_Models/Model_studentdata');
            $data = $model->total($session->get('unique'));
            return $this->respond($data, 200);    
        }
    }

    public function datos_notificaciones(){
        $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
            $total =  count($model->get_notificaciones($session->get('unique')));

            if($total > 0){
                $id_notificacion = $model->get_id($session->get('unique'));
                $noti_correo = $request->getPost('notis_correo');
                $noti_correo = isset($noti_correo)  ? 1  : 0;
                $noti_citas = $request->getPost('nuevas_citas');
                $noti_citas = isset($noti_citas)  ? 1  : 0;
                $avisos = $request->getPost('avisos');
                $avisos = isset($avisos)  ? 1  : 0;
                $mensajes = $request->getPost('mensajes');
                $mensajes = isset($mensajes)  ? 1  : 0;
                $promos = $request->getPost('promos');
                $promos = isset($promos)  ? 1  : 0;
    
               $data = [
                    'id_user' => $session->get('unique'),
                    'email' => $noti_correo,
                    'appointment' =>$noti_citas,
                    'notices' =>$avisos,
                    'message' =>$mensajes,
                    'promotions' =>$promos,
                   
                ];
    
                 $respuesta = $model->update($id_notificacion->id,$data);
                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS ACTUALIZADOS CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);   
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                      ];
                    return $this->respondCreated($response);    
    
                } 

            }else{
                $noti_correo = $request->getPost('notis_correo');
                $noti_correo = isset($noti_correo)  ? 1  : 0;
                $noti_citas = $request->getPost('nuevas_citas');
                $noti_citas = isset($noti_citas)  ? 1  : 0;
                $avisos = $request->getPost('avisos');
                $avisos = isset($avisos)  ? 1  : 0;
                $mensajes = $request->getPost('mensajes');
                $mensajes = isset($mensajes)  ? 1  : 0;
                $promos = $request->getPost('promos');
                $promos = isset($promos)  ? 1  : 0;
    
               $data = [
                    'id_user' => $session->get('unique'),
                    'email' => $noti_correo,
                    'appointment' =>$noti_citas,
                    'notices' =>$avisos,
                    'message' =>$mensajes,
                    'promotions' =>$promos,
                   
                ];
    
                 $respuesta = $model->insert($data);
                if($respuesta !=null){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS GUARDADOS CON EXITO'
                        ]
                      ];
                    return $this->respondCreated($response);   
    
                }else{
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                      ];
                    return $this->respondCreated($response);    
    
                } 

            }
            
           
        }
    }
}