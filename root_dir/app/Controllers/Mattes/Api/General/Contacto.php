<?php

namespace App\Controllers\Mattes\Api\General;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('sendmail');

class Contacto extends ResourceController
{
    public function sendMail(){
        $request = \Config\Services::request();
        $mensaje = "Nombre: ".$request->getPost('nombre')."<br>"
        ."Correo Electronico: ".$request->getPost('correo')."<br>"
        ."En que te podemos ayudar: " .$request->getPost('datos');
        $asunto = "Contacto Mattes";
        $file = null;
        $email = send_email("contacto@mattes.mx", $asunto, $mensaje, $file);
        if($email){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'SOLICITUD ENVIADA'
                ]
            ]; 
            return $this->respondCreated($response); 

        }else{
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROE INTENTALO MÁS TARDE'
                ]
            ]; 
            return $this->respondCreated($response); 
        }

        
    }
  

}