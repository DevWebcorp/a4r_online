<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;

class Inicio extends BaseController
{
  public function index(){

    $acceso = Acceso();
    if($acceso){
      $session = session();
      $group = $session->get('utype');
      if($group == 2){
        $data_header['styles'] = ["starlight.css", 
          "../lib/datatables/jquery.dataTables.css", 
          "../lib/datatables-responsive/dataTables.responsive.js", "Mattes/Principal.css", 
          "Mattes/Inicio.css", "animate.css", 
          "Mattes/Back_office/MenuBO.css"
        ];
  
        $data_fotter['scripts'] = [
        "../lib/jquery-ui/jquery-ui.js",
        "../lib/datatables/jquery.dataTables.js",
        "Mattes/Principal.js",
        "Mattes/Back_office/script.js",
        "Mattes/Back_office/Propietarios_Admin.js",
        "Mattes/Back_office/Inicio_alumno.js"];


        $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
 
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Pagina principal que ve el BO";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        //echo view('head_panel');
        echo view('Mattes/Back_office_view/Menu_BO');
        echo view('Mattes/Back_office_view/Index');
        echo view('fotter_panel', $data_fotter);  
        echo view('Mattes/Footer');
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
    
  }

   
}