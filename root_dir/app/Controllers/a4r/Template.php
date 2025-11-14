<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Template extends BaseController
{
  public function index(){
    return view('a4r/Template');
  }
  
}