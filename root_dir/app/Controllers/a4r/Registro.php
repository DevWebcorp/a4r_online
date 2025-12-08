<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Registro extends BaseController
{
  public function index(){
    $data_header['title'] = "Registro de usuario";
    $data_header['description'] = "Vista donde se registra el usuario";
	  echo view('layout/head', $data_header);
    echo view('a4r/Registro');
  }
  
}