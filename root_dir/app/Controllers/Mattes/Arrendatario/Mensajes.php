<?php

namespace App\Controllers\Mattes\Arrendatario;

use App\Controllers\BaseController;

helper('Acceso');
helper('Alumno');
class Mensajes extends BaseController
{

  public function index()
  {
    $acceso = Acceso();
    if ($acceso) {
      $session = session();
      $user_id = $session->get('unique');
      $id_group = $session->get('utype');
      //$user_id = 200;

      //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]

      $verify = AlumnoVerify();

      if ($verify) {
        $data_fotter['scripts'] = [
          "../lib/datatables/jquery.dataTables.js",
          "Mattes/correo_verificado.js",
          "Mattes/Arrendatario/Mensajes.js",
          "Mattes/Principal.js",
          "Mattes/Conversacion.js",
          "Mattes/general/Notificaciones.js"
        ];

        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
        $data_menu['verificado'] = $verificado;


        $model = model('App\Models\Mattes\Arrendador_models\Model_questions');
        $data['preguntas'] = $model->total_preguntas($user_id);

        //Css Shets
        //Css cuando se agrega un css ejemplo: ["css1", "css2"]
        $data_header['styles'] = [
          "starlight.css",
          "../lib/datatables/jquery.dataTables.css",
          "Mattes/Principal.css",
          "Mattes/Arrendatario/Menu_arrendatario.css",
          "Mattes/Arrendatario/Arrendatario.css",
          "Mattes/Conversacion.css"
        ];
        //Vars
        $data_header['title'] = "Mensajes";
        $data_header['description'] = "Registro del arrendatario";
        $data['id_usuario'] = $user_id;
        $data['group'] = $id_group;
        echo view('header', $data_header);
        //echo view('left_panel',$data_left);
        echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data_menu);
        echo view('Mattes/Arrendatario_view/Mensajes', $data);
        //echo view('right_panel');
        //echo view('Mattes/Footer');
        echo view('fotter_panel', $data_fotter);
      } else {
        return redirect()->to(base_url() . '/registro-alumno');
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
  }
}
