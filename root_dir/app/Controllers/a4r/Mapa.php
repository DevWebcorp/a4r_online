<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Mapa extends BaseController
{
  public function index(){
    $data_header['title'] = "Principal";
    $data_header['description'] = "Vista con el mapa";
	  echo view('layout/head', $data_header); 
    echo view('a4r/Mapa');
  }
  
}