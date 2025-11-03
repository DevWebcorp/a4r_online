<?php

namespace App\Controllers\Mattes;

use App\Controllers\BaseController;

class Error extends BaseController
{

  public function index()
  {
    $data_header['styles'] = ["starlight.css"];
    
    $data_fotter['scripts'] = [
      "dashboard.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "/Mattes/Principal.js"
    ];
   
    $data_header['title'] = "Error";
    $data_header['description'] = "Error";
    echo view('header', $data_header);
    echo view('Mattes/Error'); 
    echo view('fotter_panel', $data_fotter);
  }
}
