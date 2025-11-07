<?php 

namespace App\Controllers\Mattes\Api\Arrendatario_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');
helper('sendmail');

class Agendarcita_rest extends ResourceController 
{
    use ResponseTrait;
    
    public function index(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            
            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $json = $this->request->getJSON();
            $id_propiedad  = $json->id_propiedad;
            $id_propietario = $json->id_propietario;
            $comentario = $json->observacion;
            $fecha = $json->fecha;
            $date = str_replace('/', '-', $fecha);
            $datetime = date('Y-m-d H:i:s', strtotime($date));
            $status = 500;

            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');

            $data_group = $model_users->get_group($id_propietario);
            $group = $data_group[0]['id_group'];
            $nombre = $model_datos->get_propietario($id_propietario);
            $email_user = $model_users->get_email_prop($id_propietario);
            $propiedad = $model_propiedad->get_propiedad($id_propiedad);

            $data = [
                'id_crofter' => $id_propietario,
                'id_renter' => $user_id,
                'id_property' => $id_propiedad,
                'comment' => $comentario,
                'date_schedule' => $datetime,
                'status' => $status
            ];

            $this->insert_notificacion($id_propietario);
            //$this->estatus($id_propiedad, $status);


            if($group == 5){
                $correo_user = $email_user[0]['email'];
                $asunto = "NOTIFICACION DE CITA";
                $file = null;
                $datos['usuario'] = $nombre[0]['name'];
                $datos['estado'] = "";
                $datos['texto'] = "";
                $datos['inmobiliaria'] = "";
                $datos['reasignar'] = "";
                $datos['propiedad'] = "se ha generado una nueva cita en su propiedad ". $propiedad[0]['name'].".";
                $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                $correo =  array($correo_user,"contacto@mattes.mx");
    
                $email = send_email($correo, $asunto, $mensaje, $file); 
    
                $respuesta_cita = $model_citas->insert($data);
            } else {
                $data_notis = $model_notis->get_notis_prop($id_propietario);

                if(!isset($data_notis[0]['email'])){
                    $respuesta_cita = $model_citas->insert($data);
                
                } else {
                    $email = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];

                    if($email == "1" AND $visitas == "1"){
                        $correo_user = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre[0]['name'];
                        $datos['estado'] = "";
                        $datos['texto'] = "";
                        $datos['inmobiliaria'] = "";
                        $datos['reasignar'] = "";
                        $datos['propiedad'] = "se ha generado una nueva cita en su propiedad ". $propiedad[0]['name'].".";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                        $correo =  array($correo_user,"contacto@mattes.mx");
    
                        $email = send_email($correo, $asunto, $mensaje, $file); 
    
                        $respuesta_cita = $model_citas->insert($data);
                   
                    } else {
                        $respuesta_cita = $model_citas->insert($data);
                    }
                } 
            }
        
            if($respuesta_cita !=null or $respuesta_cita !=""){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'CITA AGREGADA CON EXITO',
                        'id_registro' => $respuesta_cita,
                        'data' => $data
                    ]
                ];
                return $this->respondCreated($response);   

            } else {

                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ERROR AL CREAR LA CITA',
                        'id_registro' => $respuesta_cita,
                        'data' => $data             
                    ]       
                ];
                return $this->respondCreated($response);   
            }
        } else {
            return redirect()->to(base_url('Mattes/Login'));
        }
        
    }

    public function insert_notificacion($id_propietario){
        $model = model('App\Models\Mattes\General\Notificaciones');
        $data = [	
            'state' =>	0,
            'id_user_receptor' => $id_propietario,	
            'date' => date("Y-m-d h:i:s"),
            'id_type' => 1
        ];

        $id = $model->insert($data);

        if($id){
            return true;

        }else{
            return false;
        }

    }

    public function get_fechas(){
        $json = $this->request->getJSON();
        $id_propietario = $json->id_propietario;
        //var_dump($id_propietario);
        $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
        $data = $model_citas->get_citas_alumno($id_propietario);
        return $this->respond($data, 200);
    }

    public function get_citas_prop() {
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $data['data'] = $model_citas->get_citas_prop($user_id);
            return $this->respond($data, 200);
        
        }
    }

    public function get_citas_alumno() {
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $data['data'] = $model_citas->get_citas_renter($user_id);
            return $this->respond($data, 200);
        
        }
    }

    public function get_citas_agente() {
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $data['data'] = $model_citas->get_citas_agente($user_id);
            return $this->respond($data, 200);
        
        }
    }


    public function aceptar_cita(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');

            $json = $this->request->getJSON();
            $id_cita = $json->id_cita;
            $id_renter = $json->id_renter;
            $id_crofter = $json->id_crofter;
            $status = 501;

            //var_dump($id_crofter);
           

            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_datos = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_owner = model('App\Models\Mattes\Arrendador_models\Datos_propietario');

            $this->insert_notificacion($id_renter);

            $data_notis = $model_notis->get_notis($id_renter);
            $nombre = $model_datos->get_name($id_renter);
            $email_user = $model_users->get_email($id_renter);
            //$propiedad = $model_citas->get_name_prop($id_cita);
            $datetime = $model_citas->get_horario($id_cita);
            $fecha = $datetime[0]['date_schedule'];
            $inmobiliaria = $model_owner->get_nombre($user_id);

            $data = [
                'status' => $status
            ];

            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $id_propiedad  = $json->id_propiedad;
            $propiedad = $model_propiedad->get_propiedad($id_propiedad);
            //$this->estatus($id_propiedad, $status);

            //var_dump($propiedad);

            if($id_crofter){
                if(!isset($data_notis[0]['email'])){
                    $email_agente = $model_users->get_email($id_crofter);
                    if(!isset($email_agente[0])){
                        $model_citas->update($id_cita, $data);
                        
                    } else {
                        $nombre_agente = $model_owner->get_nombre($id_crofter);
                        $correo_agent = $email_agente[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
    
                        $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                        $datos['estado'] = "ACEPTADA";
                        $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                        $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad[0]['name'];
                        $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                        $correo =  array($correo_agent,"contacto@mattes.mx");
                        $email = send_email($correo, $asunto, $mensaje, $file);
                        $model_citas->update($id_cita, $data);
                    }
                   
                } else {
                    
                    $email_agente = $model_users->get_email($id_crofter);
                    $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                    $correo_agent = $email_agente[0]['email'];
                    $asunto = "NOTIFICACION DE CITA";
                    $file = null;
                    $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                    $datos['estado'] = "ACEPTADA";
                    $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                    $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad[0]['name'];
                    $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                    $datos['reasignar'] = "";
                    $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                    $correo =  array($correo_agent,"contacto@mattes.mx");
                    $email = send_email($correo, $asunto, $mensaje, $file); 

                    $email_renter = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];
                        
                    if($email_renter == "1" AND $visitas == "1"){
                        $correo_agent = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre[0]['name'];
                        $datos['estado'] = "ACEPTADA";
                        $datos['propiedad'] = $propiedad[0]['name'];
                        $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))."";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);

                        $correo =  array($correo_agent,"contacto@mattes.mx");
                        $email = send_email($correo, $asunto, $mensaje, $file); 
                        
                        $model_citas->update($id_cita, $data);
                       
                    } else {
                        $email_agente = $model_users->get_email($id_crofter);
                        $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                    
                        $correo_agent = $email_agente[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;

                        $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                        $datos['estado'] = "ACEPTADA";
                        $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                        $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad[0]['name'];
                        $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                        $correo =  array($correo_agent,"contacto@mattes.mx");
                        $email = send_email($correo, $asunto, $mensaje, $file);
                        $model_citas->update($id_cita, $data);

                    } 
                     
                
                } 
            } else {
               if(!isset($data_notis[0]['email'])){
                    $model_citas->update($id_cita, $data);
                } else {
                    $email = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];
    
                    if($email == "1" AND $visitas == "1"){
                        $correo_agent = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre[0]['name'];
                        $datos['estado'] = "ACEPTADA";
                        $datos['propiedad'] = $propiedad['name'];
                        $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))."";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);
                        $correo =  array($correo_agent,"contacto@mattes.mx");
        
                        $email = send_email($correo, $asunto, $mensaje, $file); 
                        $model_citas->update($id_cita, $data); 
                       
                    } else {
                        $model_citas->update($id_cita, $data);
                    } 
                }
                
            } 
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CITA ACEPTADA'
                ]
            ]; 
            return $this->respondCreated($response); 
        }    
        
    }

    public function cancelar_cita(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');

            $json = $this->request->getJSON();
            $id_cita = $json->id_cita;
            $id_renter = $json->id_renter;
            $id_crofter = $json->id_crofter;
            $status = 502;

            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_datos = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_owner = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            

            $data_notis = $model_notis->get_notis($id_renter);
            $nombre = $model_datos->get_name($id_renter);
            $email_user = $model_users->get_email($id_renter);
            $propiedad = $model_citas->get_name_prop($id_cita);
            $datetime = $model_citas->get_horario($id_cita);
            $fecha = $datetime[0]['date_schedule'];
            $inmobiliaria = $model_owner->get_nombre($user_id);

            $data = [
                'status' => $status
            ];

            if($id_crofter){
                if(!isset($data_notis[0]['email'])){
                    $email_agente = $model_users->get_email($id_crofter);
                    $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                    
                    $correo_agent = $email_agente[0]['email'];
                    $asunto = "NOTIFICACION DE CITA";
                    $file = null;
                    $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                    $datos['estado'] = "CANCELADA";
                    $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                    $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name'];
                    $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                    $datos['reasignar'] = "";
                    $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
                    $correo =  array($correo_agent,"contacto@mattes.mx");

                    $email = send_email($correo, $asunto, $mensaje, $file); 

                    $model_citas->update($id_cita, $data);
                    $model_citas->delete($id_cita);
                } else {
                    $email_agente = $model_users->get_email($id_crofter);
                    $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                    
                    $correo_agent = $email_agente[0]['email'];
                    $asunto = "NOTIFICACION DE CITA";
                    $file = null;
                    $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                    $datos['estado'] = "CANCELADA";
                    $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                    $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name'];
                    $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                    $datos['reasignar'] = "";
                    $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                    $correo =  array($correo_agent,"contacto@mattes.mx");
                    $email = send_email($correo, $asunto, $mensaje, $file); 
                    
                    $email_renter = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];
    
                    if($email_renter == "1" AND $visitas == "1"){
                        $correo = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre[0]['name'];
                        $datos['estado'] = "CANCELADA";
                        $datos['propiedad'] = $propiedad['name'];
                        $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);
        
                        $email = send_email($correo, $asunto, $mensaje, $file); 
        
                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
                       
                    } else {
                        $email_agente = $model_users->get_email($id_crofter);
                        $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                        $correo = $email_agente[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                        $datos['estado'] = "CANCELADA";
                        $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                        $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name'];
                        $datos['texto'] = "para el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
                        $correo =  array($correo_agent,"contacto@mattes.mx");

                        $email = send_email($correo, $asunto, $mensaje, $file); 
                    
                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
                    }
                }
               
            }else {
                if(!isset($data_notis[0]['email'])){
                    $model_citas->update($id_cita, $data);
                    $model_citas->delete($id_cita);
                } else {
                    $email = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];
    
                    if($email == "1" AND $visitas == "1"){
                        $correo_user = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre[0]['name'];
                        $datos['estado'] = "CANCELADA";
                        $datos['propiedad'] = $propiedad['name'];
                        $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);
                        $correo =  array($correo_user,"contacto@mattes.mx");
                        $email = send_email($correo, $asunto, $mensaje, $file); 
        
                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
                       
                    } else {
                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
                    }
                }
            }

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CITA CANCELADA'
                ]
            ];
            return $this->respondCreated($response);  
        }
        
    }

    public function reasignar_cita(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');

            $id_renter = $_POST['idrenter'];
            $id_cita = $_POST['idcita'];
            $id_crofter = $_POST['idcrofter'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['horasdisp'];
            $status = 500;
            $datetime = $fecha." ".$hora;
            $comentario = $_POST['comentarios'];
        
            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_datos = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_owner = model('App\Models\Mattes\Arrendador_models\Datos_propietario');

            $data_notis = $model_notis->get_notis($id_renter);
            $nombre = $model_datos->get_name($id_renter);
            $email_user = $model_users->get_email($id_renter);
            $propiedad = $model_citas->get_name_prop($id_cita);
            $inmobiliaria = $model_owner->get_nombre($user_id);

            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
            $fecha_entrada = strtotime($datetime);

            if($fecha_actual > $fecha_entrada){
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'NO SE PUEDE RE-AGENDAR UNA CITA EN FECHAS PASADAS'
                    ]
                ];
            }else{
                $data = [
                    'date_schedule' => $datetime,
                    'comment' => $comentario,
                    'status' => $status
                ];


                $this->insert_notificacion($id_renter);

                if($id_crofter){
                    if(!isset($data_notis[0]['email'])){
                        $email_agente = $model_users->get_email($id_crofter);
                        $nombre_agente = $model_owner->get_nombre($id_crofter);
                        
                        
                        $correo = $email_agente[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
    
                        $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                        $datos['estado'] = "REASIGNADA";
                        $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                        $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name']." ha sido ";
                        $datos['texto'] = "";
                        $datos['reasignar'] = "para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora));
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
    
            
                        $email = send_email($correo, $asunto, $mensaje, $file); 
                        $model_citas->update($id_cita, $data);
                    } else {
                        $email_agente = $model_users->get_email($id_crofter);
                        $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                        $correo = $email_agente[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                        $datos['estado'] = "REASIGNADA";
                        $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                        $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name']. " ha sido";
                        $datos['texto'] = "";
                        $datos['reasignar'] = "para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
    
        
                        $email = send_email($correo, $asunto, $mensaje, $file); 
    
                        $email_renter = $data_notis[0]['email'];
                        $visitas = $data_notis[0]['appointment'];
        
                        if($email_renter == "1" AND $visitas == "1"){
                            $correo = $email_user[0]['email'];
                            $asunto = "NOTIFICACION DE CITA";
                            $file = null;
                            $datos['usuario'] = $nombre[0]['name'];
                            $datos['estado'] = "REASIGNADA";
                            $datos['propiedad'] = $propiedad['name'];
                            $datos['texto'] = "";
                            $datos['reasignar'] = " para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                            $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);
        
                            $email = send_email($correo, $asunto, $mensaje, $file); 
        
                            $model_citas->update($id_cita, $data);
                       
                        } else {
                            $email_agente = $model_users->get_email($id_crofter);
                            $nombre_agente = $model_owner->get_nombre($id_crofter);
                    
                    
                            $correo = $email_agente[0]['email'];
                            $asunto = "NOTIFICACION DE CITA";
                            $file = null;
    
                            $datos['usuario'] = $nombre_agente[0]['name']." ".$nombre_agente[0]['first_name'];
                            $datos['estado'] = "REASIGNADA";
                            $datos['inmobiliaria'] ="por la inmobiliaria ".$inmobiliaria[0]['name'];
                            $datos['propiedad'] = "la cita generada en su propiedad ".$propiedad['name']. " ha sido";
                            $datos['texto'] = "";
                            $datos['reasignar'] = "para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                            $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
    
        
                            $email = send_email($correo, $asunto, $mensaje, $file);
                            $model_citas->update($id_cita, $data);
                        }
                    }
                   
                }else {
                    if(!isset($data_notis[0]['email'])){
    
                        $model_citas->update($id_cita, $data);
                    } else {
                        $email_renter = $data_notis[0]['email'];
                        $visitas = $data_notis[0]['appointment'];
        
                        if($email_renter == "1" AND $visitas == "1"){
                            $correo = $email_user[0]['email'];
                            $asunto = "NOTIFICACION DE CITA";
                            $file = null;
                            $datos['usuario'] = $nombre[0]['name'];
                            $datos['estado'] = "REASIGNADA";
                            $datos['propiedad'] = $propiedad['name'];
                            $datos['texto'] = "";
                            $datos['reasignar'] = " para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                            $mensaje = view('Mattes/Arrendatario_view/Correo_citas', $datos);
        
                            $email = send_email($correo, $asunto, $mensaje, $file); 
        
                            $model_citas->update($id_cita, $data);
                       
                        } else {
                            $model_citas->update($id_cita, $data);
                        }
                    }
                }

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'CITA ACTUALIZADA CON EXITO'
                    ]
                ];
            }
        
            return $this->respondCreated($response); 
        }
    }


    public function horas_disp(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $json = $this->request->getJSON();
            $id_cita = $json->id_cita;
            $id_crofter =$json->id_crofter;
            $fecha = $json->fecha;

            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');

            if(isset($id_crofter)){
                $data = $model_citas->horas_disp($user_id, $fecha);
            } else {
                $data = $model_citas->horas_disp($id_crofter, $fecha);              
            }
        
            $array2 = [ ];

            foreach ($data as $key) {
                array_push($array2, $key['horas']);
            }

            $array_horas = [
                "00:00:00","00:30:00",
                "01:00:00","01:30:00",
                "02:00:00","02:30:00",
                "03:00:00","03:30:00",
                "04:00:00","04:30:00",
                "05:00:00","05:30:00",
                "06:00:00","06:30:00",
                "07:00:00","07:30:00",
                "08:00:00","08:30:00",
                "09:00:00","09:30:00",
                "10:00:00","10:30:00",
                "11:00:00","11:30:00",
                "12:00:00","12:30:00",
                "13:00:00","13:30:00",
                "14:00:00","14:30:00",
                "15:00:00","15:30:00",
                "16:00:00","16:30:00",
                "17:00:00","17:30:00",
                "18:00:00","18:30:00",
                "19:00:00","19:30:00",
                "20:00:00","20:30:00",
                "21:00:00","21:30:00",
                "22:00:00","22:30:00",
                "23:00:00","23:30:00",
                
            ];

            $resultado = array_diff($array_horas, $array2);

            $data2 = [];
            foreach ($resultado as $key) {
                array_push($data2, $key);
            }
            //var_dump($data2);
            return $this->respond($data2, 200);
        }
        
    } 

    public function cancelar_cita_alumno(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');

            $json = $this->request->getJSON();
            $id_cita = $json->id_cita;
            $id_crofter = $json->id_crofter;
            $status = 502;

            $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
            $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
            $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');

            $data_group = $model_users->get_group($id_crofter);
            //var_dump($data_group);
            $group = $data_group[0]['id_group'];
            $nombre = $model_datos->get_nombre($id_crofter);
            $email_user = $model_users->get_email($id_crofter);
            $propiedad = $model_citas->get_name_prop($id_cita);
            $datetime = $model_citas->get_horario($id_cita);
            $fecha = $datetime[0]['date_schedule'];
            $propietario = $nombre[0]['name']." ".$nombre[0]['first_name']." ".$nombre[0]['second_name'];

            $data = [
                'status' => $status,
            ];

            $this->insert_notificacion($id_crofter);

            if($group == 5){
                $correo = $email_user[0]['email'];
                $asunto = "NOTIFICACION DE CITA";
                $file = null;
                $datos['usuario'] = $propietario;
                
                $datos['estado'] = "CANCELADA";
                $datos['inmobiliaria'] ="";
                $datos['propiedad'] = "la cita que habia sido generada en su propiedad ".$propiedad['name'];
                $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                $datos['reasignar'] = "";
                $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                $email = send_email($correo, $asunto, $mensaje, $file); 

                $model_citas->update($id_cita, $data);
                $model_citas->delete($id_cita);
            } else {
                $data_notis = $model_notis->get_notis($id_crofter);

                if(!isset($data_notis[0]['email'])){

                    $model_citas->update($id_cita, $data);
                    $model_citas->delete($id_cita);
                } else {
                    $email = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];


                    if($email == "1" AND $visitas == "1"){
                        $correo = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $propietario;
                
                        $datos['estado'] = "CANCELADA";
                        $datos['inmobiliaria'] ="";
                        $datos['propiedad'] = "la cita que habia sido generada en su propiedad ".$propiedad['name'];
                        $datos['texto'] = "el dia ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($fecha))." ha sido ";
                        $datos['reasignar'] = "";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                        $email = send_email($correo, $asunto, $mensaje, $file); 

                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
               
                    } else {
                        $model_citas->update($id_cita, $data);
                        $model_citas->delete($id_cita);
                    }
                }
            }

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CITA CANCELADA'
                ]
            ];
            return $this->respondCreated($response); 
        }
        
    }

    public function reasignar_cita_alumno(){
        $id_crofter = $_POST['id_crofter'];
        $id_cita = $_POST['idcita'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['horasdisp'];
        $comentario = $_POST['comentarios'];
        $datetime = $fecha." ".$hora;
        $status = 500;

        //var_dump($id_cita);

        // MODELOS
        $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
        $model_notis = model('App\Models\Mattes\Arrendador_models\Accesos_Notificaciones');
        $model_datos = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');

        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($datetime);

        if($fecha_actual > $fecha_entrada){
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'NO SE PUEDE RE-AGENDAR UNA CITA EN FECHAS PASADAS'
                ]
            ];
        }else{
            $data_group = $model_users->get_group($id_crofter);
            $group = $data_group[0]['id_group'];

            $nombre = $model_datos->get_nombre($id_crofter);
            $email_user = $model_users->get_email($id_crofter);
            $propiedad = $model_citas->get_name_prop($id_cita);
            $propietario = $nombre[0]['name']." ".$nombre[0]['first_name']." ".$nombre[0]['second_name'];
            $this->insert_notificacion($id_crofter);

            $data = [
                'date_schedule' => $datetime,
                'comment' => $comentario,
                'status' => $status
            ];

            if($group == 5){
                $correo = $email_user[0]['email'];
                $asunto = "NOTIFICACION DE CITA";
                $file = null;
                $datos['usuario'] = $propietario;
            
                $datos['estado'] = "REASIGNADA";
                $datos['inmobiliaria'] ="";
                $datos['propiedad'] = "la cita que habia sido generada en su propiedad ".$propiedad['name']. " ha sido";
                $datos['texto'] = "";
                $datos['reasignar'] = " para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);

                $email = send_email($correo, $asunto, $mensaje, $file); 

                $model_citas->update($id_cita, $data);
            } else {
                $data_notis = $model_notis->get_notis($id_crofter);
                if(!isset($data_notis[0]['email'])){
                
                    $model_citas->update($id_cita, $data);
                } else {
                    $email = $data_notis[0]['email'];
                    $visitas = $data_notis[0]['appointment'];
    
                    if($email == "1" AND $visitas == "1"){
                        $correo = $email_user[0]['email'];
                        $asunto = "NOTIFICACION DE CITA";
                        $file = null;
                        $datos['usuario'] = $propietario;
                    
                        $datos['estado'] = "REASIGNADA";
                        $datos['inmobiliaria'] ="";
                        $datos['propiedad'] = "la cita que habia sido generada en su propiedad ".$propiedad['name']. " ha sido";
                        $datos['texto'] = "";
                        $datos['reasignar'] = " para la siguiente fecha ".date("d-m-Y", strtotime($fecha))." a las ".date("H:i", strtotime($hora))."";
                        $mensaje = view('Mattes/Arrendador_view/Correo_citas', $datos);
    
                        $email = send_email($correo, $asunto, $mensaje, $file); 
    
                        $model_citas->update($id_cita, $data);
                       
                    } else {
                        $model_citas->update($id_cita, $data);
                    }
                }
            }
            
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'CITA ACTUALIZADA CON EXITO'
                ]
            ];
        }

        return $this->respondCreated($response);

    }


    public function estatus($id_propiedad, $status){   
        $model_prop_x_status = model('App\Models\Mattes\Back_office_models/Model_property_admin');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');

        $status_propiedad = [
            'status' => $status
        ];
        $model_propiedad->update($id_propiedad, $status_propiedad);

       /*  $status_prop = [
            'id_property' => $id_propiedad ,
            'id_status' => $status
        ];
        $model_prop_x_status->insert($status_prop);    */   
    }

    public function get_datos_cita(){
        $json = $this->request->getJSON();
        $model_citas = model('App\Models\Mattes\Arrendatario_Models\Model_citas');
        $id_cita = $json->id_boton;
        $data = $model_citas->get_datos_cita($id_cita);
        return $this->respond($data, 200);
    }


}