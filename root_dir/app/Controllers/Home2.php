<?php

namespace App\Controllers;

class Home2 extends BaseController
{
	public function index()
	{
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data['title'] = "Mattes";
			$data['stage'] = $_SERVER['CI_ENVIRONMENT'];
			//echo view('Login/Signin_view' ,  $data);

			$data_fotter['scripts'] = ["dashboard.js",
			"../lib/jquery/jquery.js",
			"../lib/jquery-ui/jquery-ui.js",
			"../lib/datatables/jquery.dataTables.js",
			"../Mattes/Principal.js"];
			$data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
			//Css Shets
			//Css cuando se agrega un css ejemplo: ["css1", "css2"]
			$data_header['styles'] = ["starlight.css" , "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css"];
			//Vars
			$data_header['title'] = "Mattes";
			$data_header['description'] = "Página principal del sitio";
			echo view('header' , $data_header);
			echo view('Mattes/Menu_principal');
			echo view('Mattes/Principal',$data);
			echo view('fotter_panel', $data_fotter); 
		}
	}
}