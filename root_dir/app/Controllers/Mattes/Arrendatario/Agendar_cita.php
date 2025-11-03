<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;

class Agendar_cita extends BaseController
{
   
  public function index(){
    $acceso = Acceso();
    if($acceso) {
      $session = session();
      $group = $session->get('utype');
      if($group == 4){
        $request = \Config\Services::request();
        $id_propiedad = $request->getPost('id');
        $id_propietario = $request->getPost('propietario');

        $session = session();
        $user_id = $session->get('unique');
        $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $verificado  =  $model_identity_student->select('verify')->where('id_user',$user_id)->first();
        $data_menu['verificado'] = $verificado;

        $data_fotter['scripts'] = [ 
          "Mattes/Principal.js",  "Mattes/correo_verificado.js",
        ];
  
        //Css Shets
        $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css", "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css"];
  
        //Vars
        $data_header['title'] = "Agendar cita";
        $data_header['description'] = "Calendario con citas";
        $data['id_propiedad'] = $id_propiedad;
        $data['id_propietario'] = $id_propietario;
  
        echo view('header' , $data_header);        
        echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);       
        echo view('Mattes/Arrendatario_view/Agendar_cita', $data);
        echo view('Mattes/Footer'); 
        echo view('fotter_panel' , $data_fotter);  
      } else {
        return redirect()->to(base_url('inicia-session'));
      }
    } else {
      return redirect()->to(base_url('inicia-session'));
    }
  }
   
}