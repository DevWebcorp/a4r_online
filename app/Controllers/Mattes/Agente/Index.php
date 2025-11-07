<?php 
namespace App\Controllers\Mattes\Agente;
use App\Controllers\BaseController;

class Index extends BaseController
{
   
    public function index(){
       // echo("inicio");
        //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
      $data_fotter['scripts'] = ["dashboard.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "../lib/datatables/jquery.dataTables.js",
        "Mattes/Principal.js"];
        $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
        //Css Shets
        //Css cuando se agrega un css ejemplo: ["css1", "css2"]
        $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css" , "../lib/datatables/jquery.dataTables.css", "Astsuite/Supervisor.css"];
        //Vars
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Página principal del agente";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        echo view('head_panel');
        //echo view('Astsuite/Supervisor/vitas_incidencias');
        echo view('right_panel');
        echo view('fotter_panel' , $data_fotter); 

    }

   
}