<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');


class Propiedades_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $acceso = Acceso();
        if($acceso){
            $session = session();
            $user_id = $session->get('unique');

            $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
            $json = $this->request->getJSON();
            $data_tradename = $model_user->get_tradename($user_id);
           
            if (isset($data_tradename[0]->id_tradename)){
                $tradename = $data_tradename[0]->id_tradename;
                if($tradename == "2"){
                    $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                    $json = $this->request->getJSON();
                    $data = $model->get_propiedades_moral($user_id);
                  
                } else {
                    $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                    $json = $this->request->getJSON();
                    $data = $model->get_propiedades_fisica($user_id);
                 
                }  
            } else {
            
               $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                $json = $this->request->getJSON();
                $data = $model->get_propiedades_fisica($user_id);
            }
        
            return $this->respond($data, 200); 
        }else{
            return redirect()->to(base_url());
        }
       
    }

    public function validacion() {
        $id_prop = $_POST['id_propiedad'];

        //TABLA DETALLE PROPIEDAD
        $model_detalle = model('App\Models\Mattes\Arrendador_models/Detalle_propiedad');
        $json = $this->request->getJSON();
        $data_detalle = $model_detalle->get_info($id_prop);
        $detalle = $data_detalle[0]->total;
      
        // TABLA SERVICIOS PROPIEDAD

        $model_servicios = model('App\Models\Mattes\Arrendador_models/Servicios');
        $json = $this->request->getJSON();
        $data_servicios = $model_servicios->get_info($id_prop);
        $servicios = $data_servicios[0]->total;

        // TABLA FILES PROPIEDAD

        $model_files = model('App\Models\Mattes\Arrendador_models/Files');
        $json = $this->request->getJSON();
        $data_files = $model_files->get_info($id_prop);
        $files=$data_files[0]->total;

        //var_dump($files);

        if ($detalle > "0"){
            if($servicios > "0") {
                if($files > "0") {
                    $data = [
                        "validacion" => 5
                    ];
                    return $this->respond($data, 200);
                }
                else {
                    $data = [
                        "validacion" => 4
                    ];
                    return $this->respond($data, 200);
                }
            } else {
                $data = [
                    "validacion" => 3
                ];
                return $this->respond($data, 200);
            }
        } else {
            $data = [
                "validacion" => 2
            ];
            return $this->respond($data, 200);
        }
    }

    public function busqueda(){
        $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
            $busqueda = $request->getPost('busqueda');
            $session = session();
            $user_id = $session->get('unique');
            $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
            $data_tradename = $model_user->get_tradename($user_id);

            if (isset($data_tradename[0]->id_tradename)){
                $tradename = $data_tradename[0]->id_tradename;
                if($tradename == "2"){
                    $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                   // $json = $this->request->getJSON();
                    $data = $model->busqueda_moral($user_id,$busqueda);
                } else {
                    $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                   // $json = $this->request->getJSON();
                    $data = $model->busqueda_fisica($user_id,$busqueda);
                 
                }  
            }else{
                $model= model('App\Models\Mattes\Arrendador_models/Propiedad');
                $json = $this->request->getJSON();
                $data = $model->busqueda_fisica($user_id,$busqueda);
            }
        
            return $this->respond($data, 200); 
        }else{
            return redirect()->to(base_url());
        }

    }

    public function get_name(){
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $user_id = $session->get('unique');
            $model_propietario = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
            $data = $model_propietario->get_name($user_id);
            
        
            return $this->respond($data, 200); 
        } else{
            return redirect()->to(base_url());
        }
    }

    public function readPropiedad(){
        $acceso = Acceso();
        if($acceso){
            $id_propiedad = $_POST['id_propiedad'];
            $model_detalle = model('App\Models\Mattes\Arrendador_models/Propiedad');
            $data = $model_detalle->get_propiedad($id_propiedad);
    
            return $this->respond($data, 200); 
        } else {
            return redirect()->to(base_url());
        }
    }
        
    public function deletePropiedad(){
        $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
            $model_detalle = model('App\Models\Mattes\Arrendador_models/Propiedad');
            $respuesta = $model_detalle->delete($request->getPost('id_delete'));

            if($respuesta != null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'PROPIEDAD ELIMINADA'
                    ]
                ];
            } else {
        
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN ERROR, INTENTE DE NUEVO'
                    ]       
                ];
            }
            return $this->respondCreated($response); 
        }
    }
}