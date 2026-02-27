<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;
helper('Acceso');

class Alumnos extends BaseController
{
   
  public function index(){
    $acceso = Acceso();
    if($acceso){
      $session = session();
      $group = $session->get('utype');
      if($group == 2){
        $uri = service('uri');
        $id = $uri->getSegment(2);
        $data_header['styles'] = ["starlight.css", "../lib/datatables/jquery.dataTables.css", "../lib/datatables-responsive/dataTables.responsive.js", 
          "Mattes/Principal.css", 
         "Mattes/Inicio.css", "animate.css",
          "Mattes/Back_office/MenuBO.css", "Mattes/Back_office/Alumnos.css"
        ];
  
        $data_fotter['scripts'] = [ "../lib/jquery/jquery.js", "../lib/jquery-ui/jquery-ui.js", 
           "../lib/datatables-responsive/responsive.dataTables.scss", "../lib/datatables/jquery.dataTables.js",
          "Mattes/Principal.js", "Mattes/Back_office/Alumno.js"
        ];

        $data_fotter['external_scripts'] = [ "https://polyfill.io/v3/polyfill.min.js?features=default", 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js'
        ];
      
 
        $data_header['title'] = "Alumnos BO";
        $data_header['description'] = "Tabla de alumnos o arrendatarios que ve el BO";

      
        echo view('header', $data_header);
        echo view('Mattes/Back_office_view/Menu_BO');
        echo view('Mattes/Back_office_view/Alumnos'); 
        echo view('Mattes/Footer');
        echo view('fotter_panel', $data_fotter);  
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }

    
  }
    
}