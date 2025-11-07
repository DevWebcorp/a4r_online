<?php 
namespace App\Controllers\Mattes\Administrador;
use App\Controllers\BaseController;

class Universidades extends BaseController
{
   
    public function index(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $group = $session->get('utype');

            if($group == 1) {
                //var_dump($id_propietario);
          
                $data_fotter['scripts'] = [ 
                    "dashboard.js", "../lib/datatables-responsive/responsive.dataTables.scss", "../lib/datatables/jquery.dataTables.js",
                    "Mattes/Principal.js", "Mattes/Administrador/Cat_university.js"
                ];
          
                //Css Shets
                $data_header['styles'] = ["starlight.css", "../lib/datatables/jquery.dataTables.css", "../lib/datatables-responsive/dataTables.responsive.js", 
                    "Mattes/Principal.css", 
                    "Mattes/Inicio.css", "animate.css",
                    "Mattes/Back_office/MenuBO.css"
                ];
          
                //Vars
                $data_header['title'] = "Cátalogo de universidades";
                $data_header['description'] = "Catalgo de universidades";
    
          
                echo view('header' , $data_header);
                echo view('Mattes/Back_office_view/Menu_BO');
                //echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);       
                echo view('Mattes/Administrador_view/Cat_universidades');
                echo view('Mattes/Footer'); 
                echo view('fotter_panel' , $data_fotter);  
            } else {
                return redirect()->to(base_url('Mattes/Login'));
              
            }
        } else {
            return redirect()->to(base_url('Mattes/Login'));
        }
       

    }

   
}