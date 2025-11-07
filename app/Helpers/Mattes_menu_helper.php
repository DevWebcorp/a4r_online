<?php

if(!function_exists('Mattes_menu')) {
   
    function Mattes_menu() {
        $session = session();
        $user_id = $session->get('unique');
        $model_tradename = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $data_tradename = $model_tradename->get_tradename($user_id);
        if(isset($data_tradename[0]->id_tradename)){
            $tradename = $data_tradename[0]->id_tradename;
            
        } else {
            $tradename = "0";
            
        }
        
        return $tradename;
    }// mattes_menu
}


?>