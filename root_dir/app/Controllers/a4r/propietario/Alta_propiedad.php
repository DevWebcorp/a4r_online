<?php 

namespace App\Controllers\a4r\propietario;
use App\Controllers\BaseController;

class Alta_propiedad extends BaseController
{
  public function index(){
    $data_header['title'] = "Alta de propiedad";
    $data_header['description'] = "Vista para dar de alta una propiedad";
    echo view('layout/head', $data_header);
    return view('a4r/Propietario/Alta_propiedad');
  }
  
}