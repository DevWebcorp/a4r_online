<?php

namespace App\Controllers\Mattes\Arrendatario;

use App\Controllers\BaseController;

helper('Alumno');

class Notificaciones extends BaseController
{

  public function index()
  {

    $verify = AlumnoVerify();

    if ($verify) {

      $data_fotter['scripts'] = [
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "Mattes/Arrendatario/Notificaciones.js",
        "Mattes/Principal.js"
      ];

      $session = session();
      $user_id = $session->get('unique');
      $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
      $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
      $data_menu['verificado'] = $verificado;

      //Css Shets
      $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css", "Mattes/Arrendatario/Registro.css"];

      //Vars
      $data_header['title'] = "Notificaciones";
      $data_header['description'] = "Notificaciones del arrendatario";
      echo view('header', $data_header);

      echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data_menu);
      echo view('Mattes/Arrendatario_view/Notificaciones');
      echo view('right_panel');
      echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);
    }else{
      return redirect()->to(base_url().'/registro-alumno');
    }
  }
}
