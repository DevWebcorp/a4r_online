<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Header_arrendador extends BaseController
{
   
    public function index(){
        $data_fotter['scripts'] = ["dashboard.js", "Mattes/Principal.js"];

        $data_header['styles'] = ["starlight.css", "../Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css"];
       
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Header con iconos de casa y flecha de regreso para ir a la página principal";
        echo view('header' , $data_header);
        //echo view('left_panel',$data_left);
        echo view('Mattes/Arrendador_view/Header_arrendador');
        echo view('right_panel'); 
        echo view('Mattes/Footer');
        echo view('fotter_panel' , $data_fotter); 

    }

   
}