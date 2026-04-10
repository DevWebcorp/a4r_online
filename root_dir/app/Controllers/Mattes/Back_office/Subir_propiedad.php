<?php

namespace App\Controllers\Mattes\Back_office;

use App\Controllers\BaseController;

class Subir_propiedad extends BaseController
{
    public function index() {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $type_group = $session->get('utype');
            
            if ($type_group == 2) {
                $uri = service('uri');
                $id_user = $uri->getSegment(2);

                $data['id_usuario'] = $id_user;

                $data_fotter['scripts'] = [
                    "../lib/datatables/jquery.dataTables.js",
                    "Mattes/Principal.js", 
                    "Mattes/Back_office/Subir_propiedad.js",
                    "Mattes/Arrendador/Detalle_propiedad/Mapa.js",
                    "Mattes/Arrendador/Detalle_propiedad/Documentos.js",
                    "Mattes/Arrendador/Detalle_propiedad/Update_localizacion.js",
                    "Mattes/Arrendador/Detalle_propiedad/Update_servicios.js"  
                ];

                $data_fotter['external_scripts'] = [/*"https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry",*/"https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry,places&sensor=false","https://polyfill.io/v3/polyfill.min.js?features=default"];
                
                $data_header['styles'] = [
                    "starlight.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Principal.css",
                    "Mattes/Inicio.css", "animate.css",
                    "Mattes/Back_office/MenuBO.css",  "Mattes/Arrendador/Detalle_propiedad.css","Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Localizacion.css","Mattes/Arrendador/Datos_propietario.css",
                    "Mattes/Back_office/Back_office.css",
                    "Mattes/Principal.css"
                ];
                
                $data_header['title'] = "Subir propiedad BO";
                $data_header['description'] = "Detalle de propiedad que ve el BO";
                echo view('header', $data_header);
                echo view('Mattes/Back_office_view/Menu_BO');
                echo view('Mattes/Back_office_view/Subir_propiedad',$data);
                echo view('fotter_panel', $data_fotter);
               // echo view('Mattes/Footer');
            } else {
                return redirect()->to(base_url());
            }
        } else {
            return redirect()->to(base_url());
        }
    }
}
