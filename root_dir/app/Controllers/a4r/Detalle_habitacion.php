<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Detalle_habitacion extends BaseController
{
  public function index(){
    $data_header['title'] = "Detalle de la habitacion";
    $data_header['description'] = "Vista con detalles de la habitacion";
	  echo view('layout/head', $data_header);
    echo view('a4r/Detalle_habitacion');
  }
  
}