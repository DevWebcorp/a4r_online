<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');
helper('sendmail');


class ConversacionBO_rest extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
    }

    public function insert_conver(){
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
            $id_renter = $_POST['id_usuario'];
            $fecha = date("Y-m-d H:i:s");
            $conversation_id = $model_conversation->get_id($id_renter);

            if (isset($conversation_id[0])) {
                $id_conversacion = $conversation_id[0]['id'];
                //var_dump($id_conversacion);
            } else {
                $data = [
                    'arrendatario_id' => $id_renter,
                    'arrendador_id' => 1,
                    'date' => $fecha
                ];

                $id_conversacion = $model_conversation->insert($data);

            }

            return $this->respond( $id_conversacion, 200);
        }
    }

    public function chat_box()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $group_id = $session->get('utype');
            $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
            $model_messages = model('App\Models\Mattes\Arrendador_models\Model_messages');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_propiedad =  model('App\Models\Mattes\Arrendador_models\Propiedad');

            $id_renter = $_POST['renter'];
            $id_conver = $_POST['conver_id'];
            $msg = $_POST["contestacion"];
            $fecha =  date("Y-m-d H:i:s");
            $arr = array("<", ">", "/");
            $newmsg = str_replace($arr, "", $msg);
            $group_renter = $model_users->get_group($id_renter);
            $group_r = $group_renter[0]['id_group'];

            if ($group_r == "4") {
                $nombre = $model_alumno->get_name($id_renter);
                $datos['url'] = "/Mattes/Arrendatario/Mensajes";
            } else {
                $nombre = $model_datos->get_name($id_renter);
                $datos['url'] = "/Mattes/Arrendador/Propiedades";
            }

            if ($group_id == 2) {
                $submit_msg = 0;
                $notis_msg = $model_notis->get_notis_msg($id_renter);
                $data_correo = $model_users->get_email($id_renter);
                $correo = $data_correo[0]['email'];

                if (isset($notis_msg[0])) {
                    $n_email = $notis_msg[0]['email'];
                    $n_msg = $notis_msg[0]['message'];
                } else {
                    $n_email = 0;
                    $n_msg = 0;
                }
            } else {
                $submit_msg = 1;
                $id_back = 1;
                $data_correo = $model_users->get_email($id_back);
                $correo = $data_correo[0]['email'];
            }

            if ($id_renter == "" OR $id_conver == "") {
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ERROR AL ENVIAR MENSAJE'
                    ]
                ];
            } else {
                $id_conversacion = $id_conver;

                    $data_msg = [
                        'conversation_id' => $id_conversacion,
                        'msg' => $newmsg,
                        'submit_msg' => $submit_msg,
                        'submit_date' => $fecha
                    ];


                    if ($group_id == 2) {
                        if ($group_r == 5) {
                            $asunto = "NUEVO MENSAJE";
                            $file = null;
                            $datos['usuario'] = $nombre[0]['name'];
                            $datos['texto'] = " Ha recibido un mensaje por parte de Mattes.";

                            $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                            $send_email = send_email($correo, $asunto, $mensaje, $file);
                            $messages = $model_messages->insert($data_msg);
                            $this->insert_notificacion($id_renter);


                        } else {
                            if ($n_email == 1 && $n_msg == 1) {
                                $asunto = "NUEVO MENSAJE";
                                $file = null;
                                $datos['usuario'] = $nombre[0]['name'];
                                $datos['texto'] = " ha recibido un mensaje por parte de Mattes.";

                                $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                                $send_email = send_email($correo, $asunto, $mensaje, $file);
                                $messages = $model_messages->insert($data_msg);
                                $this->insert_notificacion($id_renter);
                            } else {
                                $messages = $model_messages->insert($data_msg);
                                $this->insert_notificacion($id_renter);
                            }
                        }
                    } else {
                        $asunto = "NUEVO MENSAJE";
                        $file = null;
                        $datos['usuario'] = "Mattes";
                        $datos['texto'] = " Ha recibido un mensaje por parte de Mattes.";
                        $datos['url'] = "/Mattes/Back_office/Mensajes";

                        $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                        $send_email = send_email($correo, $asunto, $mensaje, $file);
                        $messages = $model_messages->insert($data_msg);
                        $this->insert_notificacion($id_renter);
                    }

                    if ($messages != null or $messages != "") {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'MENSAJE ENVIADO',
                                'id_conversation' => $id_conversacion,
                                'msg' => $newmsg
                            ]
                        ];
                    } else {

                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'ERROR AL ENVIAR MENSAJE'
                            ]
                        ];
                    }
            }

            return $this->respondCreated($response);
        }
    }

    public function get_messages()
    {
        $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
        $model_messages = model('App\Models\Mattes\Arrendador_models\Model_messages');

        $id_user = $_POST['id_usuario'];
        $conversation_id = $model_conversation->get_id($id_user);

        if ($conversation_id) {
            $id_conversacion = $conversation_id[0]['id'];
            $data = $model_messages->get_messages($id_conversacion);
        } else {
            $data = [];
        }

        return $this->respond($data, 200);
    }

    public function get_convers()
    {
        $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');

        $data['data'] = $model_conversation->get_conversations();
        return $this->respond($data, 200);
    }

    public function get_datos() {   
        $id_user = $_POST['id_usuario'];
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');

        $group = $model_users->get_group($id_user);
        $id_group = $group[0]['id_group'];

        if ($id_group == 4) {
            $name = $model_alumno->get_nombre($id_user);

            if (!isset($name)) {
                $data = "";
            } else {
                $nombre = $name[0]['name'];
                $ap = $name[0]['first_name'];
                $am = $name[0]['second_name'];
                $data = $nombre . " " . $ap . " " . $am;
            }
        } else {
            $name = $model_datos->get_nombre($id_user);
            if (!isset($name)) {
                $data = "";
            } else {
                $nombre = $name[0]['name'];
                $ap = $name[0]['first_name'];
                $am = $name[0]['second_name'];
                $data = $nombre . " " . $ap . " " . $am;
            }
        }

        return $this->respond($data, 200);
    }

    public function insert_notificacion($id_user)
    {
        $model = model('App\Models\Mattes\General\Notificaciones');

        $data = [
            'state' =>    0,
            'id_user_receptor' => $id_user,
            'date' => date("Y-m-d h:i:s"),
            'id_type' => 3
        ];

        $model->insert($data);
    }

    public function status(){
        $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
        $model_messages = model('App\Models\Mattes\Arrendador_models\Model_messages');

        $id_user = $_POST['id_usuario'];
        $conversation_id = $model_conversation->get_id($id_user);

        if ($conversation_id) {
            $id_conversacion = $conversation_id[0]['id'];
            $model_messages->update_state($id_conversacion);
            return true;
        } else {
            return false;
        }
    }


}
