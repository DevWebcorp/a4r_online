<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');
helper('sendmail');

class Status extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $acceso = Acceso();

        if ($acceso) {
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_indentity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_status = model('App\Models\Mattes\Back_office\Back_Arrendador');
            $request = \Config\Services::request();
            $id_user = $request->getPost('id_user');
            $id_identity = $model_indentity->select('id')->where('id_user',$id_user)->find();
            $nombre = $model_indentity->get_name($id_user);
            $correo_prop = $model_users->get_email($id_user);

            //verificado
            $activo = $request->getPost('user_activo');
            $activo = isset($activo)  ? 1  : 2;

            //pocionamiento
            $verificado = $request->getPost('user_verificado');
            $verificado = isset($verificado)  ? 1  : 0;

            if($verificado == 1){
                $estatus = 101;
                $correo = $correo_prop[0]['email'];
                $asunto = "USUARIO VERIFICADO";
                $datos['usuario'] = $nombre[0]['name'];
                $datos['texto'] = " su usuario ha sido verificado y ahora puede comenzar a subir sus propiedades.";
                //$datos['url'] = "/Mattes/Arrendador/Detalle_propiedad";
                $mensaje = view('Mattes/Back_office_view/Correo_verificado', $datos);
                $file = null;
                send_email($correo, $asunto, $mensaje, $file); 

            }else{
                $estatus = 100;
            }

            //var_dump($nombre[0]);

            $data = [
                'verify' => $verificado,
                'status' => $estatus
            ];

            $model_indentity->update($id_identity[0]['id'],$data);


            $data_arctivo = [
                'active' => $activo,
            ];

            $model_users->update($id_user,$data_arctivo);

            $data = [
                'id_user' => $id_user,
                'id_status' => $estatus,
            ];
    
            $respuesta = $model_status->insert($data);


            if ($respuesta != null) {
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'DATOS ACTUALIZADOS CON EXITO'
                    ]
                ];
                return $this->respondCreated($response);
            } else {
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
