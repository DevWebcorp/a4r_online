<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Datos_propietario extends BaseController
{
  public function index(){
    $data_header['title'] = "Datos propietario";
    $data_header['description'] = "Vista para registro de propietario";
    echo view('layout/head', $data_header);
    return view('a4r/Propietario/Datos_propietario');
  }
  
}