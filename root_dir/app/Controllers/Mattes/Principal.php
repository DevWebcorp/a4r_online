<?php

namespace App\Controllers\Mattes;

use App\Controllers\BaseController;

class Principal extends BaseController
{

  public function index()
  {

    $session = session();
    if ($session->get('logged_in') != null) {
      return redirect()->to(base_url() . '/inicio');
    } else {

      $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Menu_principal.css", "Mattes/Inicio.css", "animate.css"];

      $data_fotter['scripts'] = [
        "dashboard.js",
        "wow.min.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "General/general.js",
        "Mattes/Inicio.js"
      ];

      $data_header['title'] = "Mattes";
      $data_header['description'] = "Página principal del sitio";
      echo view('header', $data_header);
      echo view('Mattes/Menu_principal');
      echo view('Mattes/Principal');
      echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);
    }
  }
}
