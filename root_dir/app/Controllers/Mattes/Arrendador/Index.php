<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Index extends BaseController
{
   
    public function index(){
      helper("Mattes_menu");
      $session = session();
      $id_group = $session->get('utype');
      $id_user = $session->get('unique');
      $menu = Mattes_menu();
      $data_menu['menu'] = $menu;
      $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
      $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
      $data_menu['verificado'] = $verificado;
      //var_dump($menu);
      $data ['user_id'] = $id_user;
      $data_fotter['scripts'] = [
        "../lib/jquery-ui/jquery-ui.js",  "../lib/jquery/jquery.simplePagination.js", "Mattes/Arrendador/Pagination.js",
      "Mattes/Principal.js", "Mattes/correo_verificado.js",];
       
      $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css", "Mattes/Arrendador/simplePagination.css", "Mattes/Arrendador/Index.css"];
      
      $data_header['title'] = "Mattes";
      $data_header['description'] = "Página principal del arrendador donde ve sus propiedades";
    
      $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');        
      $data['name'] = $model_users->get_user($id_user);
      

      echo view('header' , $data_header);
      //echo view('head_panel');
      if($id_group == 3){
        //echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      } else {
       // echo view('Mattes/Agente_view/Menu_agente', $data_menu);
      }
      //echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      echo view('Mattes/Arrendador_view/Header_arrendador', $data);
      echo view('Mattes/Arrendador_view/Index', $data);
      //echo view('Mattes/Footer');
      echo view('fotter_panel' , $data_fotter); 
    }

  public function prueba()
  {
    $data_fotter['scripts'] = [
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js"
    ];
    $data_header['styles'] = ["starlight.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Principal.css", "Mattes/correo_verificado.js"];
  
    $data_header['title'] = "Mattes";
    $data_header['description'] = "Vista principal del arrendador";
    echo view('header', $data_header);
    //echo view('left_panel',$data_left);
    echo view('Mattes/Arrendador_view/Header_arrendador');
    echo view('Mattes/Arrendador_view/Index');
    /*   echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);  */
  }
}
