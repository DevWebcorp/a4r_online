<?php

namespace App\Controllers\a4r;

use App\Controllers\BaseController;

class Login extends BaseController{ 

  public function index()  {
    $session = session();
    if ($session->has('token')) {
      return redirect()->to(base_url() . '/inicio/index');
    } else {
      $data_header['title'] = "A4r Login";
      $data_header['description'] = "Login del usuario";
	  echo view('layout/head', $data_header);
      echo view('a4r/Login');
    }
  }
}
