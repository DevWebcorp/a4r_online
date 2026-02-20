<?php 
namespace App\Controllers\Mattes\Arrendador;
use App\Controllers\BaseController;

class Propiedad_archivos extends BaseController
{
   
  public function index(){

    $acceso = Acceso();
    helper("Mattes_menu");

    if($acceso == true){
        $session = session();
        $user_id = $session->get('unique');
        $menu = mattes_menu();
        $data_menu['menu'] = $menu;
        $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
        $data_menu['verificado'] = $verificado;
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost('id');
        if(isset($id_propiedad)){
          $id_propiedad = $request->getPost('id');
        }else{
          return redirect()->to(base_url('Mattes/Arrendador/Index'));
        } 

    } 

    $data_fotter['scripts'] = [
      "../lib/jquery-ui/jquery-ui.js",
      "Mattes/Arrendador/Propiedad_archivos.js",
      "Mattes/Principal.js", "Mattes/correo_verificado.js"];

      $data['id_propiedad'] = $id_propiedad;

      $data_header['styles'] = ["starlight.css" ,"Mattes/Arrendador/Arrendador.css", "Mattes/Principal.css",  "Mattes/Arrendador/Menu_arrendador.css", "Mattes/Arrendador/Propiedad_archivos.css"];
    
      $data_header['title'] = "Fotos de la propiedad";
      $data_header['description'] = "Formulario con campos para subir los archivos solicitados de la propiedad";
      echo view('header' , $data_header);
      //echo view('head_panel');
      echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
      //echo view('left_panel',$data_left);
      echo view('Mattes/Arrendador_view/Propiedad_archivos',$data);
      echo view('right_panel'); 
      //echo view('Mattes/Footer');
      echo view('fotter_panel' , $data_fotter); 

  }

   
}