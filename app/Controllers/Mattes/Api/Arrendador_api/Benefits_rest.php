<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');
helper('sendmail');


class Benefits_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $acceso = Acceso();
        if($acceso){
            $session = session();
            $user_id = $session->get('unique');
            $model_benefits = model('App\Models\Mattes\Arrendador_models/Benefits');
            $model_prop = model('App\Models\Mattes\Arrendador_models/Datos_propietario');

            $datau = $model_prop->get_name($user_id); 
            $usuario = $datau[0]['name'];
            $asunto = "Invitación Mattes";
            $file = null;

            $long = count($_POST["nombre"]);
          

            for($i = 0; $i<=$long-1; $i++) {

                $nombre =  $_POST["nombre"][$i];
                $correo =  $_POST["correo"][$i];

                $data = [
                    'id_user' => $user_id,
                    'name' => $nombre,
                    'email' => $correo 
                ];

                $model_benefits->insert($data);

                $datos["usuario"] = $usuario;
                $datos["nombre"] = $nombre;
                $mensaje = view('Mattes/Arrendador_view/Beneficiosinvitacion_correo', $datos);

                $email = send_email($correo, $asunto, $mensaje, $file);

                
                             
            }  
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'INVITACION BENEFICIOS ENVIADA'
                ]
            ]; 
            return $this->respondCreated($response); 

        } else {
            return redirect()->to(base_url());
        }  
        
       
    }
    
}