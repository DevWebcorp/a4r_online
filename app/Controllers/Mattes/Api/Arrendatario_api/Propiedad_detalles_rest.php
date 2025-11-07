<?php

namespace App\Controllers\Mattes\Api\Arrendatario_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');
helper('sendmail');

class Propiedad_detalles_rest extends ResourceController
{
    use ResponseTrait;

    public function index() {}

    public function get_detalles()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $id_propiedad = $_POST['id_propiedad'];
            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $propietario  = $model_propiedad->select('id_user')->where('id', $id_propiedad)->find();
            $id_propietario = $propietario[0]['id_user'];
            $parent = $model_users->select('id_parent')->where('id', $id_propietario)->find();
            $id_parent = $parent[0]['id_parent'];
            //var_dump($parent);
            $data['detalles'] = $model_propiedad->get_detalles($id_propiedad, $id_parent);
            $model_files = model('App\Models\Mattes\Arrendador_models\Files');
            $data['images'] = $model_files->get_images_detalle($id_propiedad);
            $model_favorite = model('App\Models\Mattes\Arrendatario_Models\Model_favoritos');
            $data['favorito'] = $model_favorite->get_id_fav($id_propiedad, $user_id);
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $data['questions'] = $model_questions->get_questions($id_propiedad);
            $model_comment = model('App\Models\Mattes\Arrendatario_Models\Model_opinions');
            $data['opinions'] = $model_comment->get_opinions($id_propiedad);
            //var_dump($data);
            return $this->respond($data, 200);
        } else {
            $id_propiedad = $_POST['id_propiedad'];
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $propietario  = $model_propiedad->select('id_user')->where('id', $id_propiedad)->find();
            $id_propietario = $propietario[0]['id_user'];
            $parent = $model_users->select('id_parent')->where('id', $id_propietario)->find();
            $id_parent = $parent[0]['id_parent'];
            $data['detalles'] = $model_propiedad->get_detalles($id_propiedad, $id_parent);
            $model_files = model('App\Models\Mattes\Arrendador_models\Files');
            $data['images'] = $model_files->get_images_detalle($id_propiedad);
            $data['favorito'] = 0;
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $data['questions'] = $model_questions->get_questions($id_propiedad);
            $model_comment = model('App\Models\Mattes\Arrendatario_Models\Model_opinions');
            $data['opinions'] = $model_comment->get_opinions($id_propiedad);
            //var_dump($data);
            return $this->respond($data, 200);
        }
    }

    public function add_contacto()
    {
        $request = \Config\Services::request();
        $session = session();
        $user_id = $session->get('unique');

        $model_contacto = model('App\Models\Mattes\Arrendatario_Models\Model_contacto');
        $model_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
        $model_prop = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
        $tel = $model_student->select('phone,name,first_name,second_name')->where('id_user', $user_id)->first();

        $id_propietario = $model_propiedad->select('id_user')->where('id', $request->getPost('id_propiedad'))->find()[0]['id_user'];
        $correo_user = $model_users->select('email')->where('id', $id_propietario)->find()[0]['email'];
        $nombre = $model_prop->select('name')->where('id_user', $id_propietario)->find();
        $propiedad = $model_propiedad->select('name')->where('id', $request->getPost('id_propiedad'))->find();

        $asunto = "Contacto por WhatsApp";
        $file = null;
        $datos['texto'] = " un usuario ha intentado ponerse en contacto con usted a través de WhatsApp, por la propiedad " . $propiedad[0]['name'];
        $datos['usuario'] = $tel['name'] . " " . $tel['first_name'] . " " . $tel['second_name'];
        $datos['telefono'] = $tel['phone'];
        $datos['propiedad'] = $propiedad[0]['name'];
        // $datos['url'] = "/Mattes/Arrendador/Propiedades";


        // $correo =  array("belcros90@gmail.com");
        //$email = send_email($correo, $asunto, $mensaje, $file); 


        //, "miguel.gomez@soluciones.webcorp.com.mx"


        $data = [
            'id_propiedad' => $request->getPost('id_propiedad'),
            'id_arrendatario' => $user_id,
            'tel_arrendatario' => $tel['phone'],
            'tel_arrendador' => $request->getPost('tel_arrendador')
        ];

        $respuesta = $model_contacto->insert($data);

        if ($respuesta) {
            $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);
            $correo =  array("administracion@webcorp.com.mx", "contacto@mattes.mx", "belcros90@gmail.com");
            $email = send_email($correo, $asunto, $mensaje, $file);

            if($email){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'AGREGADO CON EXITO',
                    ]
                ];
                return $this->respondCreated($response);
            }else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'INTENTALO MAS TARDE'
                    ]
                ];
                
                return $this->respondCreated($response);

            }

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
