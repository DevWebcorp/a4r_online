<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');


class Propiedad_ubicacion extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $acceso = Acceso();
        if($acceso){
            $json = $this->request->getJSON();
            $model = model('App\Models\Mattes\Arrendador_models/Universidades');
            $busqueda = $json->search;
            $limite = $json->limit;
            $data = $model->get_universidades($busqueda,$limite);
            return $this->respond($data, 200); 
        }
         
    }

    public function get_universidades($busqueda){
       // $json = $this->request->getJSON();
        $model = model('App\Models\Mattes\Arrendador_models/Universidades');
       // $busqueda = $json->search;
       // $limite = $json->limit;
        $data = $model->get_universidades($busqueda);
        return $this->respond($data, 200);            
    }

    //Funcion para mostrar las universidades que tienen al menos una propiedad
    public function get_universidades_prop($busqueda){
       // $json = $this->request->getJSON();
        $model = model('App\Models\Mattes\Arrendador_models/Universidades');
       // $busqueda = $json->search;
       // $limite = $json->limit;
        $data = $model->get_universidades_prop($busqueda);
        return $this->respond($data, 200);            
    }

    public function creat(){
        $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
            $model = model('App\Models\Mattes\Arrendador_models/Detalle_propiedad');
            //var_dump($_POST);
            $id_propiedad = $request->getPost('id_propiedad');
            $price = str_replace(",", "", $request->getPost('precio')); 

            $data = [
                'id_propety' => $request->getPost('id_propiedad'),
                'id_university' => $request->getPost('id_univ'),
                'id_cp' => $request->getPost('ID_CODE'),
                'price' => $price,
                'inhabit' => $request->getPost('habita_propiedad'),
                'addrees' => $request->getPost('direccion'),
                'address2' => $request->getPost('direccion_dos'),
                'km' => $request->getPost('distancia'),
                'type_distance' => "Metros",
                'latitude' => $request->getPost('latitud'),
                'longitude' => $request->getPost('longitud'),
            ];

           $regreso = $model->insert($data);
            if($regreso !=null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'id' => $id_propiedad,
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