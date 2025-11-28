<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Detalle_habitacion extends BaseController
{
  public function index(){
    return view('a4r/Detalle_habitacion');
  }
  
}