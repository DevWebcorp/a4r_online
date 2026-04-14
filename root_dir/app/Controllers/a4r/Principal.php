<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Principal extends BaseController
{
  public function index(){
    $data_header['title'] = "A4R Plataforma pagina principal";
    $data_header['description'] = "Página principal del sitio";
	  echo view('layout/head', $data_header);
    echo view('a4r/Principal');
  }
  
}