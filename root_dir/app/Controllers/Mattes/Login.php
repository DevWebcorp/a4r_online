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
      
      $data_header['title'] = "Mattes";
      $data_header['description'] = "Login del usuario";
      echo view('Login/Login', $data_header);
     
    }
  }
}
