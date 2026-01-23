<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Datos_propietario extends BaseController
{
    public function index(){
      $acceso = Acceso();
      $activo = Primeravez();
      helper("Mattes_menu");
      if($acceso){
        if($activo){
          $session = session();
          $id_user =  $session->get('unique');
          $menu = mattes_menu();
          $data_menu['menu'] = $menu;
          $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
          $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
          $data_menu['verificado'] = $verificado;
          $model= model('App\Models\Mattes\Arrendador_models/Primeravez');
          $tipo =  $model->tipo_persona($id_user);
         if($session->get('utype') === "3" AND $tipo[0]->id_tradename === "1"){
          //$data['menu'] = $tipo[0]->id_tradename;
         
          $data_fotter['scripts'] = ["dashboard.js",
            "../lib/jquery/jquery.js",
            "../lib/jquery-ui/jquery-ui.js",
            "../lib/datatables/jquery.dataTables.js",
            "Mattes/correo_verificado.js",
            "Mattes/Arrendador/Datos_propietario/Personales.js",
            //"Mattes/Arrendador/Datos_propietario/Bancarios.js",
            //"Mattes/Arrendador/Datos_propietario/Fiscales.js",
            "Mattes/Arrendador/Datos_propietario/Notificaciones.js",
            "Mattes/Principal.js"
          ];

          $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];

          $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css"];

          $data_header['title'] = "A4r";
          $data_header['description'] = "Datos de registro del propietario";
          echo view('header' , $data_header);
          //echo view('Mattes/Arrendador_view/Menu_arrendador',$data);
          //echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
          echo view('Mattes/Arrendador_view/Datos_propietario');
          echo view('right_panel');
          //echo view('Mattes/Footer');
          echo view('fotter_panel' , $data_fotter);   

        }else{
          return redirect()->to(base_url('home-propietario'));
        } 
      }else{
        return redirect()->to(base_url('/Primeravez'));
      }

    }else{
      return redirect()->to(base_url());

    }
  }  
}