<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;
helper('Acceso');

class Contacto_por_whats extends BaseController {
    public function index(){
        $acceso = Acceso();
        if($acceso){
            $session = session();
            $group = $session->get('utype');
            if($group == 2){
                $data_header['styles'] = ["starlight.css", "../lib/datatables/jquery.dataTables.css", "../lib/datatables-responsive/dataTables.responsive.js",
                    "Mattes/Principal.css", 
                    "Mattes/Inicio.css", "animate.css", 
                    "Mattes/Back_office/MenuBO.css",
                    "Mattes/Back_office/Back_office.css",
                    "Mattes/Back_office/Detalle_propietario.css",
                    "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css",
                    "Mattes/Arrendador/Datos_empresa.css"
                ];
    
                $data_fotter['scripts'] = [ "../lib/jquery/jquery.js", "../lib/jquery-ui/jquery-ui.js", "../lib/datatables/jquery.dataTables.js",
                    "Mattes/Principal.js", "Mattes/Back_office/Reporte_whats.js"
                ];
        
                $data_header['title'] = "Contacto whats BO";
                $data_header['description'] = "Descargar de archivos csv";

                echo view('header', $data_header);
                echo view('Mattes/Back_office_view/Menu_BO');
                echo view('Mattes/Back_office_view/Reporte_whats_view'); 
                //echo view('Mattes/Footer');
                echo view('fotter_panel', $data_fotter);  
                
            } else {
                return redirect()->to(base_url('inicia-session'));
            }
        } else {
            return redirect()->to(base_url('inicia-session'));
        }
    }
}