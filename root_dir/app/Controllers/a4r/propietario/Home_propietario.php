<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Home_propietario extends BaseController
{
  public function index(){
    $data_header['title'] = "Mis propiedades";
    $data_header['description'] = "Vista principal que ve el propietario cuando inicia sesión";
    echo view('layout/head', $data_header);
    return view('a4r/Propietario/Home_propietario');
  }
  
}