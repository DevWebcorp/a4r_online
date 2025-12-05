<?php 

namespace App\Controllers\a4r;
use App\Controllers\BaseController;

class Login extends BaseController
{
  public function index(){
    return view('a4r/Login');
  }
  
  public function sign_out() {
		$session = session();

		if($session->has('unique')){
			$session->destroy();
			return redirect()->to(base_url()); 
		} else {
			return redirect()->to(base_url()); 
		}
	}
}