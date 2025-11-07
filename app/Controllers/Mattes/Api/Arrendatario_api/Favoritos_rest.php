<?php 

namespace App\Controllers\Mattes\Api\Arrendatario_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');

class Favoritos_rest extends ResourceController 
{
    use ResponseTrait;
    
    public function index(){
        $acceso = Acceso();
        if($acceso) {
            $session = session();
            $user_id = $session->get('unique');
            //var_dump($user_id);
            $model_favorite = model('App\Models\Mattes\Arrendatario_Models\Model_favoritos');
            $data = $model_favorite->get_favorite2($user_id);
            return $this->respond($data, 200);  
        }
        
    }


    public function insert_favorite(){
        $acceso = Acceso();
        if($acceso) {
            $model_favorite = model('App\Models\Mattes\Arrendatario_Models\Model_favoritos');
            $json = $this->request->getJSON();
            $session = session();
            $user_id = $session->get('unique');
            $id_propiedad = $json->propiedad;
            $favorite = $json->favorito;

            if($favorite == 1){
                $newfav = 0;
            } else {
                $newfav = 1;
            }

            $id_fav = $model_favorite->select('id')->where('id_user', $user_id)->where('id_property', $id_propiedad)->first();
            
            if($id_fav){
                $id = $id_fav['id'];

                $data = [
                    'favorite' => $newfav
                ];
                //var_dump($data);

                $model_favorite->update($id, $data);

                if($newfav == 0){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'PROPIEDAD ELIMINADA DE FAVORITOS',
                            'favorito' => $newfav
                        ]
                    ];
                } else {
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'PROPIEDAD AGREGADA A FAVORITOS',
                            'favorito' => $newfav
                        ]
                    ];
                }

               
            } else {
                $data = [
                    'id_user' => $user_id,
                    'id_property' => $id_propiedad,
                    'favorite' => $newfav
                ];
                
                $model_favorite->insert($data);
                
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'PROPIEDAD AGREGADA A FAVORITOS',
                        'favorito' => $newfav
                    ]
                ];
            }
        
            return $this->respondCreated($response);

        } else {
            return redirect()->to(base_url('Mattes/Login'));
        }
    }

    public function del_favorite(){
        $acceso = Acceso();
        if($acceso) {
            $model_favorite = model('App\Models\Mattes\Arrendatario_Models\Model_favoritos');
            $json = $this->request->getJSON();
            $session = session();
            $user_id = $session->get('unique');
            $id_propiedad = $json->propiedad;

            $id_fav = $model_favorite->select('id')->where('id_user', $user_id)->where('id_property', $id_propiedad)->first();
            if($id_fav){
                $id = $id_fav['id'];

                $data = [
                    'favorite' => 0
                ];

                $respuesta = $model_favorite->update($id, $data);

                if($respuesta){
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' => 'PROPIEDAD ELIMINADA DE FAVORITOS'
                        ]
                    ];
                } else {
                    $response = [
                        'status'   => 400,
                        'error'    => null,
                        'messages' => [
                            'success' => 'HUBO UN ERROR, INTENTE NUEVAMENTE'
                        ]
                    ];
                }
            } else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'HUBO UN ERROR, INTENTE NUEVAMENTE'
                    ]
                ];
            }
            

            return $this->respondCreated($response);

        } else {
            return redirect()->to(base_url('Mattes/Login'));
        }
       
    }
}