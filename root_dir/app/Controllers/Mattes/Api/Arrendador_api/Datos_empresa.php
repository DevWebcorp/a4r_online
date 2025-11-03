<?php

namespace App\Controllers\Mattes\Api\Arrendador_api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');
helper('sendmail');

class Datos_empresa extends ResourceController
{
    use ResponseTrait;


    public function index()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $request_form = \Config\Services::request();
            if ($request_form->getPost('id_usuarioper') == "") {
                $id_user = $session->get('unique');
            } else {
                $id_user = $request_form->getPost('id_usuarioper');
            }
            //ARCHIVO DE DATOS DE EMPRESA
            //$file = $this->request->getFile('file');
            $model = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $total = count($model->total($id_user));
            $path = 'uploads/Mattes/Arrendador/comprobantes';
            $path_absolute = "writable/uploads/Mattes/Arrendador/comprobantes/";
            if ($total > 0) {
                $id_datos = $model->get_id($id_user);

                //ACTUALIZAR DATOS EMPRESA

              /*   if (!$file->isValid()) {
                    $file_comprobante = $id_datos->proof_of_address;
                } else {
                    $filename = $path_absolute . $id_datos->proof_of_address;
                    unlink($filename);
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . $path, $newName);
                    $file_comprobante = $file->getName();
                } */

                $data = [
                    'id_user' => $id_user,
                    'name' => $request_form->getPost('nombre_inmobiliaria'),
                    //'rfc' => $request_form->getPost('rfc_inmobiliaria'),
                    'razon_social' => $request_form->getPost('razonsocial_inmobiliaria'),
                    //'address' => $request_form->getPost('direccion_inmobiliaria'),
                    'legal_representation' => $request_form->getPost('representante_legal'),
                    //'email' => $request_form->getPost('correo_inmobiliaria'), 
                    'phone' => $request_form->getPost('telefono_inmobiliaria'),
                    //'proof_of_address' => $file_comprobante
                ];

                $datos_empresa = $model->update($id_datos->id, $data);

                if ($datos_empresa != null) {
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
                /* if (!$file->isValid()) {
                    $file_comprobante = "";
                } else {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . $path, $newName);
                    $file_comprobante = $file->getName();
                } */


                $data = [
                    'id_user' => $id_user,
                    'name' => $request_form->getPost('nombre_inmobiliaria'),
                    //'rfc' => $request_form->getPost('rfc_inmobiliaria'),
                    'razon_social' => $request_form->getPost('razonsocial_inmobiliaria'),
                    //'address' => $request_form->getPost('direccion_inmobiliaria'),
                    'legal_representation' => $request_form->getPost('representante_legal'),
                    //'email' => $request_form->getPost('correo_inmobiliaria'), 
                    'phone' => $request_form->getPost('telefono_inmobiliaria'),
                    //'proof_of_address' => $file_comprobante
                ];

                $datos_empresa = $model->insert($data);

                if ($datos_empresa != null) {
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

    public function datos_banco()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $session = session();
            if ($request->getPost('id_usuarioban') == "") {
                $id_user = $session->get('unique');
            } else {
                $id_user = $request->getPost('id_usuarioban');
            }
            $model_banco = model('App\Models\Mattes\Arrendador_models/Datos_Bancarios');
            $total =  count($model_banco->get_bancarios($id_user));

            if ($total > 0) {
                $id_bank = $model_banco->get_id($id_user);

                $data = [
                    'id_user' => $id_user,
                    'full_name' => $request->getPost('inmobiliaria_nombre'),
                    'bank_name' => $request->getPost('banco_nombre'),
                    'interbank_number' => $request->getPost('clabe_bancaria'),
                ];

                $respuesta = $model_banco->update($id_bank->id, $data);

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
                    'full_name' => $request->getPost('inmobiliaria_nombre'),
                    'bank_name' => $request->getPost('banco_nombre'),
                    'interbank_number' => $request->getPost('clabe_bancaria'),
                ];

                $datos_banc = $model_banco->insert($data);
                if ($datos_banc != null) {
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
            if ($request->getPost('id_usuariofis') == "") {
                $id_user = $session->get('unique');
            } else {
                $id_user = $request->getPost('id_usuariofis');
            }
            $model_fiscales = model('App\Models\Mattes\Arrendador_models/Datos_Fiscales');
            $total =  count($model_fiscales->get_fiscales($id_user));

            if ($total > 0) {
                $id_fiscal = $model_fiscales->get_id($id_user);

                $data = [
                    'id_user' => $id_user,
                    'rfc' => $request->getPost('rfc'),
                    'fiscal_address' => $request->getPost('direccion_fiscal'),

                ];

                $respuesta = $model_fiscales->update($id_fiscal->id, $data);
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
                    'rfc' => $request->getPost('rfc'),
                    'fiscal_address' => $request->getPost('direccion_fiscal'),

                ];

                $datos_fisc = $model_fiscales->insert($data);
                if ($datos_fisc != null) {
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
            if ($request->getPost('id_usuarionot') == "") {
                $id_user = $session->get('unique');
            } else {
                $id_user = $request->getPost('id_usuarionot');
            }
            $session = session();
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

                $datos_notificaciones = $model->insert($data);
                if ($datos_notificaciones != null) {
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

    public function update_estatus()
    {
        $acceso = Acceso();
        if ($acceso) {

            $model_active = model('App\Models\Mattes\Arrendador_models\Datos_users', false);
            $json = $this->request->getJSON();
            $id_user = $json->id;
            $checkbox = $json->valor;

            if ($checkbox) {
                $data = [
                    'active' => 1
                ];

                $model_active->update($id_user, $data);

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ACTUALIZADO CON EXITO'
                    ],
                ];
                return $this->respondCreated($response);
            } else {
                $data = [
                    'active' => 0
                ];

                $model_active->update($id_user, $data);

                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'ACTUALIZADO CON EXITO'
                    ],
                ];
                return $this->respondCreated($response);
            }
        }
    }


    public function get_agentes()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $id_user = $session->get('unique');
            $agentes = model('App\Models\Mattes\Arrendador_models\Datos_users', false);
            $data['data'] = $agentes->datos_agentes($id_user);
            return json_encode($data);
        }
    }

    public function perfil_agente()
    {
        $acceso = Acceso();
        if ($acceso) {
            $validation = \Config\Services::validation();
            $request = \Config\Services::request();
            $session = session();
            $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
            $foto_perfil = $this->request->getFile('file_agente');
            //$identificacion = $request->getFile('ine_agente');
            //$ruta = 'uploads/Mattes/Arrendador/fotos';
            $ruta = 'uploads/Mattes/Agente';
        
            $correo = $request->getPost('correo_agente');
            $validar_correo = $model_user->correo_repetido($correo);

            if ($validar_correo > 0) {
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'El correo ya existe ingrese otro'
                    ]
                ];
                return $this->respondCreated($response);
            } else {
                if (!$foto_perfil->isValid()) {
                    $foto_agente = "";
                } else {
                    $newName = $foto_perfil->getRandomName();
                    $foto_perfil->move(WRITEPATH . $ruta, $newName);
                    $foto_agente = $foto_perfil->getName();
                }

              /*   if (!$identificacion->isValid()) {
                    $ine_agente = "";
                } else {
                    $newName = $identificacion->getRandomName();
                    $identificacion->move(WRITEPATH . $ruta, $newName);
                    $ine_agente = $identificacion->getName();
                }
 */
                $id_group = 5; //id correspondiente al perfil de agente
                $correo = $request->getPost('correo_agente');

                $token = password_hash($correo, PASSWORD_DEFAULT);
                $token = str_replace('/', '&&&', $token);

                $user = [
                    'id_parent' => $session->get('unique'),
                    'email' => $correo,
                    "activation_token" => $token,
                    'id_group' => $id_group,
                    "active" => 1
                ];
                $datos_perfil = $model_user->insert($user);

                $owner = [
                    'id_user' => $datos_perfil,
                    'phone' => $request->getPost('tel_agente'),
                    'photo' => $foto_agente,
                    'name' => $request->getPost('nombre_agente'),
                    'first_name' => $request->getPost('apellidof'),
                    'second_name' => $request->getPost('apellidos'),
                   // 'ine' => $ine_agente
                ];
                $dato_owner = $model_identity->insert($owner);

                if ($datos_perfil > 0 && $dato_owner > 0) {
                    $asunto = "Registro Mattes";
                    $data['usuario'] = $request->getPost('nombre_agente') .
                        $request->getPost('apellidof') . $request->getPost('apellidos');
                    $data['token'] = $token;
                    //$correo = "belcros90@gmail.com";
                    $mensaje = view('Login/enviar_acceso', $data);
                    $file = null;
                    $email = send_email($correo, $asunto, $mensaje, $file);
                    //echo view('Login/Signin_view' ,  $data);

                } else {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR'
                        ]
                    ];
                    return $this->respondCreated($response);
                }

                if ($email) {
                    
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'DATOS GUARDADOS CON EXITO'
                        ]
                    ];
                    return $this->respondCreated($response);
                    //var_dump($email);

                } else {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                        ]
                    ];
                    return $this->respondCreated($response);
                    //var_dump($email);
                }
            }
        }
    }

    public function update_agente()
    {
        $acceso = Acceso();
        if ($acceso) {
            $request = \Config\Services::request();
            $id_user = $request->getPost('id');

            $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
            $path = "../writable/uploads/Mattes/Agente";
            $id_data = $model_identity->select('id')->where('id_user', $id_user)->find();
            $id = $id_data[0]['id'];

            $foto_perfil = $this->request->getFile('file');

            if (!$foto_perfil->isValid()) {
                $foto_agente = "";
            } else {
                $newName = $foto_perfil->getRandomName();
                $foto_perfil->move(WRITEPATH . $path, $newName);
                $foto_agente = $foto_perfil->getName();
            }

            $owner = [
                'phone' => $request->getPost('telefono'),
                'photo' => $foto_agente,
                'name' => $request->getPost('nombre'),
                'first_name' => $request->getPost('apellido'),
                'second_name' => $request->getPost('apellidos')
            ];

            $model_identity->update($id, $owner);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS GUARDADOS CON EXITO'
                ]
            ];
            return $this->respondCreated($response);
        }
    }


    public function get_pesonales()
    {
        $acceso = Acceso();
        if ($acceso) {
            $session = session();
            $model = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
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

    public function envio_acceso()
    {
        $request = \Config\Services::request();
        $id_user = $request->getPost('id');
        $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
        $data = $model_user->get_user($id_user);
        $nombre = $data['name'];
        $firs_name = $data['first_name'];
        $second_name = $data['second_name'];
        $correo = $data['email'];

        $token = password_hash($correo, PASSWORD_DEFAULT);
        $token = str_replace('/', '&&&', $token);
        $token = str_replace('.', '&', $token);

        $user = [
            "activation_token" => $token,
            'password' => "",
            "active" => 1
        ];

        $status = $model_user->update($id_user, $user);

        $asunto = "Accesos Mattes";
        $data['usuario'] = $nombre . " " . $firs_name . " " . $second_name;
        $data['token'] = $token;


        $mensaje = view('Login/enviar_acceso', $data);
        $file = null;
        $email = send_email($correo, $asunto, $mensaje, $file);


        if ($status != null && $email) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Accesos enviado con exito'
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

    //get data agente//

    public function get_agente()
    {
        $request = \Config\Services::request();
        $model_user = model('App\Models\Mattes\Arrendador_models/Datos_users');
        // $model_identity = model('App\Models\Mattes\Arrendador_models/Datos_Empresa');
        $id_agente = $request->getPost('id');
        $data = $model_user->get_agente($id_agente);
        return $this->respond($data, 200);
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
