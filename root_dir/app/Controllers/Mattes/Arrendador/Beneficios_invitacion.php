<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Beneficios_invitacion extends BaseController
{

  public function index()
  {
    helper("Mattes_menu");
    $session = session();
    $id_user = $session->get('unique');
    $data ['user_id'] = $id_user;
    $menu = mattes_menu();
    $data_menu['menu'] = $menu;

    $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
    $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
    $data_menu['verificado'] = $verificado;

    $data_fotter['scripts'] = [
      "dashboard.js",
      "/Mattes/Principal.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js", 
      "Mattes/Arrendador/Beneficios_invitacion.js", 
      "../js/general/general.js",
      "Mattes/correo_verificado.js"
    ];
    
    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
    
    
    $data_header['title'] = "Beneficios de la invitacion";
    $data_header['description'] = "Página del arrendador donde invita a personas con su correo a obtener los beneficios que ofrece";
    echo view('header', $data_header);
    //echo view('head_panel');
    echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
    //echo view('left_panel',$data_left);
    //echo view('Mattes/Arrendador_view/Header_arrendador');
    //var_dump($id_user);
    echo view('Mattes/Arrendador_view/Beneficios_invitacion', $data);
    //echo view('right_panel');
    //echo view('Mattes/Footer');
    echo view('fotter_panel' , $data_fotter);  
  }
}
