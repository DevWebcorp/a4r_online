<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Registro_propietario extends BaseController
{
  public function index(){
    return view('a4r/Propietario/Registro_propietario');
  }
  
}