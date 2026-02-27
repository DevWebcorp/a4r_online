<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;
helper('Acceso');

class Reportes extends BaseController
{
   
  public function index(){
    $acceso = Acceso();
    if($acceso){
        $session = session();
        $group = $session->get('utype');
        if($group == 2){
            $data_header['styles'] = ["starlight.css", 
                "Mattes/Principal.css", 
                "Mattes/Inicio.css", "animate.css",
                "Mattes/Back_office/MenuBO.css", "Mattes/Back_office/Alumnos.css", "Mattes/Back_office/Detalle_alumno.css"
            ];
  
            $data_fotter['scripts'] = [ "../lib/jquery/jquery.js", "../lib/jquery-ui/jquery-ui.js", 
                
                "Mattes/Principal.js", "Mattes/Back_office/Reporte.js"
            ];
      
            $data_header['title'] = "Reportes BO";
            $data_header['description'] = "Descargar de archivos csv";

      
            echo view('header', $data_header);
            echo view('Mattes/Back_office_view/Menu_BO');
            echo view('Mattes/Back_office_view/Reportes_view'); 
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