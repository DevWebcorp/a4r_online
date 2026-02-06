<?php

namespace App\Controllers\Mattes\Arrendador;

use App\Controllers\BaseController;

class Detalle_propiedad extends BaseController
{

  public function index()
  {
    $acceso = Acceso();
    if (!$acceso) {
      return;
    }

    $session = session();
    $user_id = $session->get('unique');
    $type_group = $session->get('utype');

    $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
    $data_tradename = $model_user->get_tradename($user_id);

    $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
    $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
    $datos_pers = $model_identity->selectCount('id')->where('id_user', $user_id)->find()[0]['id'];

    $data_menu['verificado'] = $verificado;

    helper("Mattes_menu");
    $menu = Mattes_menu();
    $data_menu['menu'] = $menu;

    $data_fotter['scripts'] = [
      "dashboard.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "../lib/datatables/jquery.dataTables.js",
      "Mattes/correo_verificado.js",
      "Mattes/Arrendador/Datos_propietario.js",
      "Mattes/Arrendador/Detalle_propiedad.js"
    ];

    $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", "https://polyfill.io/v3/polyfill.min.js?features=default"];

    $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Detalle_propiedad.css",  "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
    $data_header['title'] = "Detalle de la propiedad";
    $data_header['description'] = "Llenado de detalle de propiedad";

    $data['grupo'] = $type_group;

    if($datos_pers != 1){
      return redirect()->to(base_url('/inicio'));
    } else {
      echo view('header', $data_header);
      echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      echo view('Mattes/Arrendador_view/Detalle_propiedad', $data);
      echo view('right_panel');
      //echo view('Mattes/Footer');
      echo view('fotter_panel', $data_fotter);

      if (isset($data_tradename[0]->id_tradename)) {
        $tradename = $data_tradename[0]->id_tradename;
        if ($tradename == 1) {
          $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
          $data_total = $model->total_propiedades($user_id);
          $total = $data_total[0]->total;

          $model_total = model('App\Models\Mattes\Arrendador_models/Total_Propiedades');
          $n_property =  $model_total->get_total($user_id)[0]['total'];

          if ($total >= $n_property) {
            return redirect()->to(base_url('/home-propietario'));
          }
        }
      }
    }

  }

  // public function index()
  // {
  //   $acceso = Acceso();
  //   if ($acceso) {
  //     $session = session();
  //     $user_id = $session->get('unique');
  //     $type_group = $session->get('utype');
  //     $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
  //     $data_tradename = $model_user->get_tradename($user_id);

  //     $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
  //     $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
  //     $data_menu['verificado'] = $verificado;

  //     if (isset($data_tradename[0]->id_tradename)) {
  //       $tradename = $data_tradename[0]->id_tradename;
  //       if ($tradename == 1) {
  //         //total de propiedades subidas
  //         $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
  //         $data_total = $model->total_propiedades($user_id);
  //         $total = $data_total[0]->total;

  //         //total de porpiedades que se pueden subir 
  //         $model_total = model('App\Models\Mattes\Arrendador_models/Total_Propiedades');
  //         $n_property =  $model_total->get_total($user_id)[0]['total'];

  //         if ($total < $n_property) {
  //           helper("Mattes_menu");
  //           $menu = Mattes_menu();
  //           $data_menu['menu'] = $menu;
  //           $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
  //           $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
  //           $data_menu['verificado'] = $verificado;
  //           $data_fotter['scripts'] = [
  //             "dashboard.js",
  //             "../lib/jquery/jquery.js",
  //             "../lib/jquery-ui/jquery-ui.js",
  //             "../lib/datatables/jquery.dataTables.js",
  //             "Mattes/Arrendador/Datos_propietario.js",
  //             "Mattes/Arrendador/Detalle_propiedad.js"
  //           ];

  //           $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", "https://polyfill.io/v3/polyfill.min.js?features=default"];
  //           $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Detalle_propiedad.css",  "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
  //           //Vars
  //           $data_header['title'] = "MATTES";
  //           $data_header['description'] = "Llenado de detalle de propiedad";
  //           $data['grupo'] = $type_group;
  //           echo view('header', $data_header);
  //           //echo view('left_panel',$data_left);
  //           //echo view('head_panel');
  //           echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
  //           echo view('Mattes/Arrendador_view/Detalle_propiedad', $data);
  //           echo view('right_panel');
  //           echo view('Mattes/Footer');
  //           echo view('fotter_panel', $data_fotter);
  //         } else {
  //           return redirect()->to(base_url('/home-propietario'));
  //         }
  //       } else {
  //         helper("Mattes_menu");
  //         $menu = Mattes_menu();
  //         $data_menu['menu'] = $menu;
  //         $data_fotter['scripts'] = [
  //           "dashboard.js",
  //           "../lib/jquery/jquery.js",
  //           "../lib/jquery-ui/jquery-ui.js",
  //           "../lib/datatables/jquery.dataTables.js",
  //           "Mattes/Arrendador/Datos_propietario.js",
  //           "Mattes/Arrendador/Detalle_propiedad.js",
  //           "Mattes/Principal.js"
  //         ];

  //         $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", "https://polyfill.io/v3/polyfill.min.js?features=default"];

  //         $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Detalle_propiedad.css",  "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
  //         //Vars
  //         $data_header['title'] = "Mattes";
  //         $data_header['description'] = "Llenado de detalle de propiedad";
  //         echo view('header', $data_header);
  //         $data['grupo'] = $type_group;
  //         //echo view('left_panel',$data_left);
  //         //echo view('head_panel');
  //         echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
  //         echo view('Mattes/Arrendador_view/Detalle_propiedad', $data);
  //         echo view('right_panel');
  //         echo view('Mattes/Footer');
  //         echo view('fotter_panel', $data_fotter);
  //       }
  //     } else {
  //     }
  //     helper("Mattes_menu");
  //     $menu = Mattes_menu();
  //     $data_menu['menu'] = $menu;
  //     $data_fotter['scripts'] = [
  //       "dashboard.js",
  //       "../lib/jquery/jquery.js",
  //       "../lib/jquery-ui/jquery-ui.js",
  //       "../lib/datatables/jquery.dataTables.js",
  //       "Mattes/Arrendador/Datos_propietario.js",
  //       "Mattes/Arrendador/Detalle_propiedad.js"
  //     ];

  //     $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", "https://polyfill.io/v3/polyfill.min.js?features=default"];

  //     $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Detalle_propiedad.css",  "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
  //     //Vars
  //     $data_header['title'] = "Mattes";
  //     $data_header['description'] = "Llenado de detalle de propiedad";
  //     echo view('header', $data_header);
  //     $data['grupo'] = $type_group;
  //     //echo view('left_panel',$data_left);
  //     //echo view('head_panel');
  //     echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
  //     echo view('Mattes/Arrendador_view/Detalle_propiedad', $data);
  //     echo view('right_panel');
  //     echo view('Mattes/Footer');
  //     echo view('fotter_panel', $data_fotter);
  //   }
  // }



  public function update()
  {
    $acceso = Acceso();
    $activo = Primeravez();
    helper("Mattes_menu");

    if ($acceso) {
      //if ($activo) {
      $session = session();
      $type_group = $session->get('utype');
      $id_user =  $session->get('unique');
      $menu = mattes_menu();
      $data_menu['menu'] = $menu;
      $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
      $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
      $data_menu['verificado'] = $verificado;
      if ($session->get('utype') === "3" or $session->get('utype') === "5") {
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost('id');

        if (isset($id_propiedad)) {
          $data['id_propiedad'] = $id_propiedad;
          $data['grupo'] = $type_group;
          $data_fotter['scripts'] = [
            "Mattes/correo_verificado.js",
            "Mattes/Arrendador/Detalle_propiedad/Update_generales.js",
            "Mattes/Arrendador/Detalle_propiedad/Mapa.js",
            "Mattes/Arrendador/Detalle_propiedad/Update_localizacion.js",
            "Mattes/Arrendador/Detalle_propiedad/Update_servicios.js",
            "Mattes/Arrendador/Detalle_propiedad/Documentos.js",
            "Mattes/Principal.js"
          ];
          $data_fotter['external_scripts'] = [
            "https://polyfill.io/v3/polyfill.min.js?features=default",
            "http://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry,places&sensor=false"
          ];

          $data_header['styles'] = ["starlight.css", "../lib/jquery-timepicker/jquery.timepicker.css", "../lib/datatables/jquery.dataTables.css",   "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Localizacion.css", "Mattes/Arrendador/Menu_arrendador.css"];

          //Vars
          $data_header['title'] = "Actualizacion de propiedad";
          $data_header['description'] = "Actualizacion de detalle de propiedad";
          echo view('header', $data_header);
          echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
          echo view('Mattes/Arrendador_view/Detalle_propiedad_update', $data);
          echo view('right_panel');
         // echo view('Mattes/Footer');
          echo view('fotter_panel', $data_fotter);
        } else {
          return redirect()->to(base_url('/home-propietario'));
        }
      } else {
        return redirect()->to(base_url());
      }
      /*  } else {
        return redirect()->to(base_url('/Primeravez'));
      } */
    } else {
      return redirect()->to(base_url());
    }
  }
}
