<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Habitaciones_depto extends BaseController
{
  public function index(){
    return view('a4r/Habitaciones_depto');
  }
  
}