<?php

namespace App\Controllers\Mattes\Back_office;

use App\Controllers\BaseController;

class Datos_Propiedad extends BaseController
{
    public function index()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $type_group = $session->get('utype');
            
            if ($type_group == 2) {
                $uri = service('uri');
                $namencode = $uri->getSegment(2);
                //var_dump($namencode);
                $name = urldecode($namencode);
                $name_property = str_replace("-", ' ', $name);
                $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
               
                $id = $model_propiedad->select('id,id_user')->where('name', $name_property)->first();
                $id_propiedad = $id["id"];

                //var_dump($id_propiedad);

                $data['propretario'] = $model_propiedad->get_data_propiedad($id_propiedad);
                $data['id_propiedad'] = $id_propiedad;
                $data['grupo'] = $type_group;

                $data_fotter['scripts'] = [
                    "../lib/datatables/jquery.dataTables.js",
                    "Mattes/Back_office/Status_propiedad.js",
                    "Mattes/Arrendador/Detalle_propiedad/Update_generales.js",
                    "Mattes/Arrendador/Detalle_propiedad/Mapa.js",
                    "Mattes/Arrendador/Detalle_propiedad/Update_localizacion.js",
                    "Mattes/Arrendador/Detalle_propiedad/Update_servicios.js",
                    "Mattes/Arrendador/Detalle_propiedad/Documentos.js",
                    "Mattes/Principal.js", 
                ];

                $data_fotter['external_scripts'] = [/*"https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry",*/"https://maps.googleapis.com/maps/api/js?key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk&libraries=geometry,places&sensor=false","https://polyfill.io/v3/polyfill.min.js?features=default"];
                
                $data_header['styles'] = [
                    "starlight.css", "../lib/datatables/jquery.dataTables.css", "Mattes/Principal.css",
                    "Mattes/Inicio.css", "animate.css",
                    "Mattes/Back_office/MenuBO.css",  "Mattes/Arrendador/Detalle_propiedad.css","Mattes/Arrendador/Arrendador.css", "Mattes/Arrendador/Localizacion.css","Mattes/Arrendador/Datos_propietario.css",
                    "Mattes/Back_office/Back_office.css",
                    "Mattes/Principal.css"
                ];
                
                $data_header['title'] = "Mattes";
                $data_header['description'] = "Detalle de propiedad que ve el BO";
                echo view('header', $data_header);
                echo view('Mattes/Back_office_view/Menu_BO');
                echo view('Mattes/Back_office_view/Datos_propiedad',$data);
                echo view('fotter_panel', $data_fotter);
                echo view('Mattes/Footer');
            } else {
                return redirect()->to(base_url());
            }
        } else {
            return redirect()->to(base_url());
        }
    }
}
