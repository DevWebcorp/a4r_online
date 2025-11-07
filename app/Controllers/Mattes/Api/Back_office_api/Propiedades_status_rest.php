<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Propiedades_status_rest extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $request = \Config\Services::request();

        $propiedades = model('App\Models\Mattes\Back_office_models\Model_property_admin');
        $pager = \Config\Services::pager();
        $draw = $request->getVar('draw'); //dibuja contador 
        $length = $request->getVar('length'); //numero de registros que la tablla puede mostrar 
        $start = $request->getVar('start'); //Primer registro de paginacion
        $search =  $request->getVar('search')['value']; //valor de busqueda global
        //$search2 =  $request->getVar('columns')[0]['search']['value'];//valor de la busqueda para aplicar a esa columna especifica

        $map_table = [
            0 => "Propiedad",
            1 => "fecha",
            2 => "abrev",
            3 => 'prioridad'
        ];

        $sql_data = 'select property_admin.created_at as fecha, property_admin.attended as atendido,
        status.abbreviation as abrev, status.description as descrip, status.priority as prioridad, 
        property.name as Propiedad, property.deleted_at AS eliminado from property_admin INNER JOIN property ON property.id = property_admin.id_property 
        INNER JOIN status on status.id = property_admin.id_status ';

        $condicion = "";

        /* $column0 =  $request->getVar('columns')[0]['search']['value'];
        $column1 =  $request->getVar('columns')[1]['search']['value'];
        $column2 =  $request->getVar('columns')[2]['search']['value'];
        $column3 =  $request->getVar('columns')[3]['search']['value']; */

        //Buscador por columnas
        /* if(!empty($column0) or !empty($column1) or !empty($column2) or !empty($column3)){
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
            $condicion .= " WHERE property.deleted_at = '0000-00-00 00:00:00'";
            foreach ($map_table as $key => $val) {
                //$condicion .= " OR " . $val . " LIKE '%" . $search . "%'";
               
                if ($key == 0) {
                    $condicion .= " HAVING " . $val . " LIKE '%" . $search . "%'  ";
                } else { //OR name LIKE valor
                    $condicion .= " OR " . $val . " LIKE '%" . $search . "%' ";
                }
            }
            
        }else{
            //$condicion.= "  HAVING atendido=0";
            $condicion.= "  WHERE status.priority LIKE '%acción requerida%' AND property_admin.attended = 0 HAVING eliminado = '0000-00-00 00:00:00'";
        }

        $sql_data = $sql_data . $condicion;
        $sql_count = $propiedades->get_status_propiedades($sql_data);
        $sql_count = count($sql_count);
        $sql_data .=   " ORDER BY " . $map_table[$request->getVar('order')[0]['column']] . "
                        " . $request->getVar('order')[0]['dir'] . "" . " LIMIT " . $start . "," . $length . "";
        $data = $propiedades->get_status_propiedades($sql_data);
        $data2 = $sql_data;
        $response = [
            "draw" => $draw,
            "recordsTotal" => $sql_count,
            "recordsFiltered" => $sql_count,
            "data" => $data,
            "debbug" => $sql_data
        ];

        return $this->respondCreated($response);
    }
}
