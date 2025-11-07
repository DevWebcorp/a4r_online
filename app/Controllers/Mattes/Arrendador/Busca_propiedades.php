<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Busca_propiedades extends BaseController
{

  public function index()
  {
    helper("Mattes_menu");
    $menu = Mattes_menu();
    $data_menu['menu'] = $menu;
    $data_fotter['scripts'] = [
      "dashboard.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "Mattes/Principal.js",
      "Mattes/correo_verificado.js"
    ];
    
    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
    
    $data_header['title'] = "Mattes";
    $data_header['description'] = "Página con buscador de propiedades del arrendador";
    echo view('header', $data_header);
    //echo view('head_panel');
    echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
    //echo view('left_panel',$data_left);
    echo view('Mattes/Arrendador_view/Header_arrendador');
    echo view('Mattes/Arrendador_view/Busca_propiedades');
    echo view('right_panel');
    echo view('Mattes/Footer');
    echo view('fotter_panel' , $data_fotter);  
  }
}
