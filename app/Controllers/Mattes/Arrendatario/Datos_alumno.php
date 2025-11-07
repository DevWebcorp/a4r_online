<?php

namespace App\Controllers\Mattes\Arrendatario;

use App\Controllers\BaseController;

helper('Acceso');

class Datos_alumno extends BaseController
{
  public function index()
  {
    $acceso = Acceso();
    if ($acceso) {
      $session = session();
      $group = $session->get('utype');
      if ($group == 4) {
        $user_id = $session->get('unique');
        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_studentdata = model('App\Models\Mattes\Arrendatario_Models\Model_studentdata');

        $registro1 = count($model_identity_student->where('id_user', $session->get('unique'))->find());
        $registro2 = count($model_studentdata->where('id_user', $session->get('unique'))->find());
        if ($registro1 > "0" and  $registro2 > "0") {
          $data_header['styles'] = [
            "starlight.css",
            "Mattes/Inicio.css", "animate.css", "Mattes/Arrendatario/Arrendatario.css",
            "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Principal.css", "Mattes/Arrendatario/Datos_alumno.css"
          ];

          $data_fotter['scripts'] = [
            "dashboard.js",
            "wow.min.js",
            "../lib/jquery/jquery.js",
            "../lib/jquery-ui/jquery-ui.js",
            "Mattes/correo_verificado.js",
            "Mattes/Arrendatario/Datos_alumno.js", "Mattes/Arrendatario/Notificaciones.js", "Mattes/Principal.js"
          ];
          $data['id_usuario'] = $user_id;

          $data_header['title'] = "Datos del alumno";
          $data_header['description'] = "Registro del arrendatario";


          $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
          $data_menu['verificado'] = $verificado;

          echo view('header', $data_header);
          echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
          echo view('Mattes/Arrendatario_view/Datos_alumno', $data);
          echo view('right_panel');
          echo view('Mattes/Footer');

          echo view('fotter_panel', $data_fotter);
        } else if ($registro1 > "0") {
          return redirect()->to(base_url() . '/registro-documentos');
        } else {
          return redirect()->to(base_url() . '/registro-alumno');
        }
      } else {
        return redirect()->to(base_url('/inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
  }
}
