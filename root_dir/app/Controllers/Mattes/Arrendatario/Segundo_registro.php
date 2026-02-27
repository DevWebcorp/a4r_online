<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;

class Segundo_registro extends BaseController
{
   
    public function index(){

      $session = session();
      $user_id = $session->get('unique');
      $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
      $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
      $data_menu['verificado'] = $verificado;
      
      $data_fotter['scripts'] = [
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "Mattes/correo_verificado.js",
        "Mattes/Arrendatario/Segundo_registro.js",
        "Mattes/Principal.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css", "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css","Mattes/Arrendatario/Registro.css"];

        //Vars
        $data_header['title'] = "Regístrate";
        $data_header['description'] = "Documentacion del arrendatario";
        echo view('header' , $data_header);
        
        echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
        echo view('Mattes/Arrendatario_view/Segundo_registro');
        //echo view('right_panel');
        //echo view('Mattes/Footer');
        echo view('fotter_panel' , $data_fotter); 
        

    }

   
}