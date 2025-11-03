<?php

namespace App\Controllers\Mattes;

use App\Controllers\BaseController;

class Login extends BaseController
{

 

  public function index()
  {
    $session = session();
    if ($session->has('token')) {
      return redirect()->to(base_url() . '/inicio/index');
    } else {
      $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css"];

      $data_fotter['scripts'] = [
        "dashboard.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "Mattes/Principal.js"
      ];

      $data_header['title'] = "Mattes";
      $data_header['description'] = "Login del usuario";
      echo view('header', $data_header);
      echo view('Mattes/Menu_principal');
      echo view('Login/Login');
      echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);
    }
  }
}
