<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Propiedad_ubicacion extends BaseController
{

  public function index()
  {

    $acceso = Acceso();
    helper("Mattes_menu");

    if ($acceso == true) {
      $session = session();
      $menu = mattes_menu();
      $data_menu['menu'] = $menu;
      $user_id = $session->get('unique');
      $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
      $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
      $data_menu['verificado'] = $verificado;
      $request = \Config\Services::request();
      $id_propiedad = $request->getPost('id');
     if (isset($id_propiedad)) {
        $id_propiedad = $request->getPost('id');
      } else {
        return redirect()->to(base_url('home-propietario'));
      } 

      $data_fotter['scripts'] = [
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "../lib/datatables/jquery.dataTables.js",
        "/Mattes/Arrendador/Arrendador.js",
        "Mattes/Principal.js",
        "Mattes/correo_verificado.js"
      ];

      $data_fotter['external_scripts'] = [
       "https://polyfill.io/v3/polyfill.min.js?features=default", 
       "http://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry,places&sensor=false",
      ];


      $data_header['styles'] = ["starlight.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Principal.css", /* "Mattes/Arrendador/Detalle_propiedad.css", */ "Mattes/Arrendador/Menu_arrendador.css",
      "Mattes/Arrendador/Propiedad_ubicacion.css"];

      $data_header['title'] = "Ubicacion de la propiedad";
      $data_header['description'] = "Formulario con campos para llenar la ubicación de la propiedad";

      $data['id_propiedad'] = $id_propiedad;
      echo view('header', $data_header);
      //echo view('head_panel');
      echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      //echo view('left_panel',$data_left);
      //echo view('Mattes/Arrendador_view/Header_arrendador'); 
      echo view('Mattes/Arrendador_view/Propiedad_ubicacion', $data);
      echo view('right_panel');
      //echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);
    } else {
      return redirect()->to(base_url());
    }
  }
}
