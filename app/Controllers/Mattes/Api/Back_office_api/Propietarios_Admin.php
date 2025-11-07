<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Propietarios_Admin extends ResourceController
{
    use ResponseTrait;

    public function index()
    {

        $request = \Config\Services::request();
        $propietarios = model('App\Models\Mattes\Back_office\Back_Arrendador');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw'); //dibuja contador 
        $length = $request->getVar('length'); //numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start'); //Primer registro de paginacion
        $search =  $request->getVar('search')['value']; //valor de busqueda global
        //$search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table = [
            0 => "nombre",
            1 => "email",
            2 => "fecha",
            3 => "abb",
            4 => 'prority',
            5 => 'active'
            /* 4 => 'alta',
            5 => 'acceso'      */
        ];

        $sql = 'SELECT users.id as id_user, users.active, users.id_group, email,
        ( select name FROM identityowner where users.id = identityowner.id_user lIMIT 1) AS nombre,
        ( select first_name  FROM identityowner where users.id = identityowner.id_user lIMIT 1) AS ap,
        ( select  second_name  FROM identityowner where users.id = identityowner.id_user lIMIT 1) AS am,
        (SELECT admin_renter.id_status FROM admin_renter where admin_renter.id_user = users.id  order by admin_renter.created_at desc  limit 1) AS status,
        (SELECT admin_renter.created_at  FROM admin_renter where admin_renter.id_user = users.id order by admin_renter.created_at desc  limit 1 ) AS fecha,
        (SELECT status.description FROM status where status = status .id ) AS des,
        (SELECT status.abbreviation  FROM status where status = status .id ) AS abb,
        (SELECT status.priority  FROM status where status = status .id ) AS prority,
        (SELECT tradenamexuser.id_tradename  FROM tradenamexuser where users.id = tradenamexuser.id_user  ) AS persona
        FROM users  WHERE id_group = 3';

        $condicion = "";

        /*    $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value'];
        $column4 =  $request->getVar('columns')[4]['search']['value'];
        $column5 =  $request->getVar('columns')[5]['search']['value']; */

        //Buscador por columnas
        /*  if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3) or !empty($column4)
        or !empty($column5)){
            foreach ($map_table as $key => $val){
                if($key == 0){
                    $condicion .= " HAVING ".$val." LIKE '%".$column0."%'";
                }else {//OR name LIKE valor
                    
                    
                    $condicion .= " AND " .$val. " LIKE '%".$request->getVar('columns')[$key]['search']['value']."%'";
                }
            }
        } */

        //Buscador general 
        if (!empty($search)) {
            foreach ($map_table as $key => $val) {
                if ($key == 0) {
                    $condicion .= " HAVING " . $val . " LIKE '%" . $search . "%'";
                } else { //OR name LIKE valor

                    $condicion .= " OR " . $val . " LIKE '%" . $search . "%'";
                } 
            }
        }else{
            $condicion .= "" ;
        }

        $sql_data = $sql . $condicion;
        $sql_count = $propietarios->lista_propietarios($sql_data);
        $sql_count = count($sql_count);
        $sql_data .=   " ORDER BY " . $map_table[$request->getVar('order')[0]['column']] . "
                        " . $request->getVar('order')[0]['dir'] . "" . " LIMIT " . $start . "," . $length . "";
        $data = $propietarios->lista_propietarios($sql_data);

        $response = [
            "draw" => $draw,
            "recordsTotal" => $sql_count,
            "recordsFiltered" => $sql_count,
            "data" => $data,
            "sql_data" => $sql_data
        ];

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
        //var_dump($request->getPost('id_user'));

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

    public function cambiarContra(){
        $request = \Config\Services::request();
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $contra = $request->getPost('contra');
        $password_hashed = password_hash($contra,PASSWORD_DEFAULT);
        $search = ['/','.'];
		$remplace = ['&&&','z'];
		$activation_token = str_replace($search, $remplace, $password_hashed);

        $data = [
            'password' => $password_hashed,
            'activation_token' => $activation_token
        ];

        $model_users->update($request->getPost('id_user'), $data);

        $affected_rows = $model_users->db->affectedRows();
        if ($affected_rows) {
            $data = [
                "status" => 200,
                "msg" => "CONTRASEÑA ACTUALIZADA"
            ];
            return $this->respond($data);
        } else {
            $data = [
                "status" => 400,
                "msg" => "HUBO UN ERROR EN EL SERVIDOR"
            ];
            return  $this->respond($data);
        }
    }

    public function userVerificado(){
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $session = session();
        $user_id = $session->get('unique');
        $activo = $model_users->select('active')->where('id', $user_id)->find();
        if(empty($activo)){
            $newActivo = 2;
        } else {
            $newActivo = $activo[0]['active'];
        }
        $data = [
            'active' => $newActivo
        ];
        return  $this->respond($data);
    }

    public function subirPropietario(){
        $model_users = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $model_propietario = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $model= model('App\Models\Mattes\Arrendador_models/Primeravez');
        $total_model = model('App\Models\Mattes\Arrendador_models/Total_Propiedades');
        $request = \Config\Services::request();
        date_default_timezone_set('America/Mexico_City');

        $tipo_propretario = $request->getPost('tipo_arrendador');

        switch ($tipo_propretario) {
            case 1:
                $razon = 1;
                $numero_propiedades = 2;
                break;
            case 2:
                $razon = 1;
                $numero_propiedades = 10;
                break;
            case 3:
                $razon = 2;
                $numero_propiedades = 30;
                break;
        } 

        if($request->getPost('id_usuarioper')){
            $path = 'uploads/Mattes/Arrendador';
            $file = $this->request->getFile('file');
            $datos = $model_propietario->get_id($request->getPost('id_usuarioper'));

            if (!$file->isValid()) {
                $file_user = $id_datos->photo;
            } else {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . $path, $newName);
                $file_user = $file->getName();
            }

            $data_prop = [
                'photo' => $file_user,
                'name' => $request->getPost('nombre'),
                'first_name' => $request->getPost('apellido'),
                'second_name' => $request->getPost('segundo_apellido'),
                'phone' => $request->getPost('celular')
            ];

            $model_propietario->update($request->getPost('id_usuarioper'), $data_prop);

            $affected_rows = $model_propietario->db->affectedRows();
            if ($affected_rows) {
                $data = [
                    "status" => 200,
                    "msg" => "USUARIO ACTUALIZADO",
                    "id_user" => $id_user
                ];
                return $this->respond($data);
            } else {
                $data = [
                    "status" => 400,
                    "msg" => "HUBO UN ERROR EN EL SERVIDOR"
                ];
                return  $this->respond($data);
            }

        } else {
            $ver_correo = $model_users->correo_repetido($request->getPost('correo'));
            if($ver_correo == 0){
                $data_user = [
                    'id_group' => $tipo_propretario,
                    'c_date' => date("Y-m-d h:i:s"),
                    'email' => $request->getPost('correo')
                ];
        
                $id_user =  $model_users->insert($data_user);
            } else {
                $data = [
                    "status" => 400,
                    "msg" => "EL CORREO YA ESTA REGISTRADO"
                ];
                return  $this->respond($data);
            }
            

            if($id_user > 0){
                $data = [
                    'id_user' => $id_user,
                    'id_tradename' => $razon
                ];
    
                $total = [
                    'id_user' => $id_user,
                    'total' => $numero_propiedades
                ];

                $regreso = $model->insert($data);
                $n_propiedades  = $total_model->insert($total);
                
                $path = 'uploads/Mattes/Arrendador';
                $file = $this->request->getFile('file');

                if (!$file->isValid()) {
                    $file_user = "";
                } else {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . $path, $newName);
                    $file_user = $file->getName();
                }

                $data_prop = [
                    'id_user' => $id_user,
                    'photo',
                    'name' => $request->getPost('nombre'),
                    'first_name' => $request->getPost('apellido'),
                    'second_name' => $request->getPost('segundo_apellido'),
                    'phone' => $request->getPost('celular')
                ];

                $model_propietario->insert($data_prop);

                $affected_rows = $model_propietario->db->affectedRows();
                if ($affected_rows) {
                    $data = [
                        "status" => 200,
                        "msg" => "USUARIO CREADO",
                        "id_user" => $id_user
                    ];
                    return $this->respond($data);
                } else {
                    $data = [
                        "status" => 400,
                        "msg" => "HUBO UN ERROR EN EL SERVIDOR"
                    ];
                    return  $this->respond($data);
                }
            } else {
                $data = [
                    "status" => 400,
                    "msg" => "HUBO UN PROBLEMA, INTENTALO DE NUEVO"
                ];
                return  $this->respond($data);
            }
        } 
    }
}
