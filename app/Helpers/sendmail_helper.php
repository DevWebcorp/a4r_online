
<?php

if(!function_exists('send_email')) {

    function send_email($mail_to,$subject,$message,$file_path) {
        /* $email_from = "registro@redmedicasegura.com"; */
        $email_from = "giovanni.zavala@soluciones.webcorp.com.mx";

      
        $email = \Config\Services::email();

        if($file_path!=null){
            foreach ($file_path as $valor){
                $email->attach($valor);
                $email->setTo($mail_to);
                $email->setFrom($email_from);
                $email->setSubject($subject);
                $email->setMessage($message);     
            }
            if($email->send()){
                return true;
            }else{
                return false;
            }
        }else{
            $email->setTo($mail_to);
            $email->setFrom($email_from);
            $email->setSubject($subject);
            $email->setMessage($message);
            if($email->send()){
                return true;
            }else{
                return false;
            }// end else
        }// end else
    }// end Send mail
}


?>