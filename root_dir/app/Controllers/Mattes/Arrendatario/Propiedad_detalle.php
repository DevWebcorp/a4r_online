<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;
helper('Acceso');
helper('Alumno');

class Propiedad_detalle extends BaseController
{
   
  public function index(){
    $uri = service('uri');
    $namencode = $uri->getSegment(2);
    $acceso = Acceso();
    $name = urldecode($namencode);
    $name_property = str_replace("-",' ',$name);
    $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
    $id = $model_propiedad->select('id')->where('name',$name_property)->first();
    $id_propiedad = $id["id"]; 

    if($acceso){
      $session = session();
      $user_id = $session->get('unique');
      $type_group = $session->get('utype');

      $data_header['title'] = "Detalles propiedad";
      $data_header['description'] = "Registro del arrendatario";
      //var_dump($type_group);

      if($type_group == 4){
        $verify_alumno = AlumnoVerify();
        $data['alumno_verify'] = $verify_alumno;

        //Alumno

        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
        $verificado = $verificado == NULL ? 0 : $verificado;
        $data_menu['verificado'] = $verificado;

        $data_header['styles'] = ["starlight.css", 
          "Mattes/Inicio.css", "animate.css",  "Mattes/Arrendatario/Index.css",
          "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Principal.css", "Mattes/Arrendatario/Arrendatario.css",
          "Mattes/Arrendatario/Carousel.css", "Starrr/starrr.css", "Starrr/bootstrap.min.css","Mattes/Arrendatario/botones.css"
        ];

        echo view('header' , $data_header);
        echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);


        $model = model('App\Models\Mattes\Arrendatario_Models/Model_identity');
        $d_verify = $model->get_verify($user_id);
        $verify = $d_verify == !empty($d_verify) ? 0 : $d_verify[0]['verify'];

      } else {

        //Arrendador

        helper("Mattes_menu");
        $menu = Mattes_menu();
        $data_menu['menu'] = $menu;
        $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
        $data_menu['verificado'] = $verificado;
       
        $data_header['styles'] = ["starlight.css", 
          "animate.css", "Mattes/Arrendatario/Carousel.css", "Starrr/starrr.css", "Starrr/bootstrap.min.css", "Mattes/Arrendatario/Arrendatario.css", 
          "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Principal.css",  
        ];

        echo view('header' , $data_header);
        echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
        $verify = 0;
      }
    
  
      $data_fotter['scripts'] = [
        "dashboard.js",
        "wow.min.js",
        "../lib/jquery/jquery.js",
        "Mattes/Arrendatario/Propiedad_detalle.js",  "Mattes/correo_verificado.js",
        "../lib/Carousel/owlcarousel/jquery.min.js", "../lib/Carousel/owlcarousel/owl.carousel.min.js", "Mattes/Principal.js",
        "Starrr/starrr.js","Starrr/bootstrap.min.js"
      ];

      $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" 
        , "https://polyfill.io/v3/polyfill.min.js?features=default",
      ];
 
      
      $data['id_propiedad'] = $id_propiedad;
      $data['nombre_popiedad'] = $namencode;
      $data['group'] = $type_group;
      $data['verify'] = $verify;

    
      echo view('Mattes/Arrendatario_view/Propiedad_detalle', $data);
      //echo view('right_panel');
      //echo view('Mattes/Footer');
      echo view('fotter_panel' , $data_fotter);  
    } else {

      //Sin acceso
      $data_header['styles'] = ["starlight.css", 
      "Mattes/Inicio.css", "animate.css",  "Mattes/Arrendatario/Index.css", "Mattes/Menu_principal.css",
      "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Principal.css", "Mattes/Arrendatario/Arrendatario.css",
      "Mattes/Arrendatario/Carousel.css", "Starrr/starrr.css", "Starrr/bootstrap.min.css","Mattes/Arrendatario/botones.css"
      ];
    
      $data_fotter['scripts'] = [
        "dashboard.js",
        "wow.min.js",
        "../lib/jquery/jquery.js",
        "Mattes/Arrendatario/Propiedad_detalle.js", 
        "../lib/Carousel/owlcarousel/jquery.min.js", "../lib/Carousel/owlcarousel/owl.carousel.min.js",
        "Starrr/starrr.js","Starrr/bootstrap.min.js", "Mattes/Principal.js"
      ];

      $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" 
        , "https://polyfill.io/v3/polyfill.min.js?features=default",
      ];
 
      $data_header['title'] = "Detalles propiedad";
      $data_header['description'] = "Registro del arrendatario";
      $data['id_propiedad'] = $id_propiedad;
      $data['nombre_popiedad'] = $namencode;
      $data['group'] = "0";
      $data['verify'] = 0;

      echo view('header' , $data_header);
     // echo view('Mattes/Menu_principal');
      echo view('Mattes/Arrendatario_view/Propiedad_detalle', $data);
     // echo view('right_panel');
     // echo view('Mattes/Footer');
      echo view('fotter_panel' , $data_fotter);
    }
    
  }   
}