<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Primeravez extends BaseController
{
    public function index(){

      $acceso = Acceso();

      if($acceso == true){
        helper("Mattes_menu");
        $session = session();
        $user_id = $session->get('unique');
        $menu = mattes_menu();
        $data_menu['menu'] = $menu;
        $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
        $data_menu['verificado'] = $verificado;

        $model= model('App\Models\Mattes\Arrendador_models/Primeravez');
        
        $activo = count($model->where('id_user',$session->get('unique'))->find());
        $activo = $activo > 0 ? true : false;

        
        $data_tradename = $model->get_tradename($user_id);

        // TABLA GENERALES
        $model_generales = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $json = $this->request->getJSON();
        $data_generales = $model_generales->get_info($user_id);
        $generales = $data_generales[0]->generales;

        //TABLA BANCARIOS
        $model_bancarios = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
        $json = $this->request->getJSON();
        $data_bancarios = $model_bancarios->get_info($user_id);
        $bancarios = $data_bancarios[0]->bancarios;

        //TABLA FISCALES
        $model_fiscales = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
        $json = $this->request->getJSON();
        $data_fiscales = $model_fiscales->get_info($user_id);
        $fiscales = $data_fiscales[0]->fiscales;

        //TABLA NOTIFICACIONES
        $model_notificaciones = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
        $json = $this->request->getJSON();
        $data_notificaciones = $model_notificaciones->get_info($user_id);
        $notificaciones = $data_notificaciones[0]->notificaciones;

        if($activo){
          if($generales > "0"){
            return redirect()->to(base_url('home-propietario'));
          } else {
            if (isset($data_tradename[0]->id_tradename)){
              $tradename = $data_tradename[0]->id_tradename;
              if($tradename == "2"){
                return redirect()->to(base_url('datos-inmobiliaria'));
              } else {
                return redirect()->to(base_url('datos-propietario'));
              }
            } else {
              return redirect()->to(base_url('datos-propietario'));
            }
            
          }
         

        }else{
          if($session->get('utype')<=3){
              $data_fotter['scripts'] = ["dashboard.js",
              "../lib/jquery/jquery.js",
              "../lib/jquery-ui/jquery-ui.js",
              "../lib/datatables/jquery.dataTables.js", "Mattes/Arrendador/Primeravez.js",
              "Mattes/Principal.js", "Mattes/correo_verificado.js"];
              $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
              //Css Shets
              //Css cuando se agrega un css ejemplo: ["css1", "css2"]
              $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css",  "Mattes/Arrendador/Primeravez.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
              //Vars
              $data_header['title'] = "Registro por primera vez";
              $data_header['description'] = "Pagina de inicio de primera vez para el arrendador";
              echo view('header' , $data_header);
              //echo view('left_panel',$data_left);
              //echo view('head_panel');
              echo view('Mattes/Arrendador_view/Menu_primeravez', $data_menu);
              echo view('Mattes/Arrendador_view/Primeravez');
              //echo view('right_panel');
              //echo view('Mattes/Footer');
              echo view('fotter_panel' , $data_fotter);  
          }
          
        }
      }else{
        return redirect()->to(base_url());
      }
    }  
}