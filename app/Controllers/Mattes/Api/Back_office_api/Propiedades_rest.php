<?php 

namespace App\Controllers\Mattes\Api\Back_office_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Propiedades_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){

       /*  $propiedades = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
        $data['data'] = $propiedades->get_propiedades_bo();
        return $this->respond($data, 200); */

        $request = \Config\Services::request();
        $propiedades = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw');//dibuja contador 
        $length = $request->getVar('length');//numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start');//Primer registro de paginacion
        $search =  $request->getVar('search')['value'];//valor de busqueda global
        $search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table =[
            0 => "property.name",
            1 => "estado",
            2 => "direccion_propiedad",
            3 => 'universidad',
            4 => 'fecha_alta',
            5 => 'fecha_actualizacion'        
        ];

        $sql_data = 'SELECT property.name AS Propiedad,
        (SELECT propertydetail.id_cp FROM propertydetail where property.id = propertydetail.id_propety ) AS cp_prop,
        (SELECT hcv_cat_cp.ESTADO FROM hcv_cat_cp where hcv_cat_cp.ID = cp_prop) AS estado,
        (SELECT propertydetail.addrees FROM propertydetail where property.id = propertydetail.id_propety lIMIT 1) AS direccion_propiedad,
        (SELECT propertydetail.id_university FROM propertydetail where property.id = propertydetail.id_propety) AS univ_prop,
        (SELECT catuniversity.name FROM catuniversity where catuniversity.id = univ_prop) AS universidad,
        property.created_at AS fecha_alta, property.updated_at AS fecha_actualizacion FROM property WHERE property.deleted_at = "0000-00-00 00:00:00"';

        $condicion = "";

        $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value'];
        $column4 =  $request->getVar('columns')[4]['search']['value'];
        $column5 =  $request->getVar('columns')[5]['search']['value']; 

        //Buscador por columnas
        if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3) or !empty($column4)
        or !empty($column5)){
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
 
        $sql_data = $sql_data.$condicion;
        $sql_count = $propiedades->get_propiedades_bo($sql_data);
        $sql_count = count($sql_count);
        $sql_data .=   " ORDER BY " .$map_table[$request->getVar('order')[0]['column']]."
                        ".$request->getVar('order')[0]['dir']."" . " LIMIT ".$start. "," .$length.""; 
        $data = $propiedades->get_propiedades_bo($sql_data);

        $response = [
            "draw" => $draw,
            "recordsTotal" => $sql_count ,
            "recordsFiltered" => $sql_count,
            "data" =>$data,
        ]; 

        return $this->respondCreated($response);  
    
    }

    public function get_preguntas() {
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost("id");
        $propiedades = model('App\Models\Mattes\Arrendador_models\Propiedad');
        $data['data'] = $propiedades->get_questions_propiedad($id_propiedad);
        return $this->respond($data, 200); 
    }

    public function eliminar_pregunta() {
        $json = $this->request->getJSON();
        $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
        $id = $json->id_pregunta;

        $model_questions->delete($id);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'PREGUNTA ELIMINADA'
            ]
        ];
        return $this->respondCreated($response);   
    }

    public function get_visitas() {
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost("id");
        $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
        $data['data'] = $model_citas->get_visitas($id_propiedad);
        return $this->respond($data, 200);
    }

   
}