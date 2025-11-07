<?php 
namespace App\Controllers\Mattes\Administrador;
use App\Controllers\BaseController;

class Inicio extends BaseController
{



  public function index(){
    echo("INICIO DE ADMINISTRADOR");
  }
   
    public function inicio(){
      
        //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
      $data_fotter['scripts'] = ["dashboard.js",
        "../lib/jquery/jquery.js",
        "../lib/jquery-ui/jquery-ui.js",
        "../lib/datatables/jquery.dataTables.js"];
        $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places" , "https://polyfill.io/v3/polyfill.min.js?features=default"];
        //Css Shets
        //Css cuando se agrega un css ejemplo: ["css1", "css2"]
        $data_header['styles'] = ["starlight.css" , "Mattes/Administrador/Administrador.css"];
        //Vars
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Página principal del sitio";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
       /*  echo view('head_panel'); */
        echo view('Mattes/Administrador_view/Index');
        /* echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);  */

    }
}