<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Detalles_servicios extends BaseController
{
    public function index(){
      $acceso = Acceso();
      helper("Mattes_menu");

      if($acceso == true){
        $session = session();
        $request = \Config\Services::request();
        $propiedad = $request->getPost('id_propiedad');
        $id_user =  $session->get('unique');

        $menu = mattes_menu();
        $data_menu['menu'] = $menu;
        $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
        $data_menu['verificado'] = $verificado;
       if(isset($propiedad)){
          $id_propiedad = $request->getPost('id_propiedad');
        }elseif(isset($_POST['id'])){
          $id_propiedad = $_POST['id'];
        }else{
          return redirect()->to(base_url('home-propietario'));
        }
          
        
        
        $data_fotter['scripts'] = ["dashboard.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "../lib/datatables/jquery.dataTables.js", "Mattes/Arrendador/Detalles_servicios.js",
        "Mattes/Principal.js", "Mattes/correo_verificado.js"];
        $data['id_propiedad'] = $id_propiedad;
        $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
        $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css", "Mattes/Arrendador/Detalles_servicios.css", "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Formulario que trae a llenar servicios de la propiedad como baños, camas, etc";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        //echo view('head_panel');
        echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
        echo view('Mattes/Arrendador_view/Detalles_servicios',$data);
        echo view('right_panel');
        echo view('Mattes/Footer');
        echo view('fotter_panel' , $data_fotter); 

      } else{
        return redirect()->to(base_url('inicia-session'));

      } 
    }  
}

