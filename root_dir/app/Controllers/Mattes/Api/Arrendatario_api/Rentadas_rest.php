<?php 

namespace App\Controllers\Mattes\Api\Arrendatario_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');

class Rentadas_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $model_rent = model('App\Models\Mattes\Arrendador_models\Renta');
            $model_comment = model('App\Models\Mattes\Arrendatario_Models\Model_opinions');
            $data = $model_rent->get_rentadas($user_id);

            for ($i = 0; $i < count($data); ++$i) {
                $asignado = false;

                $coments = $model_comment->select('id_property')->where('id_user', $data[0]->id_alumno)->findAll();
                for ($j = 0; $j < count($coments); ++$j) {
                    if ($data[$i]->id_property === $coments[$j]["id_property"]) {
                        $asignado = true;
                    }
                }
                
                $data[$i]->asignado = $asignado;
            }

            //var_dump($data);

            //var_dump($data); 
            return $this->respond($data, 200);  
        }
    }

    public function calificar(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            $comment = $_POST['comment'];
            $id_propiedad = $_POST['propiedad'];
            $valor = $_POST['valor'];

            $model_comment = model('App\Models\Mattes\Arrendatario_Models\Model_opinions');
            $model_rating = model('App\Models\Mattes\Arrendador_models\Rating');

            $rating_id = $model_rating->get_id_rat($id_propiedad);

            $data = [
                'id_user' => $user_id,
                'id_property' => $id_propiedad,
                'comment' => $comment,
                'qualification' => $valor
            ];

            if($rating_id == NULL){
                $data_rating = [
                    'id_property' => $id_propiedad,
                    'users_count' => 1,
                    'property_count' => $valor
                ];               
                $rating = $model_rating->insert($data_rating);
            } else {
                $id_rating = $rating_id['id'];
                $datos = $model_rating->get_datos($id_propiedad);
                $user = $datos[0]['users_count'];
                $count = $datos[0]['property_count'];
                $users_count = $user + 1;
                $property_count = $count + $valor;

                $data_update = [
                    'users_count' => $users_count,
                    'property_count' => $property_count
                ];
                $model_rating->update($id_rating, $data_update);
            }

            $opinion = $model_comment->insert($data);

            if($opinion !=null){
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'COMENTARIO ENVIADO. GRACIAS POR TU PREFERENCIA'
                    ]
                ];
            }else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                    ]
                ];
            } 

            return $this->respondCreated($response);

        }
    }
        

    
}