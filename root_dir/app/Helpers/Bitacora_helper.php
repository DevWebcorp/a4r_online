<?php
if(!function_exists('bitacora')) {
    function bitacora($ip,$id_user,$accion,$modulo) {
        $model_bitacora = model('App\Models\Model_bitacora');
        $bitacora = [
            'ip' => $ip, 
            'user' => $id_user,
            'modulo' => $modulo,
            'accion' => $accion,
            'fecha' => date("Y-m-d h:i:s"),       
        ];
        $model_bitacora->insert($bitacora);
        return true;
    }
}
?>