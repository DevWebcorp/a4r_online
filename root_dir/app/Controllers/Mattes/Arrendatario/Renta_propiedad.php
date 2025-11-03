<?php 
namespace App\Controllers\Mattes\Arrendatario;
use App\Controllers\BaseController;

class Renta_propiedad extends BaseController
{
   
    public function index(){
        $acceso = Acceso();
        if($acceso) { 
            $uri = service('uri');
            $namencode = $uri->getSegment(2);
            $name = urldecode($namencode);
            $name_property = str_replace("-",' ',$name);
            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $id = $model_propiedad->select('id, id_user')->where('name',$name_property)->first();
            $id_propiedad = $id["id"]; 
            $id_propietario = $id['id_user'];
            $session = session();
            $id_user = $session->get('unique');

            $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $verificado  =  $model_identity_student->select('verify')->where('id_user',$id_user)->first();
            $data_menu['verificado'] = $verificado;
            $parent = $model_users->select('id_parent')->where('id', $id_propietario)->find();
            $id_parent = $parent[0]['id_parent'];


            $data_fotter['scripts'] = [
                "Mattes/correo_verificado.js",
                /*   "../lib/jquery/jquery.js",
                "../lib/jquery-ui/jquery-ui.js", */
                //"Mattes/Pasarela_pagos/OpenPay.js","
                "Mattes/Pasarela_pagos/PayPal.js",
                //"Mattes/Pasarela_pagos/MercadoPago.js"
            ];

            $data_fotter['external_scripts'] = ["https://www.paypal.com/sdk/js?client-id=ATofoHjBMh42tT__iObZxxal7FUPCHZobTjCY0EX60tYvET8m6ufQnR6IoD3RxlTUmL2g7gytmB5NAlO&currency=MXN"
            ,//"https://sdk.mercadopago.com/js/v2","https://openpay.s3.amazonaws.com/openpay.v1.min.js",
             //"https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"
            ];

            //Css Shets
            $data_header['styles'] = ["starlight.css" , "../lib/jquery-timepicker/jquery.timepicker.css", 
            "Mattes/Principal.css", "Mattes/Arrendatario/Menu_arrendatario.css", "Mattes/Arrendatario/Arrendatario.css", 
            "Mattes/Arrendatario/Registro.css" ,"Mattes/Arrendatario/botones.css","Mattes/Pagos.css"];
            
            //Vars
            $data_header['title'] = "Renta de propiedad";
            $data_header['description'] = "Pagina donde se muestran datos generales de la propiedad y formas de pago";
            $data['id_propiedad'] = $id_propiedad;
            $data['id_usuario'] = $id_user;
            echo view('header' , $data_header);

            $model_files = model('App\Models\Mattes\Arrendador_models\Files');
            $data['images'] = $model_files->get_images($id_propiedad);

            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $data['detalles'] = $model_propiedad->get_detalles($id_propiedad, $id_parent);
            //var_dump($data['detalles']);
            
            echo view('Mattes/Arrendatario_view/Menu_arrendatario',$data_menu);
            echo view('Mattes/Arrendatario_view/Renta_propiedad', $data);
            echo view('Mattes/Footer');
            echo view('fotter_panel' , $data_fotter);
        } else {
            return redirect()->to(base_url('inicia-session'));
        }       

    }   

   

}