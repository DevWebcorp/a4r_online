<?php
if(!function_exists('AlumnoVerify')) {
    function AlumnoVerify() {
        $session = session();
        $user_id = $session->get('unique');
        $model_profile = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $acces = $model_profile->verify($user_id);
        
        if(!empty($acces)){
            return True;
        }
        return False;
    }
}
?>