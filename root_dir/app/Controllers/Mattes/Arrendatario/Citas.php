<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;
helper('Acceso');

class Citas extends BaseController
{
   
  // public function index(){
  //   $acceso = Acceso();
  //   if($acceso){
  //     $session = session();
  //     $user_id = $session->get('unique');
  //     $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
  //     $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
  //     $data_menu['verificado'] = $verificado;


  //     //scripts cuando se agrega un script ejemplo: ["scrip1", "script2"]
  //     $data_fotter['scripts'] = ["dashboard.js",
  //     "../lib/datatables/jquery.dataTables.js", "Mattes/Arrendatario/Mensajes.js", "Mattes/Principal.js"];

  //     //Css Shets
  //     //Css cuando se agrega un css ejemplo: ["css1", "css2"]
  //     $data_header['styles'] = ["starlight.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css", "Mattes/Arrendatario/Registro.css"];
  //     //Vars
  //     $data_header['title'] = "Mensajes";
  //     $data_header['description'] = "Registro del arrendatario";
  //     $data['user_id'] = $user_id;
  //     echo view('header' , $data_header);
  //     //echo view('left_panel',$data_left);
  //     echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
  //     echo view('Mattes/Arrendatario_view/Citas', $data);
  //     echo view('right_panel');
  //     echo view('Mattes/Footer');
  //     echo view('fotter_panel' , $data_fotter); 
  //   }
       
         

  // }

   
}