<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Habitaciones_depto extends BaseController
{
  public function index(){
    $data_header['title'] = "Habitaciones depto";
    $data_header['description'] = "Vista para mostrar los departamentos para renta-compra de un edificio";
	  echo view('layout/head', $data_header);
    return view('a4r/Habitaciones_depto');
  }
  
}