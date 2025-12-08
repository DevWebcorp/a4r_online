<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Habitaciones_casa extends BaseController
{
  public function index(){
    $data_header['title'] = "Habitaciones casa";
    $data_header['description'] = "Vista para mostrar las casas para renta-compra";
	  echo view('layout/head', $data_header);
    echo view('a4r/Habitaciones_casa');
  }
  
}