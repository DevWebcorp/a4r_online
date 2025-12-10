<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Pago extends BaseController
{
  public function index(){
    $data_header['title'] = "Pago";
    $data_header['description'] = "Vista para mostrar los datos para el proceso del pago para la renta-compra";
	  echo view('layout/head', $data_header);
    echo view('a4r/Pago');
  }
  
}