<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Beneficios extends BaseController
{

  public function index()
  {
    helper("Mattes_menu");
    $menu = Mattes_menu();
    $data_menu['menu'] = $menu;
    $data_fotter['scripts'] = [
      "Mattes/correo_verificado.js",
      "dashboard.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "Mattes/Principal.js",
      
    ];
    
    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
    
    
    $data_header['title'] = "Mattes";
    $data_header['description'] = "Página del arrendador con los beneficios que obtiene";
    echo view('header', $data_header);
    //echo view('head_panel');
    echo view('Mattes/Arrendador_view/Menu_arrendador',$data_menu);
    //echo view('left_panel',$data_left);
    echo view('Mattes/Arrendador_view/Header_arrendador');
    echo view('Mattes/Arrendador_view/Beneficios');
    echo view('right_panel');
    echo view('Mattes/Footer');
    echo view('fotter_panel' , $data_fotter);  
  }
}
