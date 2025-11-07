<?php 

namespace App\Controllers\Mattes\Api\Administrador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Universidades_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
        //var_dump("HOLA COMO ESTAS");
        $request = \Config\Services::request();
        $model_university = model('App\Models\Mattes\Arrendador_models/Universidades');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw');//dibuja contador 
        $length = $request->getVar('length');//numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start');//Primer registro de paginacion
        $search =  $request->getVar('search')['value'];//valor de busqueda global
        $search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table =[
            0 => "name",
            1 => "state",
            2 => "latitude",
            3 => 'longitude',
            4 => 'id'       
        ];
       
        $query_result =  'SELECT id, name, state, latitude, longitude FROM catuniversity WHERE deleted_at = "0000-00-00 00:00:00"';

        $condicion = "";

        $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value'];
        $column4 =  $request->getVar('columns')[4]['search']['value'];

      
       //Buscador por columnas
       if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3) or !empty($column4)){
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
       $sql_count = $model_university->getBusqueda($sql_data);
       $sql_count = count($sql_count);
       $sql_data .=   " ORDER BY " .$map_table[$request->getVar('order')[0]['column']]."
                       ".$request->getVar('order')[0]['dir']."" . " LIMIT ".$start. "," .$length.""; 
       $data = $model_university->getBusqueda($sql_data);

        $response = [
           "draw" => $draw,
           "recordsTotal" => $sql_count ,
           "recordsFiltered" => $sql_count,
           "data" =>$data,
        ]; 

       return $this->respondCreated($response);
    }

    public function insert_university(){
        $model_university = model('App\Models\Mattes\Arrendador_models/Universidades');
        $request_form = \Config\Services::request();
        
        $data = [
            'name' => $request_form->getPost('n_universidad'),
            'state' => $request_form->getPost('estado'),
            'latitude' => $request_form->getPost('latitud'),
            'longitude' => $request_form->getPost('longitud')
        ];

        $universidad = $model_university->insert($data);

        if ($universidad != null) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'UNIVERSIDAD AGREGADA CON ÉXITO'
                ]
            ];
        } else {
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

    public function get_university(){
        $model_university = model('App\Models\Mattes\Arrendador_models/Universidades');
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        //var_dump($id);
        $data = $model_university->get_datos_uni($id);
        return $this->respond($data, 200); 
    }

    public function update_university(){
        $model_university = model('App\Models\Mattes\Arrendador_models/Universidades');
        $request_form = \Config\Services::request();

        //var_dump($request_form);
        
        $data = [
            'name' => $request_form->getPost('n_update'),
            'state' => $request_form->getPost('estado_update'),
            'latitude' => $request_form->getPost('latitud_update'),
            'longitude' => $request_form->getPost('longitud_update')
        ];

        $universidad = $model_university->update($request_form->getPost('id_update'), $data);

        if ($universidad != null) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'UNIVERSIDAD ACTUALIZADA CON ÉXITO'
                ]
            ];
        } else {
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

    public function delete_university(){
        $model_university = model('App\Models\Mattes\Arrendador_models/Universidades');
        $request_form = \Config\Services::request();

        //var_dump($request_form);
    
        $universidad = $model_university->delete($request_form->getPost('id_uni'));

        if ($universidad != null) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'UNIVERSIDAD ELIMINADA'
                ]
            ];
        } else {
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
  
}