<?php 

namespace App\Controllers\a4r\back_office;
use App\Controllers\BaseController;

class Busqueda extends BaseController
{
  public function index(){
    $data_header['title'] = "Filtro de busqueda";
    $data_header['description'] = "";

     $data_header['styles'] = ["starlight.css",
      "animate.css", 
      "Mattes/Back_office/Mapa.css"
    ];

    echo view('layout/head', $data_header);   

    $data_fotter['scripts'] = [      
      "wow.min.js",
      "../lib/jquery/jquery.js",
      "../lib/jquery-ui/jquery-ui.js",
      "Slider/js/rSlider.min.js",
      "Starrr/starrr.js","Starrr/bootstrap.min.js",
      "Mattes/Back_office/Mapa_filtros.js",
      "Mattes/Principal.js"
    ];


    $data_fotter['external_scripts'] = ["https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk719eWJh8J6Mx9DrGXKEv3ojKmqw8Cv9pscK&libraries=places", 
      "https://polyfill.io/v3/polyfill.min.js?features=default", 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js'
    ];

    $model_propiedad = model('App\Models\Mattes\Arrendador_models\Detalle_propiedad');
    $data['max'] = $model_propiedad->precio_max();      
    $data['min'] = $model_propiedad->precio_min();


    return view('a4r/back_office/Busqueda', $data_fotter);
    //echo view('fotter_panel', $data_fotter);  
  }
  
}