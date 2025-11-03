<?php

namespace App\Controllers\Mattes\Arrendatario;

use App\Controllers\BaseController;

helper('Acceso');
helper('Alumno');

class Propiedades_rentadas extends BaseController
{

  public function index()
  {
    $acceso = Acceso();
    if ($acceso) {
      $session = session();
      $group = $session->get('utype');
      if ($group == 4) {

        $verify = AlumnoVerify();

        if ($verify) {


        $user_id = $session->get('unique');

        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
        $data_menu['verificado'] = $verificado;

        

        //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
        $data_fotter['scripts'] = [          
          "../lib/datatables/jquery.dataTables.js", "Mattes/Principal.js", "Starrr/starrr.js", "Mattes/correo_verificado.js",
          "Starrr/bootstrap.min.js", "Mattes/Arrendatario/Propiedades_rentadas.js"
        ];


        $data_header['styles'] = [
          "starlight.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Principal.css",
          "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css",
          "Mattes/Arrendatario/Registro.css", "Starrr/starrr.css", "Mattes/Arrendatario/Rentadas.css"
        ];
        //Vars
        $data_header['title'] = "Propiedades rentadas";
        $data_header['description'] = "Propiedades rentadas";
        echo view('header', $data_header);
        //echo view('left_panel',$data_left);
        echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data_menu);
        echo view('Mattes/Arrendatario_view/Propiedades_rentadas');
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
