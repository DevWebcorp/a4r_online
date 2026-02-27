<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;

class Detalles_propietario extends BaseController
{
  public function index(){
    $acceso = Acceso();
    if ($acceso) {
      $session = session();
      $id_group = $session->get('utype');
      if($id_group == 2){
        $uri = service('uri');
        $id = $uri->getSegment(2);
        // echo("inicio");
        //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
        $data_fotter['scripts'] = [
          "../lib/jquery/jquery.js",
          "../lib/jquery-ui/jquery-ui.js",
          "../lib/datatables/jquery.dataTables.js",  "Mattes/Back_office/Detalles_propietario.js",
          "Mattes/Arrendador/Datos_propietario/Personales.js",
          "Mattes/Arrendador/Datos_propietario/Bancarios.js",
          "Mattes/Arrendador/Datos_propietario/Fiscales.js",
          "Mattes/Principal.js", "Mattes/Conversacion.js"
        ];

        $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
          //Css Shets
          //Css cuando se agrega un css ejemplo: ["css1", "css2"]
        $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", 
          "Mattes/Inicio.css", "animate.css", 
          "Mattes/Back_office/MenuBO.css",
          "Mattes/Back_office/Back_office.css",
          "Mattes/Back_office/Detalle_propietario.css",
          "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css",
          "Mattes/Arrendador/Datos_propietario.css"
        ];
        //Vars
        $data['group'] = $id_group;
        $data['id_usuario'] = $id;
        $data_header['title'] = "Detalles propietario BO";
        $data_header['description'] = "Detalle del alumno que ve el BO";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        //echo view('head_panel');
        echo view('Mattes/Back_office_view/Menu_BO');
        echo view('Mattes/Back_office_view/Detalle_propietario', $data);
        echo view('fotter_panel' , $data_fotter);  
        echo view('Mattes/Footer'); 
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
       
   
  }

   
}