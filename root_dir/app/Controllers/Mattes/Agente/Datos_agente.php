<?php 
namespace App\Controllers\Mattes\Agente;
use App\Controllers\BaseController;

class Datos_agente extends BaseController
{
    public function validar_user($token = null){
        helper("Mattes_menu");
        //$newToken = str_replace(".", "&", $token);
        $data['token'] = $token;
        $model = model('App\Models\Mattes\Agente_Models\Datos_agente');
        $total =  $model->selectCount('activation_token')->where('activation_token',$token)->first();
        $total = $total['activation_token'];

        $menu = Mattes_menu();
        $data_menu['menu'] = $menu;

        if($total ==="1"){
          $data_fotter['scripts'] = ["dashboard.js",
          "../lib/jquery/jquery.js",
          "../lib/jquery-ui/jquery-ui.js",
          "../lib/datatables/jquery.dataTables.js",
          "Mattes/Agente/Datos_agente.js",
          "Mattes/Principal.js"];
          
          $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
          //Css Shets
          //Css cuando se agrega un css ejemplo: ["css1", "css2"]
          $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Datos_empresa.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css", "Mattes/Agente/Agente.css"];
          //Vars
          $data_header['title'] = "Mattes";
          $data_header['description'] = "Cambia contraseña de agente dado de alta por una inmobiliaria";
          echo view('header' , $data_header);
          //echo view('left_panel',$data_left);
          //echo view('head_panel');
          echo view('Mattes/Agente_view/Menu_agente', $data_menu);
          echo view('Mattes/Agente_view/Datos_agente',$data);
          echo view('Mattes/Footer');
          echo view('fotter_panel' , $data_fotter);  
 
       }else{
          echo("La página a expirado");

        } 
    }  

    public function actualiza(){
      helper("Mattes_menu");
      $menu = Mattes_menu();
      $data_menu['menu'] = $menu;
      $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
      $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Datos_empresa.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css", "Mattes/Agente/Agente.css"];

      $data_fotter['scripts'] = ["dashboard.js",
          "../lib/jquery/jquery.js",
          "../lib/jquery-ui/jquery-ui.js",
          "../lib/datatables/jquery.dataTables.js",
          "Mattes/Agente/Datos_agente_update.js",
          "Mattes/Principal.js"];
          
     
      $data_header['title'] = "Datos del agente";
      $data_header['description'] = "Actualiza datos del agente dado de alta por la inmobiliaria";
      echo view('header' , $data_header);
      echo view('Mattes/Agente_view/Menu_agente', $data_menu);
      echo view('Mattes/Agente_view/Actualiza_datos_agente');
      //echo view('Mattes/Footer');
      echo view('fotter_panel' , $data_fotter);  
    }
}