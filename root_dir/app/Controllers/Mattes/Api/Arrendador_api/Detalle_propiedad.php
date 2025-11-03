<?php

namespace App\Controllers\Mattes\Api\Arrendador_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');


class Detalle_propiedad extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = model('App\Models\Mattes\Arrendador_models/Alojamiento');
        $data = $model->get_alojamiento();
        return $this->respond($data, 200);
    }

    public function creat() {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request = \Config\Services::request();
            $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $model_total = model('App\Models\Mattes\Arrendador_models/Total_Propiedades');
            $model_data = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $id_group = $session->get('utype');

            if($id_group == 2){
                if($request->getPost('id_propietario')  == ""){
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'NO HAY DATOS DEL PROPIETARIO REGISTRADOS'
                        ]
                    ];

                    return $this->respond($response);
                } else {
                    $id_user = $request->getPost('id_propietario');
                    $data_parent = $model_users->get_group($id_user);
                    $id_group = $data_parent[0]['id_group'];
                }
            } else {
                $id_user = $session->get('unique');
                $id_group = $session->get('utype');                
            }      
            
            $verificado = $model_data->select('verify')->where('id_user', $id_user)->first();

            $verif = $this->verificado($verificado);
            

            if ($id_group == 5) {
                $data_parent = $model_users->get_group($id_user);
                $id_parent = $data_parent[0]['id_parent'];
                $total_propiedades =  $model_total->select('total')->where('id_user', $id_parent)->first();
                $upload_property = $model->select('id')->where('id_user', $id_user)->findAll();
                $contador =  count($upload_property);

                if ($contador == (int)$total_propiedades['total']) {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'A LLEGADO AL NUMERO MAXIMO DE PROPIEDADES'
                        ]
                    ];
                } else {
                    if($request->getPost('id') == ""){
                        $propiedad_name = $request->getPost('nombre_propiedad');
                        $data_val = $model->validar_name($propiedad_name);
                        $total = $data_val[0]->propiedad_name;
                    } else{
                        $data_val = "Nada";
                        $total = 0;  
                    }

                    //var_dump($data_val);

                    if ($total > 0) {
                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'NOMBRE YA EXISTENTE, UTILIZA UNO DIFERENTE'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }else {
                        $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));
                        $fecha_entrada = strtotime($request->getPost('disponibilidad'));
                        if ($fecha_actual >= $fecha_entrada) {
                            $response = [
                                'status'   => 400,
                                'error'    => null,
                                'messages' => [
                                    'success' => 'LA DISPONIBILIDAD DEBE SER EN FECHAS POSTERIORES AL DIA DE HOY'
                                ]
                            ];
                        } else {
                            if($request->getPost('id') == ""){
                                $data = [
                                    'id_user' => $id_user,
                                    'name' => $request->getPost('nombre_propiedad'),
                                    'description' => $request->getPost('descripcion'),
                                    //'visit' => $request->getPost('horario_visita'),
                                    'date_start' => $request->getPost('disponibilidad'),
                                    'id_type_accommodation' => $request->getPost('tipo_alojamiento'),
                                ];
    
                                $regreso = $model->insert($data);
                            } else {
                                $data = [
                                    'name' => $request->getPost('nombre_propiedad'),
                                    'description' => $request->getPost('descripcion'),
                                    //'visit' => $request->getPost('horario_visita'),
                                    'date_start' => $request->getPost('disponibilidad'),
                                    'id_type_accommodation' => $request->getPost('tipo_alojamiento'),
                                ];
    
                                $affect_rows = $model->update($request->getPost('id'), $data);

                                if($affect_rows){
                                    $regreso = $request->getPost('id');
                                } else {
                                    $response = [
                                        'status'   => 400,
                                        'error'    => null,
                                        'messages' => [
                                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                                        ]
                                    ];
                                    return $this->respondCreated($response);
                                }
                            }
                            
                            $group = $session->get('utype');
                            if ($regreso != null) {
                                $response = [
                                    'status'   => 200,
                                    'error'    => null,
                                    'id'       => $regreso,
                                    'messages' => [
                                        'success' => 'DATOS GUARDADOS CON EXITO'
                                    ],
                                    'id_group' => $group
                                ];
                                return $this->respondCreated($response);
                            } else {
                                $response = [
                                    'status'   => 400,
                                    'error'    => null,
                                    'messages' => [
                                        'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                                    ]
                                ];
                                return $this->respondCreated($response);
                            }
                        }
                    }
                }
                return $this->respondCreated($response);
            } else {
                $total_propiedades =  $model_total->select('total')->where('id_user', $id_user)->first();
                $upload_property = $model->select('id')->where('id_user', $id_user)->findAll();
                $contador =  count($upload_property);

                if ($contador == (int)$total_propiedades['total']) {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'A LLEGADO AL NUMERO MAXIMO DE PROPIEDADES'
                        ]
                    ];
                    return $this->respondCreated($response);
                } else {
                    if($request->getPost('id') == ""){
                        $propiedad_name = $request->getPost('nombre_propiedad');
                        $data_val = $model->validar_name($propiedad_name);
                        $total = $data_val[0]->propiedad_name;
                    } else{
                        $total = 0;  
                    }
                    //var_dump($request->getPost('id'). " 2");

                    if ($total > 0) {
                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'NOMBRE YA EXISTENTE, UTILIZA UNO DIFERENTE'
                            ]
                        ];
                        return $this->respondCreated($response);
                    } else {
                        $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));
                        $fecha_entrada = strtotime($request->getPost('disponibilidad'));
                        if ($fecha_actual >= $fecha_entrada) {
                            $response = [
                                'status'   => 400,
                                'error'    => null,
                                'messages' => [
                                    'success' => 'LA DISPONIBILIDAD DEBE SER EN FECHAS POSTERIORES AL DIA DE HOY'
                                ]
                            ];
                        } else {
                            if($request->getPost('id') == ""){
                                $data = [
                                    'id_user' => $id_user,
                                    'name' => $request->getPost('nombre_propiedad'),
                                    'description' => $request->getPost('descripcion'),
                                    //'visit' => $request->getPost('horario_visita'),
                                    'date_start' => $request->getPost('disponibilidad'),
                                    'id_type_accommodation' => $request->getPost('tipo_alojamiento'),
                                ];
    
                                $regreso = $model->insert($data);
                            } else {
                                $data = [
                                    'name' => $request->getPost('nombre_propiedad'),
                                    'description' => $request->getPost('descripcion'),
                                    //'visit' => $request->getPost('horario_visita'),
                                    'date_start' => $request->getPost('disponibilidad'),
                                    'id_type_accommodation' => $request->getPost('tipo_alojamiento'),
                                ];
    
                                $affect_rows = $model->update($request->getPost('id'), $data);

                                if($affect_rows){
                                    $regreso = $request->getPost('id');
                                } else {
                                    $response = [
                                        'status'   => 400,
                                        'error'    => null,
                                        'messages' => [
                                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                                        ]
                                    ];
                                    return $this->respondCreated($response);
                                }
                            }
                            $group = $session->get('utype');
                            if ($regreso != null) {
                                $response = [
                                    'status'   => 200,
                                    'error'    => null,
                                    'id'       => $regreso,
                                    'messages' => [
                                        'success' => 'DATOS GUARDADOS CON EXITO'
                                    ],
                                    'id_group' => $group
                                ];
                            } else {
                                $response = [
                                    'status'   => 400,
                                    'error'    => null,
                                    'messages' => [
                                        'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                                    ]
                                ];
                            }
                        }
                        return $this->respondCreated($response);
                    }
                }
            }
        }
    }

    public function verificado($verificado)
    {
        switch ($verificado) {
            case null:
                return false;
                break;
            case 0:
                return false;;
                break;
            case 1:
                return true;;
                break;
        }
    }

    public function get_generales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $id_porpiedad = $request->getPost("id");
            $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
            $data = $model->get_properties($id_porpiedad);
            return $this->respond($data, 200);
        }
    }

    public function get_localizacion()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $id_porpiedad = $request->getPost("id");
            $model = model('App\Models\Mattes\Arrendador_models/Detalle_propiedad');
            $data = $model->get_ubicacion($id_porpiedad);
            return $this->respond($data, 200);
        }
    }

    public function get_servicios()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $id_porpiedad = $request->getPost("id");
            $model = model('App\Models\Mattes\Arrendador_models/Servicios');
            $data = $model->get_services($id_porpiedad);
            return $this->respond($data, 200);
        }
    }

    public function get_universidad()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\Arrendador_models/Universidades');
            $data = $model->get_universidades();
            return $this->respond($data, 200);
        }
    }

    public function actualiza_generales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();            
            $request = \Config\Services::request();

            $id_propiedad = $request->getPost('id');
            $model = model('App\Models\Mattes\Arrendador_models/Propiedad');
            $propiedad_name = $request->getPost('upd_propiedad');
            $name = $model->select('name')->where('id', $id_propiedad)->first();

            if ($name['name'] == $propiedad_name) {
                $propiedad_name = $propiedad_name;
            } else {
                $data_val = $model->validar_name($propiedad_name);
                $total = $data_val[0]->propiedad_name;

                if ($total > 0) {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'NOMBRE YA EXISTENTE, UTILIZA UNO DIFERENTE'
                        ]
                    ];
                    return $this->respondCreated($response);
                } else {
                    $propiedad_name = $propiedad_name;
                }
            }

            $data = [
                'name' => $request->getPost('upd_propiedad'),
                'description' => $request->getPost('upd_descripcion'),
                'visiting_hours' => $request->getPost('upd_horario_visita'),
                'date_start' => $request->getPost('upd_disponibilidad'),
                'id_type_accommodation' => $request->getPost('upd_alojamiento')
            ];
            $this->status($id_propiedad, $status = 202);

            $model->update($id_propiedad, $data);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS GENERALES ACTUALIZADOS CON EXITO',
                    'name' => $request->getPost('upd_propiedad')
                ]
            ];
            return $this->respondCreated($response);
        }
    }

    public function actualiza_localizacion(){
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request = \Config\Services::request();
            $model = model('App\Models\Mattes\Arrendador_models/Detalle_propiedad');
            $id_detalle_prop = $request->getPost('id_ubicacion');
            $id_group = $session->get('utype');
            $price = str_replace(",", "", $request->getPost('upd_precio'));
            $id_propiedad = $request->getPost('id_propiedad');

            if($id_group == 2){
                if($id_detalle_prop == ""){
                    if($request->getPost('id_propiedad') == ""){
                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'NO HAY DATOS DEL PROPIETARIO REGISTRADOS'
                            ]
                        ];
    
                        return $this->respond($response);
                    }

                    $data = [
                        'id_propety' => $request->getPost('id_propiedad'),
                        'id_university' => $request->getPost('id_univ'),
                        'id_cp' => $request->getPost('ID_CODE'),
                        'price' => $price,
                        'inhabit' => $request->getPost('upd_habita_propiedad'),
                        'addrees' => $request->getPost('direccion'),
                        'address2' => $request->getPost('direccion_dos'),
                        'km' =>  $request->getPost('distancia'),
                        'type_distance' => "Metros",
                        'latitude' => $request->getPost('lat'),
                        'longitude' => $request->getPost('long'),
                    ];
    
                    $regreso = $model->insert($data);
                    if ($regreso != null) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'id' => $id_propiedad,
                            'id_ubicacion' => $regreso,
                            'id_group' => $id_group,
                            'messages' => [
                                'success' => 'DATOS GUARDADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    } else {
                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
                } else {
                    $data = [
                        'price' => $price,
                        'inhabit' => $request->getPost('upd_habita_propiedad'),
                        'id_cp' => $request->getPost('ID_CODE'),
                        'latitude' => $request->getPost('lat'),
                        'longitude' => $request->getPost('long'),
                        'addrees' => $request->getPost('direccion'),
                        'address2' => $request->getPost('direccion_dos'),
                        'id_university' => $request->getPost('id_univ'),
                        'km' => $request->getPost('distancia'),
                        'type_distance' => "Metros"
                    ];
                    $model->update($id_detalle_prop, $data);
                    $this->status($id_detalle_prop, $status = 202);
    
                    $response = [
                        'status'   => 200,
                        'id_group' => $id_group,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS DE LOCALIZACION ACTUALIZADOS CON EXITO'
                        ]
                    ];
                    return $this->respondCreated($response);
                }
            } else {
                $data = [
                    'price' => $price,
                    'inhabit' => $request->getPost('upd_habita_propiedad'),
                    'id_cp' => $request->getPost('ID_CODE'),
                    'latitude' => $request->getPost('lat'),
                    'longitude' => $request->getPost('long'),
                    'addrees' => $request->getPost('direccion'),
                    'address2' => $request->getPost('direccion_dos'),
                    'id_university' => $request->getPost('id_univ'),
                    'km' => $request->getPost('distancia'),
                    'type_distance' => "Metros"
                ];
                $model->update($id_detalle_prop, $data);
                $this->status($id_detalle_prop, $status = 202);

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'id_group' => $id_group,
                    'messages' => [
                        'success' => 'DATOS DE LOCALIZACION ACTUALIZADOS CON EXITO'
                    ]
                ];
                return $this->respondCreated($response);
            }
        }
    }

    public function actualiza_servicios() {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request = \Config\Services::request();
            $id_servicio = $request->getPost('id_servicios');
            $id_propiedad = $request->getPost('id_propiedad');

            $model = model('App\Models\Mattes\Arrendador_models/Servicios');
            $id_group = $session->get('utype');

            $capacidades = $request->getPost('upd_capacidades');
            $capacidades = isset($capacidades)  ? 1  : 0;

            $wifi = $request->getPost('upd_wifi');
            $wifi = isset($wifi)  ? 1  : 0;

            $limpieza = $request->getPost('upd_limpieza');
            $limpieza = isset($limpieza)  ? 1  : 0;

            $estacionamiento = $request->getPost('upd_estacionamiento');
            $estacionamiento = isset($estacionamiento)  ? 1  : 0;

            $seguridad = $request->getPost('upd_seguridad');
            $seguridad = isset($seguridad)  ? 1  : 0;

            $lavadora = $request->getPost('upd_lavadora');
            $lavadora = isset($lavadora)  ? 1  : 0;

            $cocina = $request->getPost('upd_cocina');
            $cocina = isset($cocina)  ? 1  : 0;

            if($id_group == 2){
                if($id_servicio == ""){
                    $data = [
                        'id_propety' =>$request->getPost('id_propiedad'),
                        'n_roomies' => $request->getPost('upd_numero_roomies'),
                        'n_beds' => $request->getPost('upd_numero_camas'),
                        'n_bathing' => $request->getPost('upd_numero_banos'),
                        'petfrienly' => $request->getPost('upd_petfriendly'),
                        'status_bath' => $request->getPost('upd_status_bano'),
                        'available' => $request->getPost('upd_disponible'),
                        'disability' => $capacidades,
                        'wifi' => $wifi,
                        'cleaning' => $limpieza,
                        'parking' => $estacionamiento,
                        'security' => $seguridad,
                        'washer' => $lavadora,
                        'n_drawers' => $request->getPost('upd_cajones'),
                        'kitchen_room' => $cocina,
                    ];
        
                    $regreso = $model->insert($data);
                    if($regreso !=null){
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'id'       =>$id_propiedad,
                            'id_group' => $id_group,
                            'messages' => [
                                'success' => 'DATOS GUARDADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);   
        
                    }else{
                        $response = [
                            'status'   => 400,
                            'error'    => null,
                            'messages' => [
                                'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                            ]
                        ];
                        return $this->respondCreated($response);    
                    }  
                } else {
                    $data = [
                        'n_roomies' => $request->getPost('upd_numero_roomies'),
                        'n_beds' => $request->getPost('upd_numero_camas'),
                        'n_bathing' => $request->getPost('upd_numero_banos'),
                        'status_bath' => $request->getPost('upd_status_bano'),
                        'petfrienly' => $request->getPost('upd_petfriendly'),
                        'available' => $request->getPost('upd_disponible'),
                        'disability' => $capacidades,
                        'wifi' => $wifi,
                        'cleaning' => $limpieza,
                        'parking' => $estacionamiento,
                        'n_drawers' => $request->getPost('upd_cajones'),
                        'security' => $seguridad,
                        'washer' => $lavadora,
                        'kitchen_room' => $cocina
                    ];
                    $model->update($id_servicio, $data);
                    $this->status($id_servicio, $status = 202);
    
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'id_group' => $id_group,
                        'messages' => [
                            'success' => 'DATOS DE SERVICIOS ACTUALIZADOS CON EXITO'
                        ]
                    ];
                    return $this->respondCreated($response);
                }
            } else {
                $data = [
                    'n_roomies' => $request->getPost('upd_numero_roomies'),
                    'n_beds' => $request->getPost('upd_numero_camas'),
                    'n_bathing' => $request->getPost('upd_numero_banos'),
                    'status_bath' => $request->getPost('upd_status_bano'),
                    'petfrienly' => $request->getPost('upd_petfriendly'),
                    'available' => $request->getPost('upd_disponible'),
                    'disability' => $capacidades,
                    'wifi' => $wifi,
                    'cleaning' => $limpieza,
                    'parking' => $estacionamiento,
                    'n_drawers' => $request->getPost('upd_cajones'),
                    'security' => $seguridad,
                    'washer' => $lavadora,
                    'kitchen_room' => $cocina
                ];
                $model->update($id_servicio, $data);
                $this->status($id_servicio, $status = 202);

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'id_group' => $id_group,
                    'messages' => [
                        'success' => 'DATOS DE SERVICIOS ACTUALIZADOS CON EXITO'
                    ]
                ];
                return $this->respondCreated($response);
            }
        }
    }

    public function get_documentacion()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $id_porpiedad = $request->getPost("id");
            $model = model('App\Models\Mattes\Arrendador_models/Files');
            $data['images'] =  $model->get_pickture($id_porpiedad);
            $data['docs'] = $model->filesDomicilio($id_porpiedad);
            return $this->respond($data, 200);
        }
    }

    public function  delete_file()
    {
        $acceso = Acceso();
        if ($acceso) {
            $model = model('App\Models\Mattes\Arrendador_models/Files');
            $request = \Config\Services::request();
            $id_files = $request->getPost("id");
            $validar =  $model->validar_delete($id_files);
            $name = $model->pickture($id_files);
            $path_absolute = "writable/uploads/Mattes/Arrendador/";
            $filename = $path_absolute . $name['pickture'];
            unlink($filename);

            if ($validar['file_address'] == "0") {
                $model->delete($id_files);
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ARCHIVO ELIMINADO CON EXITO'
                    ]
                ];
                return $this->respondCreated($response);
            } else {

                $data = [
                    'pickture' => " "
                ];

                $model->update($id_files, $data);

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ARCHIVO ELIMINADO CON EXITO'
                    ]
                ];
                return $this->respondCreated($response);
            }
        }
    }

    public function updateFiles()
    {
        $acceso = Acceso();
        if ($acceso) {

            $model = model('App\Models\Mattes\Arrendador_models/Files');
            $request = \Config\Services::request();
            $id_propiedad = $request->getPost("id_propiedad");
            $filesdb = $model->filesDomicilio($id_propiedad);
            $path_absolute = "../../writable/uploads/Mattes/Arrendador/";
            $path = 'uploads/Mattes/Arrendador';
            $recibo = $this->request->getFile('recibo');

            if (isset($recibo) == null) {
                if (empty($filesdb)) {
                    $recibo = "";
                } else {
                    $recibo = $filesdb['file_receipt'];
                }
            } else {
                if (empty($filesdb)) {
                    $newName = $recibo->getRandomName();
                    $recibo->move(WRITEPATH . $path, $newName);
                    $recibo = $recibo->getName();
                } else {
                    $filename = $path_absolute . $filesdb['file_receipt'];
                    unlink($filename);
                    $newName = $recibo->getRandomName();
                    $recibo->move(WRITEPATH . $path, $newName);
                    $recibo = $recibo->getName();
                }
            }

            $domicilio = $this->request->getFile('domicilio');

            if (isset($domicilio) == null) {
                if (empty($filesdb)) {
                    $domicilio = "";
                } else {
                    $domicilio = $filesdb['file_address'];
                }
            } else {
                if (empty($filesdb)) {
                    $newName = $domicilio->getRandomName();
                    $domicilio->move(WRITEPATH . $path, $newName);
                    $domicilio = $domicilio->getName();
                } else {
                    $filename = $path_absolute . $filesdb['file_address'];
                    unlink($filename);
                    $newName = $domicilio->getRandomName();
                    $domicilio->move(WRITEPATH . $path, $newName);
                    $domicilio = $domicilio->getName();
                }
            }

            if (empty($filesdb)) {
                $data = [
                    'id_propety' => $id_propiedad,
                    'file_address' => $domicilio,
                    'file_receipt' => $recibo
                ];
                $model->insert($data);
            } else {
                $data = [
                    'file_address' => $domicilio,
                    'file_receipt' => $recibo
                ];
                $model->update($filesdb['id'], $data);
            }      


            $files = $this->request->getFiles();
            if (isset($files['files'])) {
                $longitud = count($files['files']);
                for ($i = 0; $i <= $longitud - 1; $i++) {
                    if ($files['files'][$i]->isValid() && !$files['files'][$i]->hasMoved()) {
                        $newName = $files['files'][$i]->getRandomName();
                        $files['files'][$i]->move(WRITEPATH . $path, $newName);
                        $name_save = $files['files'][$i]->getName();

                        $data = [
                            'id_propety' => $id_propiedad,
                            'pickture' => $name_save,
                        ];
                        $model->insert($data);
                    }
                }
            }

            $this->status($id_propiedad, $status = 202);
            $affected_rows = $this->db->affectedRows();

            if($affect_rows){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'id_group' => $id_group,
                    'messages' => [
                        'success' => 'DATOS GUARDADOS CON EXITO'
                    ]
                ];
            } else {
                $response = [
                    "status" => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN PROBLEMA. INTENTE DE NUEVO'
                    ]
                ];
            }
            
            return $this->respondCreated($response);
        }
    }

    public function sello_mattes()
    {
        $json = $this->request->getJSON();
        $id_propiedad = $json->id_prop;
        $this->status($id_propiedad, $status = 400);

        // var_dump($id_propiedad);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Solicitud de sello enviada'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function posiciona_prop()
    {
        $json = $this->request->getJSON();
        $id_propiedad = $json->id_prop;
        $this->status($id_propiedad, $status = 402);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Solicitud de posicionamiento enviada'
            ]
        ];
        return $this->respondCreated($response);
        //var_dump($id_propiedad);
    }

    public function status($id_propiedad, $status)
    {
        $model_prop_x_status = model('App\Models\Mattes\Back_office_models/Model_property_admin');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');

        $status_propiedad = [
            'status' => $status
        ];
        $model_propiedad->update($id_propiedad, $status_propiedad);

        $status_prop = [
            'id_property' => $id_propiedad,
            'id_status' => $status
        ];
        $model_prop_x_status->insert($status_prop);
    }
}
