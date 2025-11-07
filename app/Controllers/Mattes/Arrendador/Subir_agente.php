<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Subir_agente extends BaseController
{
    public function index(){
      helper("Mattes_menu");
      $acceso = Acceso();
      $activo = Primeravez();
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
          if($session->get('utype') === "3" AND $tipo[0]->id_tradename === "2"){
            
            $data_fotter['scripts'] = [/* "../lib/jquery/jquery.js",
            "../lib/jquery-ui/jquery-ui.js", */
            "../lib/datatables/jquery.dataTables.js",
            "Mattes/Arrendador/Datos_Empresa/Agentes.js", 
            "Mattes/Arrendador/Datos_Empresa/Personales.js",
            "Mattes/Arrendador/Datos_Empresa/Bancarios.js",
            "Mattes/Arrendador/Datos_Empresa/Fiscales.js",
            "Mattes/Arrendador/Datos_Empresa/Notificaciones.js",
            "Mattes/Arrendador/Datos_Empresa/Perfil_agente.js",
            "Mattes/Principal.js", "Mattes/correo_verificado.js"];

           // $data['menu'] = $tipo[0]->id_tradename;
    
            $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
            $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Datos_empresa.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
            $data_header['title'] = "Mattes";
            $data_header['description'] = "AQUI VA LA DESCRIPCION DEL MODULO";
            
            echo view('header' , $data_header);
            //echo view('Mattes/Arrendador_view/Menu_arrendador',$data);
            echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
            echo view('Mattes/Arrendador_view/Subir_agente');
            echo view('right_panel');
            echo view('Mattes/Footer');
            echo view('fotter_panel' , $data_fotter); 

          }else{
            return redirect()->to(base_url('/home-propietario'));
          }

        }else{
          return redirect()->to(base_url('/Primeravez'));
        }    
      }else{
        return redirect()->to(base_url());
      }
    } 
}