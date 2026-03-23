<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;
helper('Acceso');
helper('Alumno');

class Index extends BaseController {
   
  public function index(){
    //$request = \Config\Services::request();
    $data_header['title'] = "Mapa de propiedades";
    $data_header['description'] = "Vista principal del arrendatario";
    $session = session();
    $user_id = $session->get('unique');
    $acceso = Acceso();
    if($acceso) {
      $verify = AlumnoVerify();
      if($verify){
        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_studentdata = model('App\Models\Mattes\Arrendatario_Models\Model_studentdata');
        $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
        $data['verificado'] = $verificado;
        
        $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", 
          "Mattes/Inicio.css", "animate.css", "Mattes/Arrendatario/Arrendatario.css",
          "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Index.css"
        ];
        
        echo view('header', $data_header);
        echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data);

      }else{
        return redirect()->to(base_url().'/registro-alumno');
      }
    } else {
      $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", 
        "Mattes/Inicio.css", "animate.css", "Mattes/Arrendatario/Arrendatario.css",
        "Mattes/Menu_principal.css", "Mattes/Arrendatario/Index.css"
      ];
      echo view('header', $data_header);
      echo view('Mattes/Menu_principal');
    }

    if(isset($_POST['uni_name'])){
      $data['universidad'] = $_POST['uni_name'];
      $data['id_uni'] = $_POST['id_univ'];
      $data['latitude'] = $_POST['latitud'];
      $data['longitud'] = $_POST['longitud']; 
    } else {
      $data['universidad'] = "";
      $data['id_uni'] = "";
      $data['latitude'] = "";
      $data['longitud'] = "";
    }

    $data_fotter['scripts'] = [
      "dashboard.js",
      "wow.min.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "Slider/js/rSlider.min.js",
      "Starrr/starrr.js","Starrr/bootstrap.min.js",
      "Mattes/Arrendatario/Index.js",
      "Mattes/correo_verificado.js",
      "Mattes/Principal.js"
    ];

    $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", 
      "https://polyfill.io/v3/polyfill.min.js?features=default", 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js'
    ];

    $model_propiedad = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
    $data['max'] = $model_propiedad->precio_max();      
    $data['min'] = $model_propiedad->precio_min();
    
    echo view('Mattes/Arrendatario_view/Index', $data); 
    echo view('Mattes/Footer');
    echo view('fotter_panel', $data_fotter);
  }
}