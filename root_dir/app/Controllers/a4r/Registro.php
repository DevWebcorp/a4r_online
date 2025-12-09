<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Registro extends BaseController
{
  public function index(){
	$data_header['title'] = "Registro general";
	$data_header['description'] = "Vista de registro general donde deciden si es propietario o cliente";
	echo view('layout/head', $data_header);
	echo view('a4r/Registro');
}  
	

} 