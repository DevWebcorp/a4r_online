<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Login extends BaseController
{
  public function index(){
    return view('a4r/Login');
  }
  
}