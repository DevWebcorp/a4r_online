<?php 

namespace App\Controllers\Mattes\Api\Back_office_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('sendmail');

class Alumno_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
        $request = \Config\Services::request();
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw');//dibuja contador 
        $length = $request->getVar('length');//numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start');//Primer registro de paginacion
        $search =  $request->getVar('search')['value'];//valor de busqueda global
        $search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table =[
            0 => "arrendatario",
            1 => "universidad",
            2 => "career",
            3 => 'state',
            4 => 'fecha_registro',
            5 => 'phone',
            6 => 'email'        
        ];
       
        $query_result =  'SELECT users.id, email, users.created_at AS fecha_registro, (SELECT CONCAT(name, " ",first_name, " ", second_name) 
        from identitytenant WHERE id_user=users.id) AS arrendatario, (SELECT name FROM catuniversity JOIN studentdata 
        ON catuniversity.id = studentdata.university_id WHERE users.id = studentdata.id_user) AS universidad, (SELECT college_career FROM studentdata 
        WHERE users.id = studentdata.id_user) AS career, (SELECT phone FROM identitytenant WHERE id_user = users.id) AS phone, (SELECT state FROM catstate 
        JOIN studentdata ON catstate .id = studentdata.id_state WHERE users.id = studentdata.id_user) AS state FROM users  WHERE id_group = 4';

        $condicion = "";

        $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value'];
        $column4 =  $request->getVar('columns')[4]['search']['value'];
        $column5 =  $request->getVar('columns')[5]['search']['value']; 
        $column6 =  $request->getVar('columns')[6]['search']['value'];

      
       //Buscador por columnas
       if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3) or !empty($column4)
       or !empty($column5) or !empty($column6)){
           foreach ($map_table as $key => $val){
               if($key == 0){
                   $condicion .= " HAVING ".$val." LIKE '%".$column0."%'";
                } else {//OR name LIKE valor

                   
                   $condicion .= " AND " .$val. " LIKE '%".$request->getVar('columns')[$key]['search']['value']."%'";
               }
           }
       }

       //Buscador general 
        if(!empty($search)){
            foreach ($map_table as $key => $val){
                if($key == 0){
                   $condicion .= " HAVING ".$val." LIKE '%".$search."%'";
                } else {//OR name LIKE valor
                   /* if($map_table[$key] ==='fecha_alta' || 'fecha_actualizacion'){
                       $fecha = $request->getVar('columns')[$key]['search']['value'];
                       if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $fecha)) {
                           $date = str_replace('/', '-', $fecha);
                           $fecha2 = date("Y-m-d", strtotime($date));
                           $condicion .= " OR " .$val. " LIKE '%".$fecha2."%'";
                          
                        }else{
                           $condicion .= " OR " .$val. " LIKE '%".$fecha."%'";
                        }
                   }else{
                       $condicion .= " OR " .$val. " LIKE '%".$request->getVar('columns')[$key]['search']['value']."%'";

                   } */
                   $condicion .= " OR " .$val. " LIKE '%".$search."%'";
                }
           }
        } 

       $sql_data = $query_result.$condicion;
       $sql_count = $model_users->getBusqueda($sql_data);
       $sql_count = count($sql_count);
       $sql_data .=   " ORDER BY " .$map_table[$request->getVar('order')[0]['column']]."
                       ".$request->getVar('order')[0]['dir']."" . " LIMIT ".$start. "," .$length.""; 
       $data = $model_users->getBusqueda($sql_data);

       $response = [
           "draw" => $draw,
           "recordsTotal" => $sql_count ,
           "recordsFiltered" => $sql_count,
           "data" =>$data,
       ]; 

       return $this->respondCreated($response);    
    }

    public function get_personales(){
        $json = $this->request->getJSON();
        $id_usuario = $json->id_usuario;

        $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
        $model_student = model('App\Models\Mattes\Arrendatario_Models/Model_studentdata');
        $model_notis = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
        $data['identity'] = $model->total($id_usuario);
        $data['student'] = $model_student->total($id_usuario);
        $data['notis'] = $model_notis->get_notificaciones($id_usuario);

        return $this->respond($data, 200);   
    }

    public function update_datos(){
        $request = \Config\Services::request();
        $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
        $model_student = model('App\Models\Mattes\Arrendatario_Models/Model_studentdata');
        $model_tenant = model('App\Models\Mattes\Back_office_models\Model_tenant_admin');
        $path = 'uploads/Mattes/Arrendatario';
        $path_absolute = "writable/uploads/Mattes/Arrendatario/";

        $id_user =  $request->getPost('id_alumno');
        $nombre = $request->getPost('nombre');
        $ap_paterno = $request->getPost('primer_apellido');
        $ap_materno = $request->getPost('segundo_apellido');
        $telefono = $request->getPost('num_cel');
        $fecha_nac = $request->getPost('f_nacimiento');
        $genero = $request->getPost('sexo');
        $descrip = $request->getPost('describete');
        $photo = $request->getFile('file');
        
        $universidad = $request->getPost('id_univ');
        $career = $request->getPost('carrera');
        $estado = $request->getPost('estado');
        $carta = $request->getFile('file_carta');
        $ine = $request->getFile('file_INE');
        

        $data_id = $model->get_id($id_user);
        $data_st = $model_student->get_id($id_user);

        $id_identity = $data_id->id;
        
        if(!$photo->isValid()){
            $file_user = $data_id->photo;
           
        } else{
            if($data_id->photo == ""){
                $newName = $photo->getRandomName();
                $photo->move(WRITEPATH.$path, $newName);
                $file_user = $photo->getName(); 
            } else {
                $filename = $path_absolute.$data_id->photo;
                unlink($filename);
                $newName = $photo->getRandomName();
                $photo->move(WRITEPATH.$path, $newName);
                $file_user = $photo->getName(); 
            }
        }

        

        $data_identity = [
            'phone' => $telefono,
            'date_of_Birth' => $fecha_nac,
            'id_gender' => $genero,
            'description' => $descrip,
            'photo' => $file_user,
            'verify' => 0,
            'status' => 302,
            'prefix' => $request->getPost('prefix'),
        ]; 

        if($data_st == ""){
            if(!$carta->isValid()) {
                $carta_user = "";
            } else {
                $newName = $carta->getRandomName();
                $carta->move(WRITEPATH.$path, $newName);
                $carta_user = $carta->getName();
            }

            if(!$ine->isValid()){
                $identificacion_user = "";
            } else {
                $newName = $ine->getRandomName();
                $ine->move(WRITEPATH.$path, $newName);
                $identificacion_user = $ine->getName();
            } 

            $data_student = [
                'id_user' => $id_user,
                'university_id' => $universidad,
                'college_career' => $career,
                'id_state' => $estado,
                'university_file' => $carta_user,
                'ine' => $identificacion_user
            ];
            //var_dump($data_student);
    
            $respuesta = $model_student->insert($data_student);

        } else {
            $id_student = $data_st->id;
            if(!$carta->isValid()){
                $carta_user = $data_st->university_file;
            } else {
                if($data_st->university_file == ""){
                    $newName = $carta->getRandomName();
                    $carta->move(WRITEPATH.$path, $newName);
                    $carta_user = $carta->getName(); 
                } else {
                    $filename = $path_absolute.$data_st->university_file;
                    unlink($filename);
                    $newName = $carta->getRandomName();
                    $carta->move(WRITEPATH.$path, $newName);
                    $carta_user = $carta->getName(); 
                }
               
            }
    
            if(!$ine->isValid()){
                $identificacion_user = $data_st->ine;
            } else {
                $filename = $path_absolute.$data_st->ine;
                unlink($filename);
                $newName = $identificacion->getRandomName();
                $identificacion->move(WRITEPATH.$path, $newName);
                $identificacion_user = $identificacion->getName(); 
            }

            $data_student = [
                'university_id' => $universidad,
                'college_career' => $career,
                'id_state' => $estado,
                'university_file' => $carta_user,
                'ine' => $identificacion_user
            ];
    
            $respuesta = $model_student->update($id_student, $data_student);
        }

        $data_status = [
            'id_user' => $id_user,
            'id_status' => 302
        ];

        $respuesta = $model->update($id_identity, $data_identity);
        $model_tenant->insert($data_status);

        

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

    }

    public function update_notis(){
        $request = \Config\Services::request();
        $model = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
        $id_user = $request->getPost('id_user');
        $data_notificacion = $model->get_id($id_user);
        if(isset($data_notificacion)){
            $id_notificacion = $data_notificacion->id;
            
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
                'email' => $noti_correo,
                'appointment' =>$noti_citas,
                'notices' =>$avisos,
                'message' =>$mensajes,
                'promotions' =>$promos
            ];

            $respuesta = $model->update($id_notificacion, $data);

            if($respuesta !=null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ACTUALIZADO CON EXITO'
                    ]
                ] ;   

            } else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                    ]
                ];
            }
            
        } else {
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
                'id_user' => $id_user,
                'email' => $noti_correo,
                'appointment' =>$noti_citas,
                'notices' =>$avisos,
                'message' =>$mensajes,
                'promotions' =>$promos
            ];

            $respuesta = $model->insert($data);

            if($respuesta !=null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ACTUALIZADO CON EXITO'
                    ]
                ] ;   

            } else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                    ]
                ];
            }
        }

        return $this->respondCreated($response);
    }

    public function insert_status(){
        $request = \Config\Services::request();
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
        $model_tenant = model('App\Models\Mattes\Back_office_models\Model_tenant_admin');
        $id_user = $request->getPost('id_userstatus');
        $data_id = $model->get_id($id_user);
        $id = $data_id->id;

        $nombre = $model->get_name($id_user);
        $correo_prop = $model_users->get_email($id_user);

        $user_activo = $request->getPost('user-activo');
        $user_activo = isset($user_activo)  ? 1  : 0;

        $user_verificado = $request->getPost('user-verificado');
        $user_verificado = isset($user_verificado)  ? 1  : 0;

        //var_dump($correo_prop);

        if($user_activo == 1){
            if($user_verificado == 1){
                $data = [
                    'id_user' => $id_user,
                    'id_status' => 301
                ];
    
                $data_status = [
                    'verify' => 1,
                    'status' => 301
                ];

                $correo = $correo_prop[0]['email'];
                $asunto = "USUARIO VERIFICADO";
                $datos['usuario'] = $nombre[0]['name'];
                $datos['texto'] = " su usuario ha sido verificado, ya puede agendar una cita o rentar una propiedad de su agrado.";
                //$datos['url'] = "/Mattes/Arrendatario/Index";
                $mensaje = view('Mattes/Back_office_view/Correo_verificado', $datos);
                $file = null;
                send_email($correo, $asunto, $mensaje, $file); 

            } else {
                $data = [
                    'id_user' => $id_user,
                    'id_status' => 300
                ];
    
                $data_status = [
                    'verify' => 0,
                    'status' => 300
                ];
            }

            $data_user = [
                'active' => 1
            ];
            //var_dump($data_status);

            $model_tenant->insert($data);
            $model->update($id, $data_status);
            $respuesta = $model_users->update($id_user, $data_user); 
            
        } else {
            $data_user = [
                'active' => 2
            ];

            $data_status = [
                'verify' => 0,
                'status' => 300
            ];

            $model_users->update($id_user, $data_user);
            $respuesta = $model->update($id, $data_status);
            
        }

       //var_dump($id);

        if($respuesta !=null){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'ACTUALIZADO CON EXITO'
                ]
            ] ;   

        } else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                ]
            ];
        }

        return $this->respondCreated($response);
    }

    public function inicio_alumnos(){
        $request = \Config\Services::request();
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw');//dibuja contador 
        $length = $request->getVar('length');//numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start');//Primer registro de paginacion
        $search =  $request->getVar('search')['value'];//valor de busqueda global
        //$search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table = [
            0 => 'nombre',
            1 => 'email',
            2 => 'fecha',
            3 => 'abbreviation',
            4 => 'priority',
            5 => 'active'       
        ];
       
        $query_result =  'SELECT users.id, users.active, users.email, (SELECT CONCAT(name, " ",first_name, " ", second_name) FROM identitytenant where users.id = identitytenant.id_user 
        lIMIT 1) AS nombre, (SELECT tenant_admin.created_at FROM tenant_admin where tenant_admin.id_user = users.id  order by tenant_admin.created_at desc  limit 1) AS fecha,
        (SELECT tenant_admin.id_status FROM tenant_admin where tenant_admin.id_user = users.id  order by tenant_admin.created_at desc  limit 1) AS status,
        (SELECT abbreviation FROM status JOIN tenant_admin ON tenant_admin.id_status = status.id WHERE tenant_admin.id_user = users.id order by 
        tenant_admin.created_at desc  limit 1) AS abbreviation, (SELECT description FROM status JOIN tenant_admin ON tenant_admin.id_status = status.id 
        WHERE tenant_admin.id_user = users.id order by tenant_admin.created_at desc  limit 1) AS description, (SELECT priority FROM status JOIN 
        tenant_admin ON tenant_admin.id_status = status.id WHERE tenant_admin.id_user = users.id order by tenant_admin.created_at desc  limit 1) AS 
        priority FROM users WHERE id_group = 4';

        $condicion = "";

        $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value'];

      
       //Buscador por columnas
        /* if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3)){
            foreach ($map_table as $key => $val){
                if($key == 0){
                   $condicion .= " HAVING ".$val." LIKE '%".$column0."%'";
                } else {//OR name LIKE valor
                   
                   
                   $condicion .= " AND " .$val. " LIKE '%".$request->getVar('columns')[$key]['search']['value']."%'";
               }
            }
        } */

       //Buscador general 
        if(!empty($search)){
            foreach ($map_table as $key => $val){
                if($key == 0){
                    $condicion .= " HAVING ".$val." LIKE '%".$search."%'";
                } else {//OR name LIKE valor
                    
                    
                    $condicion .= " OR " .$val. " LIKE '%".$search."%'";
                }
                //$condicion .= " OR " .$val. " LIKE '%".$search."%'";
            }
        } else {
            $condicion .= "" ;
        }

       $sql_data = $query_result.$condicion;
       $data2 = $condicion;
       $sql_count = $model_users->getBusqueda($sql_data);
       $sql_count = count($sql_count);
       $sql_data .=   " ORDER BY " .$map_table[$request->getVar('order')[0]['column']]."
                       ".$request->getVar('order')[0]['dir']."" . " LIMIT ".$start. "," .$length.""; 
       $data = $model_users->getBusqueda($sql_data);
       

        $response = [
           "draw" => $draw,
           "recordsTotal" => $sql_count ,
           "recordsFiltered" => $sql_count,
           "data" => $data,
           "debug" => $data2
        ]; 

       return $this->respondCreated($response);    
    }

    public function del_photo(){
        $request = \Config\Services::request();
        $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
        $id_user = $request->getPost('id_uphoto');
        $data_id = $model->get_id($id_user);
        $photo = $data_id->photo;
        $path_absolute = "writable/uploads/Mattes/Arrendatario/";

        $filename = $path_absolute.$photo;
        unlink($filename);
        $data = [
            'photo' => ""
        ];       

        $respuesta = $model->update($data_id->id, $data);

        if($respuesta !=null){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'IMAGEN ELIMINADA'
                ]
            ] ;   

        } else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                ]
            ];
        }

        return $this->respondCreated($response);
    }

    public function del_carta(){
        $request = \Config\Services::request();
        $model_student = model('App\Models\Mattes\Arrendatario_Models/Model_studentdata');
        $id_user = $request->getPost('id_ucarta');
        $data_st = $model_student->get_id($id_user);
        $carta_user = $data_st->university_file;
        $path_absolute = "writable/uploads/Mattes/Arrendatario/";

        $filename = $path_absolute.$carta_user;
        unlink($filename);
        $data = [
            'university_file' => ""
        ];       

        $respuesta = $model_student->update($data_st->id, $data);

        if($respuesta !=null){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'ARCHIVO DE UNIVERSIDAD ELIMINADO'
                ]
            ] ;   

        } else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                ]
            ];
        }

        return $this->respondCreated($response);
    }

    public function del_ine(){
        $request = \Config\Services::request();
        $model_student = model('App\Models\Mattes\Arrendatario_Models/Model_studentdata');
        $id_user = $request->getPost('id_uident');
        $data_st = $model_student->get_id($id_user);
        $identificacion_user = $data_st->ine;
        $path_absolute = "writable/uploads/Mattes/Arrendatario/";

        $filename = $path_absolute.$identificacion_user;
        unlink($filename);
        $data = [
            'ine' => ""
        ];       

        $respuesta = $model_student->update($data_st->id, $data);

        if($respuesta !=null){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'ARCHIVO DE IDENTIFICACION ELIMINADO'
                ]
            ] ;   

        } else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                ]
            ];
        }

        return $this->respondCreated($response);
    }

    public function updateVerif(){
        $request = \Config\Services::request();
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $data = [
            'active' => $request->getPost('verificado')
        ];
        $model_users->update($request->getPost('id_user'), $data);

        //retun affected rows into database
        $affected_rows = $model_users->db->affectedRows();
        $verificado = $model_users->select('active')->where('id', $request->getPost('id_user'))->find()[0]['active'];

        if ($affected_rows) {
            $data = [
                "status" => 200,
                "msg" => "CORREO VERIFICADO",
                "verificado" => $verificado
            ];
            return $this->respond($data);
        } else {
            $data = [
                "status" => 400,
                "msg" => "ERROR EN EL SERVIDOR"
            ];
            return  $this->respond($data);
        }
    }

}