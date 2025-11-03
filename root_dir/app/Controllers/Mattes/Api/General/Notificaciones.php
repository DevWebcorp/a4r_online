<?php

namespace App\Controllers\Mattes\Api\General;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');


class Notificaciones extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        }
    }

    public function status()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $grupo = $session->get('utype');
            //$data = $model->update_state($user_id);


            switch ($grupo) {
                case 1:
                    //Administrador

                    echo "i es igual a 0";
                    break;

                case 2:
                    //Back office
                    $model->update_admin($user_id);
                    $data = base_url('/Mattes/Back_office/Mensajes');
                    return $this->respond($data, 200);
                    break;

                case 3:
                    //Arrendador
                    $data = base_url('/avisos-propietario');
                    return $this->respond($data, 200);
                    break;

                case 4:
                    //Arrendatario
                    $data = base_url('/mensajes');
                    return $this->respond($data, 200);
                    break;

                case 5:
                    //Agente
                    $data = base_url('/Mattes/Arrendador/Propiedades');
                    return $this->respond($data, 200);
                    break;
            }
        }
    }

    public function notificaciones_visitas()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 1)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        }
    }

    public function notificaciones_preguntas()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 2)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        }
    }

    public function notificaciones_cominucacion()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 3)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        }
    }
}
