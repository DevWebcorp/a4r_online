<?php

namespace App\Controllers\Mattes;

use App\Controllers\BaseController;
helper('Acceso');

class Contacto extends BaseController {
    public function index() {
        $acceso = Acceso();
        $data_header['title'] = "Mattes";
        $data_header['description'] = "Aviso de privacidad";

        if($acceso){
            $session = session();
            $type_group = $session->get('utype');
            $user_id = $session->get('unique');

            switch ($type_group) {
                case 1:
                    $data_header['styles'] = ["starlight.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Back_office/MenuBO.css"];

                    $data_fotter['scripts'] = [
                        "dashboard.js",
                        "../lib/jquery/jquery.js",
                        "../lib/jquery-ui/jquery-ui.js",
                        "Mattes/Principal.js"
                    ];
                    echo view('header', $data_header);
                    echo view('Mattes/Back_office_view/Menu_BO');
                break;

                case 2:
                    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Login.css", "Mattes/Back_office/MenuBO.css"];

                    $data_fotter['scripts'] = [
                        "dashboard.js",
                        "../lib/jquery/jquery.js",
                        "../lib/jquery-ui/jquery-ui.js",
                        "Mattes/Principal.js"
                    ];
                    echo view('header', $data_header);
                    echo view('Mattes/Back_office_view/Menu_BO');
                break;

                case 3:
                    helper("Mattes_menu");
                    $menu = Mattes_menu();
                    $data_menu['menu'] = $menu;
                    $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
                    $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
                    $data_menu['verificado'] = $verificado;

                    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Menu_arrendador.css"];

                    $data_fotter['scripts'] = [
                        "dashboard.js",
                        "../lib/jquery/jquery.js",
                        "../lib/jquery-ui/jquery-ui.js",
                        "Mattes/Principal.js"
                    ];
                    echo view('header', $data_header);
                    echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
                break;

                case 4:
                    $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
                    $verificado  =  $model_identity_student->select('verify')->where('id_user', $user_id)->first();
                    $data_menu['verificado'] = $verificado;

                    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Login.css", "Mattes/Arrendatario/Menu_arrendatario.css"];

                    $data_fotter['scripts'] = [
                        "dashboard.js",
                        "../lib/jquery/jquery.js",
                        "../lib/jquery-ui/jquery-ui.js",
                        "Mattes/Principal.js"
                    ];
                    echo view('header', $data_header);
                    echo view('Mattes/Arrendatario_view/Menu_arrendatario', $data_menu);
                break;

                case 5:
                    helper("Mattes_menu");
                    $menu = Mattes_menu();
                    $data_menu['menu'] = $menu;
                    $model_identity = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
                    $verificado  =  $model_identity->select('verify')->where('id_user', $user_id)->first();
                    $data_menu['verificado'] = $verificado;

                    $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Login.css", "Mattes/Arrendador/Menu_arrendador.css"];

                    $data_fotter['scripts'] = [
                        "dashboard.js",
                        "../lib/jquery/jquery.js",
                        "../lib/jquery-ui/jquery-ui.js",
                        "Mattes/Principal.js"
                    ];
                    echo view('header', $data_header);
                    echo view('Mattes/Arrendador_view/Menu_arrendador', $data_menu);
                break;
            }
        } else {
            $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Arrendador/Detalle_propiedad.css", "Mattes/Login.css", "Mattes/Menu_principal.css"];

            $data_fotter['scripts'] = [
                "dashboard.js",
                "../lib/jquery/jquery.js",
                "../lib/jquery-ui/jquery-ui.js",
                "Mattes/Principal.js"
            ];

            echo view('header', $data_header);
            echo view('Mattes/Menu_principal');
        }

       
       
        echo view('Mattes/Contacto');
        echo view('Mattes/Footer');
        echo view('fotter_panel', $data_fotter);
    }
}