<?php

namespace App\Controllers\Mattes\Api\Back_office_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use DateTime;

helper('Acceso');



class Reporte_rest extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $acceso = Acceso();

        if ($acceso) {
            $request = \Config\Services::request();
            $id_docs = $request->getPost('id_docs');
            //var_dump($id_docs);


            $model = model('App\Models\Mattes\Arrendador_models/Datos_users');


            switch ($id_docs) {
                case 1:
                    $data = $model->getStudents();
                    $centinela = 0;
                    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
                    header("Content-Type: application/force-download");
                    header("Content-Type: application/octet-stream");
                    header("Content-Type: application/download");
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=csv_export.csv');

                    $fp = fopen('php://output', 'w');
                    fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF))); // UTF-8 BOM !!!!!

                    $header = array(
                        "Número", "Verificada", "Fecha de registro", "Nombre", "Primer Apellido", "Segundo apellido", "Edad",
                        "Sexo", "¿De qué estado vienes?", "Universidad", "Carrera", "Correo", "Telefono", "Descripción",
                        "¿Subio carta de admisión?", "¿Subió identificación oficial?", "Agendó cita", "Propiedades rentadas"
                    );
                    fputcsv($fp, $header);

                    foreach ($data as $fields) {
                        if ($fields->verificado == 1) {
                            $verificado = "SI";
                        } else {
                            $verificado = "NO";
                        }

                        $fecha_nacimiento = new DateTime($fields->nacimiento);
                        $hoy = new DateTime();
                        $edad = $hoy->diff($fecha_nacimiento);

                        if ($fields->carta != null) {
                            $carta = "Si";
                        } else {
                            $carta = "No";
                        }

                        if ($fields->ine != null) {
                            $ine = "Si";
                        } else {
                            $ine = "No";
                        }

                        $centinela++;

                        $lineData = array(
                            $centinela, $verificado, $fields->fecha_registro, $fields->nombre, $fields->ap, $fields->am,
                            $edad->y, $fields->genero, $fields->estado, $fields->universidad, $fields->carrera, $fields->email, $fields->telefono,
                            $fields->descripcion, $carta, $ine, $fields->agendadas, $fields->rentadas
                        );
                        fputcsv($fp, $lineData);
                    }


                    fclose($fp);
                    exit();

                    break;

                case "2":
                    $data = $model->getArrendadores();
                    $centinela = 0;
                    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
                    header("Content-Type: application/force-download");
                    header("Content-Type: application/octet-stream");
                    header("Content-Type: application/download");
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=csv_export.csv');

                    $fp = fopen('php://output', 'w');
                    fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF))); // UTF-8 BOM !!!!!

                    $header = array(
                        "Número", "Verificado", "Tipo de cuenta", "Fecha de registro", "Nombre", "Primer Apellido", "Segundo apellido", "Edad",
                        "Correo", "Celular", "Identificación oficial", "Propiedades", "Propiedades rentadas", "Nombre (datos fiscales)", "Banco",
                        "Clabe", "RFC", "Dirección fiscal"
                    );
                    fputcsv($fp, $header);

                    foreach ($data as $fields) {

                        switch ($fields->grupo) {
                            case 3:
                                if ($fields->razon_social) {
                                    $arrendaror = "Arrendador";
                                } else {
                                    $arrendaror = "Arrendador Inmobiliaria";
                                }

                                break;
                            case 5:
                                $arrendaror = "Arrendador Agente";
                                break;
                        }


                        if ($fields->verificado == 1) {
                            $verificado = "SI";
                        } else {
                            $verificado = "NO";
                        }

                        $fecha_nacimiento = new DateTime($fields->cumple);
                        $hoy = new DateTime();
                        $edad = $hoy->diff($fecha_nacimiento);


                        if ($fields->ine != null) {
                            $ine = "Si";
                        } else {
                            $ine = "No";
                        }
                        $centinela++;
                        $lineData = array(
                            $centinela, $verificado, $arrendaror, $fields->fecha_registro, $fields->nombre, $fields->ap, $fields->am,
                            $edad->y, $fields->email, $fields->telefono, $ine, $fields->numero_propiedades, $fields->rentadas, $fields->nombre_fiscal, $fields->banco,
                            $fields->clabe, $fields->rfc, $fields->direccion_fiscal
                        );
                        fputcsv($fp, $lineData);
                    }


                    fclose($fp);
                    exit();
                    break;

                    case "3":
                        $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
                        $data = $model->getproperty();
                        $centinela = 0;
                        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
                        header("Content-Type: application/force-download");
                        header("Content-Type: application/octet-stream");
                        header("Content-Type: application/download");
                        header('Content-Encoding: UTF-8');
                        header('Content-Type: text/csv; charset=utf-8');
                        header('Content-Disposition: attachment; filename=csv_export.csv');
    
                        $fp = fopen('php://output', 'w');
                        fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF))); // UTF-8 BOM !!!!!
    
                        $header = array(
                            "Número", "Verificada", "Fecha dada de alta", "Sello mattes", "Posicionamiento", "Propietario", "Nombre corto", "Descripción",
                            "Disponible a partir de", "Tipo de propiedad", "C.P", "Dirección", "Delegación", "Estado", "Colonia",
                            "Precio", "Vive en la propiedad", "Universidad más cercana","Roomies","Baños","Petfirendly","Camas", "Disponible para","Acceso para personas con capacidades diferentes",
                            "Wifi","Limpieza","Estacionamiento","Seguridad","Lavandería","Cocina","¿Cuántas fotos subió?","Comprobante de docmicilio","Recibo de agua o predial","Visitas",
                            "Rentada","Nombre persona que rentó","Fecha en que fue rentada");
                        fputcsv($fp, $header);
    
                        foreach ($data as $fields) {
    
                            if ($fields->stamp_mattes == 1) {
                                $verificado = "SI";
                            } else {
                                $verificado = "NO";
                            }

                            if ($fields->stamp_mattes == 1) {
                                $sello = "SI";
                            } else {
                                $sello = "NO";
                            }

                            if ($fields->positioning == 1) {
                                $pocision = "SI";
                            } else {
                                $pocision = "NO";
                            }
                            
                            if($fields->discapacidad == 1){
                                $discapacidad = "SI";

                            }else{
                                $discapacidad = "NO";

                            }

                            if($fields->wifi == 1){
                                $wifi = "SI";

                            }else{
                                $wifi = "NO";

                            }

                            if($fields->limpieza == 1){
                                $limpieza = "SI";

                            }else{
                                $limpieza = "NO";

                            }

                            if($fields->estacionamiento == 1){
                                $estacionamiento = "SI";

                            }else{
                                $estacionamiento = "NO";
                            }

                            if($fields->lavanderia == 1){
                                $lavanderia = "SI";

                            }else{
                                $lavanderia = "NO";
                            }

                            if($fields->cocina == 1){
                                $cocina = "SI";

                            }else{
                                $cocina = "NO";
                            }

                            if ($fields->comprobante != "") {
                                $comprobante = "Si";
                            } else {
                                $comprobante = "No";
                            }

                            if ($fields->recibo != "") {
                                $recibo = "Si";
                            } else {
                                $recibo = "No";
                            }
    
    
    
                            $centinela++;
                            $lineData = array(
                                $centinela, $verificado, $fields->fecha_registro, $sello, $pocision,$fields->nombre_propietario,$fields->name,
                                $fields->description, $fields->date_start, $fields->casa, $fields->codigo_postal, $fields->direccion, $fields->delegacion,
                                $fields->estado, $fields->colonia, $fields->precio, $fields->habita, $fields->universidad, $fields->roomies, $fields->banos, $fields->mascotas,
                                $fields->camas, $fields->disponible, $discapacidad,$wifi,$limpieza,$estacionamiento,$fields->numero_estacionamiento, $lavanderia,
                                $cocina, $fields->numero_fotos, $comprobante,$recibo, $fields->numero_visitas,$fields->numero_rentadas, $fields->rentando, $fields->fecha_renta
                            );
                            fputcsv($fp, $lineData);
                        }
    
    
                        fclose($fp);
                        exit();
                        break;
            }
        } else {
            return redirect()->to(base_url('Mattes/Login'));
        }
    }

    public function reporte_whats(){
        $model_contacto = model('App\Models\Mattes\Arrendatario_Models\Model_contacto');
        $data['data'] = $model_contacto->get_contactos();
        return $this->respond($data);  
    }
}
