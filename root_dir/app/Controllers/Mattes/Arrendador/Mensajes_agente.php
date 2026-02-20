<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;
helper('Acceso');

class Mensajes_agente extends BaseController
{

  public function index()
  {
    $acceso = Acceso();
    if($acceso){
      helper("Mattes_menu");
      $menu = Mattes_menu();
      $data_menu['menu'] = $menu;
      $session = session();
      $user_id = $session->get('unique');
      $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
      $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
      $data_menu['verificado'] = $verificado;
      $data_fotter['scripts'] = [
        "../lib/datatables/jquery.dataTables.js",
        "Mattes/Arrendador/Mensajes_agente.js",
        "Mattes/Principal.js", "Mattes/correo_verificado.js"
      ];
        $data_header['styles'] = ["starlight.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Propiedades.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];

      $data_header['title'] = "Mensajes de agentes";
      $data_header['description'] = "Vista con especificaciones de las propiedades"; 
      $data['user_id'] = $user_id;
      echo view('header', $data_header);
      //echo view('head_panel');
      echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      //echo view('left_panel',$data_left);
      echo view('Mattes/Arrendador_view/Header_arrendador');
      echo view('Mattes/Arrendador_view/Mensajes_agente', $data);
      echo view('right_panel');
      //echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);
    }else{
      return redirect()->to(base_url('inicia-session'));
    }
  }
}
