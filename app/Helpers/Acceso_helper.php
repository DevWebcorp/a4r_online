<?php
if(!function_exists('Acceso')) {
    function Acceso() {
        $session = session();
        if($session->get('logged_in') == true and $session->has('token')){
            return true;
        }else{
            return false;

        }
    }
}

if(!function_exists('Primeravez')) {
    function Primeravez() {
        $session = session();
        $model= model('App\Models\Mattes\Arrendador_models/Primeravez');
        $activo = count($model->where('id_user',$session->get('unique'))->find());
        $activo = $activo > 0 ? true : false;
       return $activo;
      
    }
}

?>