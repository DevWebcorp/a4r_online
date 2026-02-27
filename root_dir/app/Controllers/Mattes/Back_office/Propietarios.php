<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;

class Propietarios extends BaseController
{
  public function index(){

    $acceso = Acceso();
    if($acceso){
      $session = session();
      $group = $session->get('utype');
      if($group == 2){
        $uri = service('uri');
        $id = $uri->getSegment(2);
          $data_header['styles'] = ["starlight.css", 
          "../lib/datatables/jquery.dataTables.css",
          "Mattes/Principal.css", 
          "Mattes/Inicio.css", "animate.css", 
          "Mattes/Back_office/MenuBO.css",
          "Mattes/Back_office/Back_office.css"
        ];
  
        $data_fotter['scripts'] = [
          "../lib/jquery-ui/jquery-ui.js",
          "../lib/datatables/jquery.dataTables.js",
          "Mattes/Principal.js", 
          "Mattes/Back_office/Propietarios.js"
          
        ];

        /* $data_fotter['external_scripts'] = [ "https://polyfill.io/v3/polyfill.min.js?features=default", 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js'
        ]; */
 
        $data_header['title'] = "Propietarios BO";
        $data_header['description'] = "Tabla de propietarios que hay";
        echo view('header' , $data_header);
        echo view('Mattes/Back_office_view/Menu_BO');
        echo view('Mattes/Back_office_view/Propietarios');
        echo view('fotter_panel' , $data_fotter);  
        echo view('Mattes/Footer');
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
   
  }
   
}