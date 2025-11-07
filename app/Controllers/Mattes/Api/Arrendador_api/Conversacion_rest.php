<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');
helper('sendmail');

class Conversacion_rest extends ResourceController 
{
    use ResponseTrait;
    
    public function index(){
        
    }

    public function questions(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $id_propiedad = $_POST['propiedad'];
            $dudas = $_POST['dudas'];
            $arr = array("<",">","/");
            $newduda = str_replace($arr, "", $dudas);
            
            $model_propiedad =  model('App\Models\Mattes\Arrendador_models\Propiedad');
            $model_detalles = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');

            

            $propietario = $model_propiedad->get_propietario($id_propiedad);
            $id_propietario = $propietario[0]['id_user'];
            $data_group = $model_users->get_group($id_propietario);
            $group = $data_group[0]['id_group'];
            $email_send = $model_users->get_email($id_propietario);
            $nombre = $model_datos->get_propietario($id_propietario);
            $propiedad = $model_propiedad->get_propiedad($id_propiedad);
            $data_uni = $model_detalles->get_university_id($id_propiedad);
            $university = $data_uni[0]['id_university'];
        
            $data = [
                'property_id' => $id_propiedad,
                'question' => $newduda,
                'user_id' => $user_id,
                'university_id' => $university
            ];

            if($group == 5){
                $correo = $email_send[0]['email'];
                $asunto = "NUEVO MENSAJE";
                $file = null;
                $datos['texto'] = " ha recibido una nueva pregunta en la propiedad ".$propiedad[0]['name'];
                $datos['usuario'] = $nombre[0]['name'];
                //$datos['propiedad'] = ;
                $datos['url'] = "/Mattes/Arrendador/Propiedades";

                $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                $send_email = send_email($correo, $asunto, $mensaje, $file);

                $question = $model_questions->insert($data);
            } else {
                $data_notis = $model_notis->get_notis_msg($id_propietario);
                
                if(!isset($data_notis[0]['email'])){
                    $question = $model_questions->insert($data);
                } else {
                    $email = $data_notis[0]['email'];
                    $mensajes = $data_notis[0]['message'];
    
                    if($email == "1" AND $mensajes == "1"){
                        $correo = $email_send[0]['email'];
                        $asunto = "NUEVO MENSAJE";
                        $file = null;
                        $datos['texto'] = " ha recibido una nueva pregunta sobre la propiedad ".$propiedad[0]['name'];
                        $datos['usuario'] = $nombre[0]['name'];
                        //$datos['propiedad'] = ;
                        $datos['url'] = "/Mattes/Arrendador/Propiedades";
    
                        $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);
    
                        $send_email = send_email($correo, $asunto, $mensaje, $file);
    
                        $question = $model_questions->insert($data);
                    } else {
                        $question = $model_questions->insert($data);
                    }
                }
            }

            $this->insert_notificacion($id_propiedad);

           if($question){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'PREGUNTA ENVIADA',
                        'id_conversation' => $question
                    ]
                ];
                return $this->respondCreated($response);   
        
            } else {
        
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ERROR AL ENVIAR PREGUNTA'
                    ]       
                ];
                return $this->respondCreated($response);   
            }

        }
        
    }

    public function get_questions_prop(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $data['data'] = $model_questions->get_questions_prop($user_id);
            //var_dump($data);
            return $this->respond($data, 200);
        
        }
    }

    public function get_questions_alumno(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $data['data'] = $model_questions->get_questions_alumno($user_id);
            //var_dump($data);
            return $this->respond($data, 200);
        
        }
    }

    public function get_questions_agente(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
            $data['data'] = $model_questions->get_questions_agente($user_id);
            //var_dump($data);
            return $this->respond($data, 200);
        
        }
    }

    public function answer(){
        $model_questions = model('App\Models\Mattes\Arrendador_models\Model_questions');
        $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
        $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_propiedad =  model('App\Models\Mattes\Arrendador_models\Propiedad');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');

        $id_question = $_POST['question'];
        $answer = $_POST['answer'];
        $id_renter = $_POST['id_renter_q'];
        $status = 1;

        $arr = array("<",">","/");
        $newres = str_replace($arr, "", $answer);

        $propiedad_id = $model_questions->get_id_prop($id_question);
        $id_propiedad = $propiedad_id[0]['property_id'];
        $data_notis = $model_notis->get_notis_msg($id_renter);
        $nombre = $model_alumno->get_name($id_renter);
        $email_s = $model_users->get_email($id_renter);
        $propiedad = $model_propiedad->get_propiedad($id_propiedad);

        $data = [
            'answer' => $newres,
            'status' => $status
        ];

        if(!isset($data_notis[0]['email'])){
            //var_dump($data_notis[0]['email']);
            $answer_res = $model_questions->update($id_question, $data);
        } else{
            //var_dump($data_notis[0]['email']);
            $email = $data_notis[0]['email'];
            $mensajes = $data_notis[0]['message'];

            if($email == "1" AND $mensajes == "1"){
                $correo = $email_s[0]['email'];
                $asunto = "NUEVO MENSAJE";
                $file = null;
                $datos['texto'] = " su pregunta sobre la propiedad ".$propiedad[0]['name']." ha sido contestada";
                $datos['usuario'] = $nombre[0]['name'];
                //$datos['propiedad'] = ;
                $datos['url'] = "/Mattes/Arrendatario/Mensajes";


                $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                $send_email = send_email($correo, $asunto, $mensaje, $file);
                $answer_res = $model_questions->update($id_question, $data);

            } else {
                $answer_res = $model_questions->update($id_question, $data);
            }
        }
        $this->insert_notificacion2($id_renter);
         

        if($answer_res){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'RESPUESTA ENVIADA CON EXITO',
                    'id_question' => $id_question
                ]
            ];
            return $this->respondCreated($response);   

        } else {

            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'ERROR AL ENVIAR LA RESPUESTA'
                ]       
            ];
            return $this->respondCreated($response);   
        } 
    }

    public function get_datos() {
        $acceso = Acceso();
        if($acceso) {
            
            $id_propiedad = $_POST['id_propiedad'];
            $session = session();
            $user_id = $session->get('unique');
            //$type_group = $session->get('utype');

            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $model_arrendatario = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $data['propiedad'] = $model_propiedad->get_datos($id_propiedad);
            $data['usuario'] = $model_arrendatario->get_nombre($user_id);
        
            return $this->respond($data, 200); 
        } 
    }

    public function get_datos_arrendador(){
        $acceso = Acceso();
        if($acceso) {
            $id_propiedad = $_POST['id_propiedad'];
            $id_arrendatario = $_POST['id_renter'];
            
            $session = session();
            $user_id = $session->get('unique');
            $type_group = $session->get('utype');

            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $model_arrendatario = model('App\Models\Mattes\Arrendatario_Models\Model_identity');

            $data['propiedad'] = $model_propiedad->get_datos($id_propiedad);
            $data['usuario'] = $model_arrendatario->get_nombre($id_arrendatario);
            
            //var_dump($data);
            return $this->respond($data, 200); 
        } 
    }

    public function get_convers_agente(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');

            $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');

            $data['data'] = $model_conversation->get_convers_agente($user_id);
            return $this->respond($data, 200); 
        } 
    }

    public function insert_notificacion($id_propiedad){
        $model = model('App\Models\Mattes\General\Notificaciones');
        $model_propiedad =  model('App\Models\Mattes\Arrendador_models\Propiedad');
        $id_user = $model_propiedad->select('id_user')->where('id',$id_propiedad)->find();

        $data = [	
            'state' =>	0,
            'id_user_receptor' => $id_user[0]['id_user'],	
            'date' => date("Y-m-d h:i:s"),
            'id_type' => 2
        ];

        $model->insert($data);

    
    }

    public function insert_notificacion2($id_user){
        $model = model('App\Models\Mattes\General\Notificaciones');
      
        $data = [	
            'state' =>	0,
            'id_user_receptor' => $id_user,	
            'date' => date("Y-m-d h:i:s"),
            'id_type' => 2
        ];

        $model->insert($data);

    
    }

    public function noti_visitas(){
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $grupo = $session->get('utype');
            $model->update_state($user_id, $tipo = 1);

            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 1)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        
        }
    }

    public function noti_preguntas(){
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $grupo = $session->get('utype');
            $model->update_state($user_id, $tipo = 2);

            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 2)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        
        }
    }

    public function noti_comunicacion(){
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $grupo = $session->get('utype');
            $model->update_state($user_id, $tipo = 3);

            $model = model('App\Models\Mattes\General\Notificaciones');
            $session = session();
            $user_id = $session->get('unique');
            $data = $model->where('id_user_receptor', $user_id)->where('state', 0)->where('id_type', 3)->findAll();
            $total = count($data);
            return $this->respond($total, 200);
        
        }
    }


    /*CONVERSACION CHAT */

    /* public function insert_conversation(){
        $acceso = Acceso();
        if($acceso) {
            $json = $this->request->getJSON();
            $session = session();
            $group_id = $session->get('utype');
            $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');

            $id_renter = $json->id_renter;
            $id_propiedad = $json->id_propiedad;
            
            $conversation_id = $model_conversation->get_id($id_renter, $id_propiedad);
            

            //var_dump($conversation_id);

            if($group_id == 3 or $group_id == 5) { //ARRENDADOR O AGENTE
                $user_id = $session->get('unique');
                $fecha=  date("Y-m-d H:i:s");

                if($conversation_id){
                    $conversacion = $conversation_id[0]['id'];
                    $response =[
                        'id_conversacion' => $conversacion,
                        'id_propiedad' => $id_propiedad
                    ];
                } else {
                    $data = [
                        'property_id' => $id_propiedad,
                        'arrendatario_id' => $id_renter,
                        'arrendador_id' => $user_id,
                        'date' => $fecha
                    ];
    
                    $conversation = $model_conversation->insert($data);
icono de mercado pago
                    $response =[
                        'id_conversacion' => $conversation,
                        'id_propiedad' => $id_propiedad 
                    ];
                }
                
                return $this->respond($response, 200);
            } else {
                $model_propiedad =  model('App\Models\Mattes\Arrendador_Models\Propiedad');
                $propietario = $model_propiedad->get_propietario($id_propiedad);
                $id_propietario = $propietario[0]['id_user'];
                $user_id = $session->get('unique');
                $fecha=  date("Y-m-d H:i:s");

                //var_dump($id_propietario);

                if($conversation_id){
                    $conversacion = $conversation_id[0]['id'];
                    $response =[
                        'id_conversacion' => $conversacion,
                        'id_propiedad' => $id_propiedad
                    ];
                } else {
                    $data = [
                        'property_id' => $id_propiedad,
                        'arrendatario_id' => $user_id,
                        'arrendador_id' => $id_propietario,
                        'date' => $fecha
                    ];
    
                    $conversation = $model_conversation->insert($data);

                    $response =[
                        'id_conversacion' => $conversation,
                        'id_propiedad' => $id_propiedad 
                    ];
                }

                return $this->respond($response, 200);
            } 
        } else {
            return redirect()->to(base_url('Mattes/Login'));
        } 
    } */

    /* public function chat_box(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $group_id = $session->get('utype');
            $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
            $model_messages = model('App\Models\Mattes\Arrendador_models\Model_messages');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_datos = model('App\Models\Mattes\Arrendador_Models\Datos_propietario');
            $model_propiedad =  model('App\Models\Mattes\Arrendador_Models\Propiedad');

            $user_id = $session->get('unique');
            $id_propiedad = $_POST['propiedad'];
            $id_renter = $_POST['renter'];
            $msg = $_POST["contestacion"];
            $fecha=  date("Y-m-d H:i:s");

            $propietario = $model_propiedad->get_propietario($id_propiedad);
            $id_propietario = $propietario[0]['id_user'];
            $propiedad = $model_propiedad->get_propiedad($id_propiedad);

            if($group_id == 3 or $group_id == 5){ // ENVIADO POR ARRENDADOR O AGENTE
                $nombre = $model_alumno->get_name($id_renter);
                $user_send = $model_datos->get_propietario($id_propietario);
                $submit = 0;
                $data_notis = $model_notis->get_notis_msg($id_renter);
                $email_send = $model_users->get_email($id_renter);
            } else { // ENVIADO POR ARRENDATARIO/ALUMNO
                $user_send = $model_alumno->get_name($id_renter);
                $data_notis = $model_notis->get_notis_msg($id_propietario);
                $email_send = $model_users->get_email($id_propietario);
                $nombre = $model_datos->get_propietario($id_propietario);
                $submit = 1;
            }

            $conversation_id = $model_conversation->get_id($id_renter, $id_propiedad);
            $conversacion = $conversation_id[0]['id'];
                
            $data_msg = [
                'conversation_id' => $conversacion,
                'msg' => $msg,
                'submit_msg' => $submit,
                'submit_date' => $fecha
            ];

            $email = $data_notis[0]['email'];
            $mensajes = $data_notis[0]['message'];

            
            if($email == "1" AND $mensajes == "1"){
                $correo = $email_send[0]['email'];
                $asunto = "NUEVO MENSAJE";
                $file = null;
                $datos['usuario'] = $nombre[0]['name'];
                $datos['user_send'] = $user_send[0]['name'];
                $datos['propiedad'] = $propiedad[0]['name'];
                $datos['conversacion'] = $conversacion;
                $datos['id_propiedad'] = $id_propiedad;

                $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);

                $send_email = send_email($correo, $asunto, $mensaje, $file);
                $messages = $model_messages->insert($data_msg);

                //var_dump($datos);
            } else {
                $messages = $model_messages->insert($data_msg);
            }
    
            if($messages !=null or $messages !=""){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'MENSAJE ENVIADO',
                        'id_conversation' => $conversacion
                    ]
                ];
                return $this->respondCreated($response);   
        
            } else {
        
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ERROR AL ENVIAR MENSAJE'
                    ]       
                ];
                return $this->respondCreated($response);   
            } 
            
            
        } 

    } */

    /* public function get_messages(){
        $id_conversacion = $_POST['id_conversacion'];
        $model_messages = model('App\Models\Mattes\Arrendador_models\Model_messages');

        $data = $model_messages->get_messages($id_conversacion);
        
        return $this->respond($data, 200); 
    } */

    
}