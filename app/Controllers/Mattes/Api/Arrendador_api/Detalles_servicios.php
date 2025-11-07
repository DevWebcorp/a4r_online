<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');


class Detalles_servicios extends ResourceController
{
    use ResponseTrait;

    public function creat(){

        $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
            $model = model('App\Models\Mattes\Arrendador_models/Servicios');

            $acceso_personas = $request->getPost('capacidades');
            $acceso_personas = isset($acceso_personas)  ? 1  : 0;
            $wifi = $request->getPost('wifi');
            $wifi = isset($wifi)  ? 1  : 0;
            $limpieza = $request->getPost('limpieza');
            $limpieza = isset($limpieza)  ? 1  : 0;
            $estacionamiento = $request->getPost('estacionamiento');
            $estacionamiento = isset($estacionamiento)  ? 1  : 0;
            $seguridad = $request->getPost('seguridad');
            $seguridad = isset($seguridad)  ? 1  : 0;
            $lavadora = $request->getPost('lavadora');
            $lavadora = isset($lavadora)  ? 1  : 0;
            $cocina = $request->getPost('cocina');
            $cocina = isset($cocina)  ? 1  : 0;
            $id_propiedad = $request->getPost('id_propiedad');

            $data = [
                'id_propety' =>$request->getPost('id_propiedad'),
                'n_roomies' => $request->getPost('numero_roomies'),
                'n_beds' => $request->getPost('numero_camas'),
                'n_bathing' => $request->getPost('numero_baños'),
                'petfrienly' => $request->getPost('petfriendly'),
                'status_bath' => $request->getPost('tipo_baño'),
                'available' => $request->getPost('disponible'),
                'disability' => $acceso_personas,
                'wifi' => $wifi,
                'cleaning' => $limpieza,
                'parking' => $estacionamiento,
                'security' => $seguridad,
                'washer' => $lavadora,
                'n_drawers' => $request->getPost('cajones'),
                'kitchen_room' => $cocina,
            ];
            //var_dump($data);

            $regreso = $model->insert($data);
            if($regreso !=null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'id'       =>$id_propiedad,
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