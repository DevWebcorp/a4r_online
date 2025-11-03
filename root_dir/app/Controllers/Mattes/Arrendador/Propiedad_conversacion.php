<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;
helper('Acceso');

class Propiedad_conversacion extends BaseController
{
   
    public function index(){
      $acceso = Acceso();
      if($acceso) {
        $session = session();
        $id_user = $session->get('unique');

        $uri = service('uri');
        $id_conversacion = $uri->getSegment(2);

        $model_conversation = model('App\Models\Mattes\Arrendador_models\Model_conversation');
        $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');

        $id_renter = $model_conversation->select('arrendatario_id')->where('id', $id_conversacion)->find();
        $id = $id_renter[0]['arrendatario_id']; // ID_USER DEL AGENTE
        $type_group = $session->get('utype');
        $verificado  =  $model_identity->select('verify')->where('id_user', $id_user)->first();
        $data_menu['verificado'] = $verificado;

        if($type_group == 4){
          echo view('Mattes/Arrendatario_view/Menu_arrendatario');
          $data_header['styles'] = ["starlight.css" , "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", 
          "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendador/Conversacion.css"];
        } else {
          helper("Mattes_menu");
          $menu = Mattes_menu();
          $data_menu['menu'] = $menu;
          echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
          $data_header['styles'] = ["starlight.css" , "Mattes/Principal.css", "Mattes/Arrendador/Arrendador.css", 
            "Mattes/Arrendador/Menu_arrendador.css", "Mattes/Conversacion.css"
          ];
        }
        
        $data_fotter['scripts'] = ["dashboard.js",
          "../lib/jquery/jquery.js",
          "../lib/jquery-ui/jquery-ui.js",
          "../lib/datatables/jquery.dataTables.js",
          "/Mattes/Arrendador/Arrendador.js", "Mattes/Conversacion.js",
          "Mattes/Principal.js", "Mattes/correo_verificado.js"
        ];

        
      
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Módulo que muestra una conversacion de arrendador y arrendatario";
        $data['id_usuario'] = $id;
        $data['group'] = $type_group;
        $data['conversacion'] = $id_conversacion;
          echo view('header' , $data_header);
          //echo view('head_panel');
          //echo view('left_panel',$data_left);
          
          echo view('Mattes/Arrendador_view/Propiedad_conversacion', $data);
          echo view('right_panel');  
          echo view('Mattes/Footer');
          echo view('fotter_panel' , $data_fotter); 
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
      

    }

   
}