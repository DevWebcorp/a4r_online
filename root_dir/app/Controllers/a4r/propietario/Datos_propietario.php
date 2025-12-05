<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Datos_propietario extends BaseController
{
  public function index(){
    return view('a4r/Propietario/Datos_propietario');
  }
  
}