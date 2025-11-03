<?php

namespace App\Controllers\Mattes\Arrendatario;

use App\Controllers\BaseController;

helper('Acceso');
helper('Alumno');

class Favoritos extends BaseController
{
  public function index()
  {
    $acceso = Acceso();
    if ($acceso) {
      $session = session();
      $group = $session->get('utype');
      $user_id = $session->get('unique');

      if ($group == 4) {

        $verify = AlumnoVerify();

        if ($verify) {
          $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
          $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
          $data_menu['verificado'] = $verificado;

          $data_header['styles'] = [
            "starlight.css",
            "Mattes/Inicio.css",
            "animate.css",
            "Mattes/Arrendatario/Arrendatario.css",
            "Mattes/Arrendatario/Menu_arrendatario.css",
            "Mattes/Principal.css",
            "Mattes/Arrendatario/Favoritos.css"
          ];

          $data_fotter['scripts'] = [
            "dashboard.js",
            "wow.min.js",
            "../lib/jquery/jquery.js",
            "../lib/jquery-ui/jquery-ui.js",
            "Mattes/correo_verificado.js",
            "Mattes/Arrendatario/Favoritos.js",
            "Mattes/Principal.js"
          ];

          $data_header['title'] = "Favoritos";
          $data_header['description'] = "Registro del arrendatario";
          echo view('header', $data_header);

          echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data_menu);
          echo view('Mattes/Arrendatario_view/Favoritos');
          echo view('right_panel');
          echo view('Mattes/Footer');
          echo view('fotter_panel', $data_fotter);
        }else{
          return redirect()->to(base_url() . '/registro-alumno');
        }
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
  }
}
