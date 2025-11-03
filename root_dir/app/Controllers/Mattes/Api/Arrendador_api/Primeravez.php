<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');


class Primeravez extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $acceso = Acceso();
        if($acceso){
            $session = session();
            $model= model('App\Models\Mattes\Arrendador_models/Primeravez');
            $total_model = model('App\Models\Mattes\Arrendador_models/Total_Propiedades');

            $json = $this->request->getJSON();
            $tipo_propretario = $json->tipo_persona;

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


            $data = [
                'id_user' => $session->get('unique'),
                'id_tradename' => $razon
            ];

            $total = [
                'id_user' => $session->get('unique'),
                'total' => $numero_propiedades
            ];

            $regreso = $model->insert($data);
            $n_propiedades  = $total_model->insert($total);

            if($regreso !=null or $regreso !="" or $regreso ==0){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'tipo' => $razon,
                    'messages' => [
                        'success' => 'GUARDADO CON EXITO'
                    ]
                ];
              return $this->respondCreated($response);  

            }else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    
                    'messages' => [
                       
                        'success' => 'ERROR AL AGREGAR, INTENTELO DE NUEVO'
                    ]
                ];
              return $this->respondCreated($response);  

            }
        
        }else{
            return redirect()->to(base_url());
        } 
    }
}