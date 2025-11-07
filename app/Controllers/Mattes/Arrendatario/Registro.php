<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;

class Registro extends BaseController {
    public function index(){
        $session = session();
        $user_id = $session->get('unique');
        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        
        $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
        $data_menu['verificado'] = $verificado;
        
        // echo("inicio");
        //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
        $data_fotter['scripts'] = ["wow.min.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js", "Mattes/correo_verificado.js", "Mattes/Arrendatario/Registro.js", "Mattes/Principal.js"];

        //Css Shets
        //Css cuando se agrega un css ejemplo: ["css1", "css2"]
        $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css", "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css", "Mattes/Arrendatario/Registro.css", "Mattes/Arrendatario/Datos_alumno.css"];
        //Vars
        $data_header['title'] = "Regístrate";
        $data_header['description'] = "Registro del arrendatario";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
        echo view('Mattes/Arrendatario_view/Registro');
        echo view('right_panel');
        echo view('Mattes/Footer');
        echo view('fotter_panel' , $data_fotter);
    }   
}