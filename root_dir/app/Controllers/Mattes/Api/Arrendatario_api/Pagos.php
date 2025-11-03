<?php

namespace App\Controllers\Mattes\Api\Arrendatario_api;

require_once __DIR__ . '/../../../vendor/autoload.php';

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('sendmail');

use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiTransactionError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiAuthError;



class Pagos extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $request_form = \Config\Services::request();
        $model_renta = model('App\Models\Mattes\Arrendador_models\Renta');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
        $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_propietario = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $id_prop = $request_form->getPost('propiedad_id');

        $data = [
            'id_alumno' => $request_form->getPost('alumno_user'),
            'id_property' => $id_prop,
            'amount' => $request_form->getPost('costo'),
            'bank' => $request_form->getPost('metodo'),
            'folio' => $request_form->getPost('id_transaccion'),
            'date' => $request_form->getPost('fecha'),
            'entry_date' => $request_form->getPost('fecha_entrada'),
        ];

        $n_alumno = $model_alumno->get_name($request_form->getPost('alumno_user'));
        $n_propiedad = $model_propiedad->get_propiedad($id_prop);
        $email_alumno = $model_users->get_email($request_form->getPost('alumno_user'));
        $id_propietario = $n_propiedad[0]['id_user'];
        $n_propietario = $model_propietario->get_nombre($id_propietario);
        $email_prop = $model_users->get_email($id_propietario);

        //var_dump($data_rent);

        $this->status($id_prop, $status = 601);
        $respuesta = $model_renta->insert($data);

        if ($respuesta != null) {
            $correo = $email_alumno[0]['email'];
            $asunto = 'Aprobación de pago';
            $file = null;
            $datos['usuario'] = $n_alumno[0]['name'];
            $datos['texto'] = " su pago para la renta de la propiedad " . $n_propiedad[0]['name'] . " ha sido exitoso";
            $datos['url'] = "/rentadas";

            $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);
            $email = send_email($correo, $asunto, $mensaje, $file);

            $correo2 = $email_prop[0]['email'];
            $datos2['usuario'] = $n_propietario[0]['name'] . " " . $n_propietario[0]['first_name'] . " " . $n_propietario[0]['second_name'];
            $datos2['texto'] = " su propiedad " . $n_propiedad[0]['name'] . " ha sido rentada.";
            $datos2['url'] = "/Mattes/Arrendador/Index";

            $mensaje2 = view('Mattes/Arrendador_view/Correo_mensajes', $datos2);
            $email_arrendador = send_email($correo2, $asunto, $mensaje2, $file);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'PAGO REALIZADO CON EXITO'
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
        //var_dump($_POST);     
    }

    public function mercado_pago($fecha = null)
    {
        $request = \Config\Services::request();
        $id_pago = $request->getVar('payment_id');
        $ACCESS_TOKEN = "TEST-7971775109331645-071918-28760388ba0f9271b1c8eec610ec8efa-167059581";
        $session = session();
        $user_id = $session->get('unique');
        $fecha = $session->get('fecha');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            //ahora vamos a definir las opciones de conexion de curl
            CURLOPT_URL => "https://api.mercadopago.com/v1/payments/" . $id_pago, //aqui iria el id de tu pago
            CURLOPT_CUSTOMREQUEST => "GET", // el metodo a usar, si mercadopago dice que es post, se cambia GET por POST.
            CURLOPT_RETURNTRANSFER => true, //esto es importante para que no imprima en pantalla y guarde el resultado en una variable
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $ACCESS_TOKEN
            ),
        ));

        $response = curl_exec($curl); //ejecutar CURL
        $json_data = json_decode($response, true);

        $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
        $model_renta = model('App\Models\Mattes\Arrendador_models\Renta');
        $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
        $model_propietario = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
        $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
        $id_propiedad = $model_propiedad->select('id')->where('name', $json_data['description'])->first();

        $data = [
            'id_alumno' => $user_id,
            'id_property' => $id_propiedad['id'],
            'amount' => $json_data['transaction_amount'],
            'bank' => "Mercado Pago",
            'folio' => $id_pago,
            'date' => date("Y-m-d H:i:s"),
            'entry_date' => $fecha
        ];

        $n_alumno = $model_alumno->get_name($user_id);
        $n_propiedad = $model_propiedad->get_propiedad($id_propiedad);
        $email_alumno = $model_users->get_email($user_id);
        $id_propietario = $n_propiedad[0]['id_user'];
        $n_propietario = $model_propietario->get_nombre($id_propietario);
        $email_prop = $model_users->get_email($id_propietario);

        //var_dump($data_rent);

        $this->status($id_propiedad['id'], $status = 601);
        $respuesta = $model_renta->insert($data);


        $session->remove('fecha');

        if ($respuesta != null) {
            $correo = $email_alumno[0]['email'];
            $asunto = 'Aprobación de pago';
            $file = null;
            $datos['usuario'] = $n_alumno[0]['name'];
            $datos['texto'] = " su pago para la renta de la propiedad " . $n_propiedad[0]['name'] . " ha sido exitoso";
            $datos['url'] = "/Mattes/Arrendatario/Propiedades_rentadas";

            $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);
            $email = send_email($correo, $asunto, $mensaje, $file);

            $correo2 = $email_prop[0]['email'];
            $datos2['usuario'] = $n_propietario[0]['name'] . " " . $n_propietario[0]['first_name'] . " " . $n_propietario[0]['second_name'];
            $datos2['texto'] = " su propiedad " . $n_propiedad[0]['name'] . " ha sido rentada.";
            $datos2['url'] = "/Mattes/Arrendador/Index";

            $mensaje2 = view('Mattes/Arrendador_view/Correo_mensajes', $datos2);
            $email_arrendador = send_email($correo2, $asunto, $mensaje2, $file);

            $data["mensaje"] = [
                "status" => 200,
                "msg" => "GRACIAS POR TU PAGO"
            ];

            return redirect()->to(base_url() . '/rentadas');
        } else {
            $data["mensaje"] = [
                "status" => 200,
                "msg" => "GRACIAS POR TU PAGO"
            ];

            return redirect()->to(base_url() . '/Mattes/Arrendatario/Registro');
        }
    }

    public function getDate()
    {
        $request = \Config\Services::request();
        $fecha = $request->getPost("fecha");
        $session = session();

        $session->set('fecha', $fecha);
        $response = [
            'status'   => 200,
            'error'    => null,
        ];

        return $this->respondCreated($response);
    }

    public function status($id_propiedad, $status)
    {
        $model_prop_x_status = model('App\Models\Mattes\Back_office_models/Model_property_admin');
        $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');

        $status_propiedad = [
            'rent' => 1,
            'status' => $status
        ];
        $model_propiedad->update($id_propiedad, $status_propiedad);

        $status_prop = [
            'id_property' => $id_propiedad,
            'id_status' => $status
        ];
        $model_prop_x_status->insert($status_prop);
    }

    public function payOpenpay()
    {
        try {
            // Openpay::setProductionMode(true);
            $request = \Config\Services::request();
            $session = session();
            $user_id = $session->get('unique');
            $openpay = Openpay::getInstance('mzsshclu696xpm7n8qm9', 'sk_e8581a93417247719edcb1fbf68ff014');

            $customer = array(
                'name' => $_POST["name"],
                'last_name' => $_POST["last_name"],
                /*'phone_number' => $_POST["phone_number"],*/
                'email' => $_POST["email"],
            );


            $chargeData = array(
                'method' => 'card',
                'source_id' => $_POST["token_id"],
                'amount' => $_POST["amount"], // formato númerico con hasta dos dígitos decimales. 
                'device_session_id' => $_POST["deviceIdHiddenFieldName"],
                'customer' => $customer
            );

            $charge = $openpay->charges->create($chargeData);
          
            $model_renta = model('App\Models\Mattes\Arrendador_models\Renta');
            $model_propiedad = model('App\Models\Mattes\Arrendador_models\Propiedad');
            $model_alumno = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
            $model_propietario = model('App\Models\Mattes\Arrendador_models\Datos_propietario');
            $model_users = model('App\Models\Mattes\Arrendador_models\Datos_users');
            $id_propiedad = $request->getPost('id_propiedad');

            $n_alumno = $model_alumno->get_name($user_id);
            $n_propiedad = $model_propiedad->get_propiedad($id_propiedad);
            $email_alumno = $model_users->get_email($user_id);
            $id_propietario = $n_propiedad[0]['id_user'];
            $n_propietario = $model_propietario->get_nombre($id_propietario);
            $email_prop = $model_users->get_email($id_propietario);

            $data = [
                'id_alumno' => $user_id,
                'id_property' => $request->getPost('id_propiedad'),
                'amount' => $request->getPost('amount'),
                'bank' => "Openpay",
                'folio' => $charge->id,
                'date' => date("Y-m-d H:i:s"),
                'entry_date' => $request->getPost('fecha_entrada'),
            ];

            $this->status($id_propiedad, $status = 601);
            $respuesta = $model_renta->insert($data);

            $correo = $email_alumno[0]['email'];
            $asunto = 'Aprobación de pago';
            $file = null;
            $datos['usuario'] = $n_alumno[0]['name'];
            $datos['texto'] = " su pago para la renta de la propiedad " . $n_propiedad[0]['name'] . " ha sido exitoso";
            $datos['url'] = "/Mattes/Arrendatario/Propiedades_rentadas";

            $mensaje = view('Mattes/Arrendador_view/Correo_mensajes', $datos);
            $email = send_email($correo, $asunto, $mensaje, $file);

            $correo2 = $email_prop[0]['email'];
            $datos2['usuario'] = $n_propietario[0]['name'] . " " . $n_propietario[0]['first_name'] . " " . $n_propietario[0]['second_name'];
            $datos2['texto'] = " su propiedad " . $n_propiedad[0]['name'] . " ha sido rentada.";
            $datos2['url'] = "/Mattes/Arrendador/Index";

            $mensaje2 = view('Mattes/Arrendador_view/Correo_mensajes', $datos2);
            $email_arrendador = send_email($correo2, $asunto, $mensaje2, $file);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'PAGO REALIZADO CON EXITO'
                ]
            ];
            return $this->respondCreated($response); 

        } catch (OpenpayApiTransactionError $e) {
           /*  error_log('ERROR on the transaction: ' . $e->getMessage() .
                ' [error code: ' . $e->getErrorCode() .
                ', error category: ' . $e->getCategory() .
                ', HTTP code: ' . $e->getHttpCode() .
                ', request ID: ' . $e->getRequestId() . ']', 0); */

                 $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'ERROR on the transaction: '.$e->getMessage()
                ]
            ];
            return $this->respondCreated($response);





        } catch (OpenpayApiRequestError $e) {
            //error_log('ERROR on the request: ' . $e->getMessage(), 0);

            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'ERROR on the request: '.$e->getMessage()
                ]
            ];
            return $this->respondCreated($response);



        } catch (OpenpayApiConnectionError $e) {
           // error_log('ERROR while connecting to the API: ' . $e->getMessage(), 0);
           $response = [
            'status'   => 400,
            'error'    => null,
            'messages' => [
                'success' => 'ERROR while connecting to the API: '.$e->getMessage()
            ]
        ];
        return $this->respondCreated($response);


        } catch (OpenpayApiAuthError $e) {
           // error_log('ERROR on the authentication: ' . $e->getMessage(), 0);
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'ERROR on the authentication: '.$e->getMessage()
                ]
            ];
            return $this->respondCreated($response);
        } catch (OpenpayApiError $e) {
           // error_log('ERROR on the API: ' . $e->getMessage(), 0);
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'ERROR on the API: '.$e->getMessage()
                ]
            ];
            return $this->respondCreated($response);
        }
    }
}
