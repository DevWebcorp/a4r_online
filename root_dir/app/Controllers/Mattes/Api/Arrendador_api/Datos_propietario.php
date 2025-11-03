<?php

namespace App\Controllers\Mattes\Api\Arrendador_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');




class Datos_propietario extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request_form = \Config\Services::request();
            $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
            $path = 'uploads/Mattes/Arrendador';
            if ($request_form->getPost('id_usuarioper') == "") {
                $id_user = $session->get('unique');
            } else {
                $id_user = $request_form->getPost('id_usuarioper');
            }
            $total = count($model->total($id_user));
            $path = 'uploads/Mattes/Arrendador';
            $path_absolute = "writable/uploads/Mattes/Arrendador/";

            $file = $this->request->getFile('file');
            //$identificacion = $this->request->getFile('file_identificacion');

            if ($total > 0) {
                $id_datos = $model->get_id($id_user);

                if (!$file->isValid()) {
                    $file_user = $id_datos->photo;
                } else {
                    $filename = $path_absolute . $id_datos->photo;
                    unlink($filename);
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . $path, $newName);
                    $file_user = $file->getName();
                }

              /*   if (!$identificacion->isValid()) {
                    $name_ine = $id_datos->ine;
                } else {
                    $filename2 = $path_absolute . $id_datos->ine;
                    unlink($filename2);
                    $name_ident = $identificacion->getRandomName();
                    $identificacion->move(WRITEPATH . $path, $name_ident);
                    $name_ine = $identificacion->getName();
                } */

                $data = [
                    'id_user' => $id_user,
                    'name' => $request_form->getPost('nombre'),
                    'first_name' => $request_form->getPost('apellido'),
                    'second_name' => $request_form->getPost('segundo_apellido'),
                    'birth_date' => $request_form->getPost('f_nacimiento'),
                    'phone' => $request_form->getPost('celular'),
                    //'ine' => $name_ine,
                    'photo' => $file_user
                ];

                $respuesta = $model->update($id_datos->id, $data);

                if ($respuesta != null) {
                    $estado =  $this->status($id_user);
                    if ($estado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'ACTUALIZADO CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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
                $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');

                if (!$file->isValid()) {
                    $file_user = "";
                } else {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . $path, $newName);
                    $file_user = $file->getName();
                }

               /*  if ($identificacion->isValid()) {
                    $name_ident = $identificacion->getRandomName();
                    $identificacion->move(WRITEPATH . $path, $name_ident);
                    $name_ine = $identificacion->getName();
                } */

                $data = [
                    'id_user' => $id_user,
                    'name' => $request_form->getPost('nombre'),
                    'first_name' => $request_form->getPost('apellido'),
                    'second_name' => $request_form->getPost('segundo_apellido'),
                    'birth_date' => $request_form->getPost('f_nacimiento'),
                    'phone' => $request_form->getPost('celular'),
                    //'ine' => $name_ine,
                    'photo' => $file_user
                   
                ];

                $respuesta = $model->insert($data);

                //var_dump($data);

                if ($respuesta != null) {
                    $verificado =  $this->verify($id_user);
                    if ($verificado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'AGREGADO CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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

    public function datos_banco(){
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request = \Config\Services::request();
            $group_id = $session->get('utype');

            if($group_id == 2){
                if ($request->getPost('id_usuarioban') == "") {
                    $data = [
                        "status" => 400,
                        'messages' => [
                            'success' => 'NO HAY DATOS DE PROPIETARIO REGISTRADOS'
                        ]
                    ];
                    return $this->respond($data);
                } else {
                    $id_user = $request->getPost('id_usuarioban');
                }
            } else {
                if ($request->getPost('id_usuarioban') == "") {
                    $id_user = $session->get('unique');
                } else {
                    $id_user = $request->getPost('id_usuarioban');
                }
            }

            $model = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
            $total =  count($model->get_bancarios($id_user));

            if ($total > 0) {
                $id_bank = $model->get_id($id_user);

                $data = [
                    'id_user' => $id_user,
                    'full_name' => $request->getPost('name_bancario'),
                    'bank_name' => $request->getPost('nombre_banco'),
                    'interbank_number' => $request->getPost('clabe_bancaria'),
                ];
                $respuesta = $model->update($id_bank->id, $data);
                if ($respuesta != null) {
                    $estado =  $this->status($id_user);
                    if ($estado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'DATOS ACTUALIZADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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
                    'id_user' => $id_user,
                    'full_name' => $request->getPost('name_bancario'),
                    'bank_name' => $request->getPost('nombre_banco'),
                    'interbank_number' => $request->getPost('clabe_bancaria'),
                ];
                $respuesta = $model->insert($data);
                if ($respuesta != null) {
                    $verificado =  $this->verify($id_user);
                    if ($verificado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'DATOS GUARDADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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

    public function datos_fiscales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $session = session();
            $group_id = $session->get('utype');

            if($group_id == 2){
                if ($request->getPost('id_usuariofis') == "") {
                    $data = [
                        "status" => 400,
                        'messages' => [
                            'success' => 'NO HAY DATOS DE PROPIETARIO REGISTRADOS'
                        ]
                    ];
                    return $this->respond($data);
                } else {
                    $id_user = $request->getPost('id_usuariofis');
                }
            } else {
                if ($request->getPost('id_usuariofis') == "") {
                    $id_user = $session->get('unique');
                } else {
                    $id_user = $request->getPost('id_usuariofis');
                }
            }

            
            $model = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
            $total =  count($model->get_fiscales($id_user));

            if ($total > 0) {
                $id_fiscal = $model->get_id($id_user);
                $data = [
                    'id_user' => $id_user,
                    'rfc' => $request->getPost('rfc'),
                    'fiscal_address' => $request->getPost('direccion_fiscal'),

                ];

                $respuesta = $model->update($id_fiscal->id, $data);
                if ($respuesta != null) {
                    $estado =  $this->status($id_user);
                    if ($estado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'DATOS ACTUALIZADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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

                $session = session();
                $data = [
                    'id_user' => $id_user,
                    'rfc' => $request->getPost('rfc'),
                    'fiscal_address' => $request->getPost('direccion_fiscal'),

                ];

                $respuesta = $model->insert($data);
                if ($respuesta != null) {

                    $verificado =  $this->verify($id_user);
                    if ($verificado) {
                        $response = [
                            'status'   => 200,
                            'error'    => null,
                            'messages' => [
                                'success' => 'DATOS GUARDADOS CON EXITO'
                            ]
                        ];
                        return $this->respondCreated($response);
                    }
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

    public function datos_notificaciones()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $session = session();
            $group_id = $session->get('utype');

            if($group_id == 2){
                if ($request->getPost('id_usuarionot') == "") {
                    $data = [
                        "status" => 400,
                        'messages' => [
                            'success' => 'NO HAY DATOS DE PROPIETARIO REGISTRADOS'
                        ]
                    ];
                    return $this->respond($data);
                } else {
                    $id_user = $request->getPost('id_usuarionot');
                }
            } else {
                if ($request->getPost('id_usuarionot') == "") {
                    $id_user = $session->get('unique');
                } else {
                    $id_user = $request->getPost('id_usuarionot');
                }
            }

            $model = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
            $total =  count($model->get_notificaciones($id_user));

            if ($total > 0) {
                $id_notificacion = $model->get_id($id_user);
                $noti_correo = $request->getPost('notis_correo');
                $noti_correo = isset($noti_correo)  ? 1  : 0;
                $noti_citas = $request->getPost('nuevas_citas');
                $noti_citas = isset($noti_citas)  ? 1  : 0;
                $avisos = $request->getPost('avisos');
                $avisos = isset($avisos)  ? 1  : 0;
                $mensajes = $request->getPost('mensajes');
                $mensajes = isset($mensajes)  ? 1  : 0;
                $promos = $request->getPost('promos');
                $promos = isset($promos)  ? 1  : 0;

                $data = [
                    'id_user' => $id_user,
                    'email' => $noti_correo,
                    'appointment' => $noti_citas,
                    'notices' => $avisos,
                    'message' => $mensajes,
                    'promotions' => $promos,

                ];

                $respuesta = $model->update($id_notificacion->id, $data);
                if ($respuesta != null) {
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS ACTUALIZADOS CON EXITO'
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
                $noti_correo = $request->getPost('notis_correo');
                $noti_correo = isset($noti_correo)  ? 1  : 0;
                $noti_citas = $request->getPost('nuevas_citas');
                $noti_citas = isset($noti_citas)  ? 1  : 0;
                $avisos = $request->getPost('avisos');
                $avisos = isset($avisos)  ? 1  : 0;
                $mensajes = $request->getPost('mensajes');
                $mensajes = isset($mensajes)  ? 1  : 0;
                $promos = $request->getPost('promos');
                $promos = isset($promos)  ? 1  : 0;

                $data = [
                    'id_user' => $id_user,
                    'email' => $noti_correo,
                    'appointment' => $noti_citas,
                    'notices' => $avisos,
                    'message' => $mensajes,
                    'promotions' => $promos,

                ];

                $respuesta = $model->insert($data);
                if ($respuesta != null) {
                    $response = [
                        'status'   => 200,
                        'error'    => null,
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
            } 
        }
    }

    public function get_pesonales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
            $data = $model->total($session->get('unique'));
            return $this->respond($data, 200);
        }
    }

    public function get_bancario()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
            $data = $model->get_bancarios($session->get('unique'));
            return $this->respond($data, 200);
        }
    }

    public function get_fiscales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
            $data = $model->get_fiscales($session->get('unique'));
            return $this->respond($data, 200);
        }
    }

    public function get_notificaciones()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Accesos_Notificaciones');
            $data = $model->get_notificaciones($session->get('unique'));
            return $this->respond($data, 200);
        }
    }

    public function verify($id_user)
    {
        $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $model_status = model('App\Models\Mattes\Back_office/Back_Arrendador');
        $validar = $model->validar($id_user);
        $total = count($validar);

        if ($total > 0) {
            $data = [
                'id_user' => $id_user,
                'id_status' => 100,
            ];

            $model_status->insert($data);
            $id_datos = $model->select('id')->where('id_user', $id_user)->first();

            $data_indentity = [
                'status' => 100,
            ];

            $model->update($id_datos['id'], $data_indentity);
        }
        return true;
    }

    public function status($id_user)
    {
        $model = model('App\Models\Mattes\Arrendador_models/Datos_propietario');
        $model_status = model('App\Models\Mattes\Back_office/Back_Arrendador');

        $data = [
            'id_user' => $id_user,
            'id_status' => 100,
        ];

        $model_status->insert($data);
        $id_datos = $model->select('id')->where('id_user', $id_user)->first();

        $data_indentity = [
            'status' => 100,
        ];

        $model->update($id_datos['id'], $data_indentity);

        return true;
    }
}
