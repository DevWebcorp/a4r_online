<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('sendmail');

class Detalle_propiedad extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
        $model_notify = model('App\Models\Mattes\Back_office_models/Model_property_admin');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $model_indentity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost('id');
        $verificado = $request->getPost('verificado');
        $datos_prop = $model->get_propiedad($id_propiedad);
        $id_user = $datos_prop[0]['id_user'];
        $nombre = $model_indentity->get_name($id_user);
        $correo_prop = $model_users->get_email($id_user);
        $propiedad = $datos_prop[0]['name'];

        if(isset($verificado)){
            $verificado = 1;
            $status_upd = 200;
            $status_insert = 201;
            //$model_notify->change_status($status_upd);
            $model_notify->change($status_upd);
            $this->status($id_propiedad,$status_insert);
            $correo = $correo_prop[0]['email'];
            $asunto = "PROPIEDAD VERIFICADA";
            $datos['usuario'] = $nombre[0]['name'];
            $datos['texto'] = " su propiedad ".$propiedad." ha sido verificada.";
            //$datos['url'] = "/Mattes/Arrendador/Detalle_propiedad";
            $mensaje = view('Mattes/Back_office_view/Correo_verificado', $datos);
            $file = null;
            send_email($correo, $asunto, $mensaje, $file); 

        }else{
            $verificado = 0;
        }

        //pocionamiento
        $pocisionamiento = $request->getPost('pocisionamiento');

        if(isset($pocisionamiento)){
            $pocisionamiento = 1;
            $status_upd = 402;
            $status_insert = 403;
            $model_notify->change_status($status_upd);
            $this->status($id_propiedad,$status_insert);

        }else{
            $pocisionamiento = 0;
        }

       //sello
        $sello = $request->getPost('sello');
        if(isset($sello)){
            $sello = 1;
            $status_upd = 400;
            $status_insert = 401;
            $model_notify->change_status($status_upd);
            $this->status($id_propiedad,$status_insert);

        }else{
            $sello = 0;
        }

        $data = [
            'verified' => $verificado,
            'positioning' => $pocisionamiento,
            'stamp_mattes' => $sello,
        ];

        //var_dump($data);

    
        $respuesta = $model->update($id_propiedad, $data);
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

    public function status($id_propiedad, $status){   
        $model_prop_x_status = model('App\Models\Mattes\Back_office_models/Model_property_admin');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');

        $status_propiedad = [
            'status' => $status
        ];
        $model_propiedad->update($id_propiedad, $status_propiedad);

        $status_prop = [
            'id_property' => $id_propiedad ,
            'id_status' => $status,
            'attended' => 1
        ];
        $model_prop_x_status->insert($status_prop);        
    }

}
