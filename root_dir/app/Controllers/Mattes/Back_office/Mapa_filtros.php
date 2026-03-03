<?php 
namespace App\Controllers\Mattes\Back_office;
use App\Controllers\BaseController;

class Mapa_filtros extends BaseController
{
   
  public function index(){
    

    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", 
      "Mattes/Inicio.css", "animate.css", 
      "Mattes/Back_office/MenuBO.css", 
      "Mattes/Back_office/Mapa.css"
    ];
  
    $data_fotter['scripts'] = [
      
      "wow.min.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "Slider/js/rSlider.min.js",
      "Starrr/starrr.js","Starrr/bootstrap.min.js",
      "Mattes/Back_office/Mapa_filtros.js",
      "Mattes/Principal.js"
    ];

    $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=places", 
      "https://polyfill.io/v3/polyfill.min.js?features=default", 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js'
    ];
      
 
    $data_header['title'] = "Filtros BO";
    $data_header['description'] = "Página principal del sitio";

    $model_propiedad = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
    $data['max'] = $model_propiedad->precio_max();      
    $data['min'] = $model_propiedad->precio_min();

      
    echo view('header', $data_header);
    echo view('Mattes/Back_office_view/Menu_BO');
    echo view('Mattes/Back_office_view/Mapa_filtros', $data); 
    //echo view('Mattes/Footer');
    echo view('fotter_panel', $data_fotter);  

  }
    
}