<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Registro_propietario extends BaseController
{
  public function index(){
    $data_header['title'] = "Registro de propietario";
    $data_header['description'] = "Vista donde se registra el propietario";
    echo view('layout/head', $data_header);
    return view('a4r/Propietario/Registro_propietario');
  }
  
}