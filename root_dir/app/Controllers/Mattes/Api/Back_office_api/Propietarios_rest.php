<?php 

namespace App\Controllers\Mattes\Api\Back_office_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Propietarios_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){

        /* $propietarios = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $data['data'] = $propietarios->lista_propietarios();
        return $this->respond($data, 200);  */

        $request = \Config\Services::request();
        $propietarios = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw');//dibuja contador 
        $length = $request->getVar('length');//numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start');//Primer registro de paginacion
        $search =  $request->getVar('search')['value'];//valor de busqueda global
        $search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table =[
            0 => "propietarios",
            1 => "correo",
            2 => "tipo",
            3 => "propiedades",
            4 => 'estatus',
            5 => 'alta',
            6 => 'acceso'        
        ];

        $sql = 'SELECT users.id as id, users.email as correo, users.id_group, users.active AS estatus, created_at AS alta, updated_at AS acceso, (SELECT name FROM groups WHERE id = users.id_group)
        AS tipo, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE id_user=users.id) as propietarios, 
        (SELECT COUNT(*) as total FROM property WHERE property.id_user = users.id lIMIT 1) AS propiedades, (SELECT id_tradename FROM tradenamexuser
        WHERE id_user = users.id LIMIT 1) AS tipo_persona FROM users WHERE id_group = 3 OR id_group = 5';

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
                }else {//OR name LIKE valor
                    $condicion .= " AND " .$val. " LIKE '%".$request->getVar('columns')[$key]['search']['value']."%'";
                }
            }
        }

        //Buscador general 
        if(!empty($search)){
            foreach ($map_table as $key => $val){
                if($key == 0){
                    $condicion .= " HAVING ".$val." LIKE '%".$search."%'";
                }else {//OR name LIKE valor
                    
                    $condicion .= " OR " .$val. " LIKE '%".$search."%'";
                }
            }
        }  
 
        $sql_data = $sql.$condicion;
        $sql_count = $propietarios->lista_propietarios($sql_data);
        $sql_count = count($sql_count);
        $sql_data .=   " ORDER BY " .$map_table[$request->getVar('order')[0]['column']]."
                        ".$request->getVar('order')[0]['dir']."" . " LIMIT ".$start. "," .$length.""; 
        $data = $propietarios->lista_propietarios($sql_data);

        $response = [
            "draw" => $draw,
            "recordsTotal" => $sql_count ,
            "recordsFiltered" => $sql_count,
            "data" =>$data,
        ]; 

        return $this->respondCreated($response); 
    
    }

    public function get_empresas(){
        $json = $this->request->getJSON();
        $id_usuario = $json->id_usuario;
        $users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
        $model_ban = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
        $model_fiscal = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
        $model_notis = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
        $data['identity'] = $model_identity->total($id_usuario);
        $data['bancarios'] = $model_ban->get_bancarios($id_usuario);
        $data['fiscales'] = $model_fiscal->get_fiscales($id_usuario);
        $data['notis'] = $model_notis->get_notificaciones($id_usuario);
        $data['users'] = $users->get_activo($id_usuario);

        return $this->respond($data, 200);   
    }

    public function get_propietarios(){
        $json = $this->request->getJSON();
        $id_usuario = $json->id_usuario;
        $users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
        $model_ban = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
        $model_fiscal = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
        $model_notis = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
        $data['identity'] = $model_identity->total($id_usuario);
        $data['bancarios'] = $model_ban->get_bancarios($id_usuario);
        $data['fiscales'] = $model_fiscal->get_fiscales($id_usuario);
        $data['notis'] = $model_notis->get_notificaciones($id_usuario);
        $data['users'] = $users->get_activo($id_usuario);
        return $this->respond($data, 200);   



    }

    public function update_agente(){
        $request = \Config\Services::request();
        $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $path = 'uploads/Mattes/Agente';
        $path_absolute = "writable/uploads/Mattes/Agente/";

        $nombre = $request->getPost('nombre_agente');
        $ap_paterno = $request->getPost('apellidof');
        $ap_materno = $request->getPost('apellidos');
        $telefono = $request->getPost('telefono');
        $file = $this->request->getFile('file');
        $id_usuario = $request->getPost('id_user');
        $identificacion = $request->getFile('ine_agente');

        $id_datos = $model->get_id($id_usuario);

        if(!$file->isValid()){
            $file_user = $id_datos->photo;
           
        } else{
            $filename = $path_absolute.$id_datos->photo;
            unlink($filename);
            $newName = $file->getRandomName();
            $file->move(WRITEPATH.$path, $newName);
            $file_user = $file->getName(); 
        }

        if (!$identificacion->isValid()) {
            $ine_agente = "";
        } else {
            $filename = $path_absolute.$id_datos->ine;
            unlink($filename);
            $newName = $identificacion->getRandomName();
            $identificacion->move(WRITEPATH . $path, $newName);
            $ine_agente = $identificacion->getName();
        }


        $data = [
            'name' => $nombre,
            'first_name' => $ap_paterno,
            'second_name' => $ap_materno,
            'phone' => $telefono,
            'photo' => $file_user,
            'ine' => $ine_agente
        ];

        $respuesta = $model->update($id_datos->id,$data);

        if($respuesta !=null){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'ACTUALIZADO CON EXITO'
                ]
            ]; 
        }else{
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

    public function changePassword(){
        $db = db_connect();
        $model_register=model('App\Models\Model_user\Table_user');
        $request = \Config\Services::request();

        $id = $request->getPost('user');
        $password = $request->getPost('password');
        $password_hashed = password_hash($password,PASSWORD_DEFAULT);
        $data = [
            'password' => $password_hashed,
        ];

       

        $model_register->update($id,$data);
        $affected_rows = $db->affectedRows();

        if($affected_rows > 0){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CONTRASEÑA ACTUALIZADA CON EXITO'
                ]
            ]; 
        }else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO MAS TARDE'
                    ]
                ];
        } 
        return $this->respondCreated($response); 
    }
   
}