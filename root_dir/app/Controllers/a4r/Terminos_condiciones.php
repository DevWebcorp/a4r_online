<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Terminos_condiciones extends BaseController
{
  public function index(){
    $data_header['title'] = "Terminos y condiciones";
    $data_header['description'] = "Vista para mostrar los terminos y condiciones de la plataforma";
	  echo view('layout/head', $data_header);
    echo view('a4r/Terminos_condiciones');
  }
  
}