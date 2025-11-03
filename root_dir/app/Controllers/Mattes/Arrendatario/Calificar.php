<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;
helper('Acceso');

class Calificar extends BaseController
{
   
    public function index(){

        $acceso = Acceso();
        if($acceso){
            $session = session();
            $type_group = $session->get('utype');
            $user_id = $session->get('unique');
            
            if($type_group == 4){
                $uri = service('uri');
                $nombrencode = $uri->getSegment(2);

                $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
                $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
                $data_menu['verificado'] = $verificado;

                $name = urldecode($nombrencode);
                $name_property = str_replace("-",' ',$name);
                $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
                $id = $model_propiedad->select('id')->where('name',$name_property)->first();
                $id_propiedad = $id["id"]; 
        
                $data_header['styles'] = ["starlight.css", 
                    "Mattes/Inicio.css", "animate.css",  "Mattes/Arrendatario/Index.css",
                    "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Principal.css", "Mattes/Arrendatario/Arrendatario.css",
                    "Mattes/Arrendatario/Calificar.css", "Starrr/starrr.css", "Starrr/bootstrap.min.css","Mattes/Arrendatario/botones.css"
                ];
      
                $data_fotter['scripts'] = [
                    "dashboard.js",
                    "wow.min.js",
                    "../lib/jquery/jquery.js",
                    "Mattes/Arrendatario/Calificar.js", 
                    "../lib/Carousel/owlcarousel/jquery.min.js", "../lib/Carousel/owlcarousel/owl.carousel.min.js",
                    "Starrr/starrr.js","Starrr/bootstrap.min.js", "Mattes/Principal.js"
                ];
    
                $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" 
                    , "https://polyfill.io/v3/polyfill.min.js?features=default",
                ];
     
                $data_header['title'] = "Califica la propiedad";
                $data_header['description'] = "Registro del arrendatario";
                $data['id_propiedad'] = $id_propiedad;
                $data['nombre_popiedad'] = $nombrencode;
                $data['group'] = $type_group;
    
                echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
                echo view('header' , $data_header);
                echo view('Mattes/Arrendatario_view/Calificar', $data);
                echo view('right_panel');
                echo view('Mattes/Footer');
                echo view('fotter_panel' , $data_fotter); 
            } else {
                return redirect()->to(base_url('inicia-session'));
            }
            
            
        } else {
            return redirect()->to(base_url('inicia-session'));
        }

    }
}