<?php 

namespace App\Controllers\Api\Administrador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Index_rest extends ResourceController
{
    use ResponseTrait;

    public function index(){
        $user_model = model('App\Models\Model_administrativos\Model_mini_c10');
        $data['data'] = $user_model->get_minic10();
        return $this->respond($data, 200);
    }

  public function get_ce10(){
        $json = $this->request->getJSON();
        $limit = $json->limit;
        $offset = $json->offset;
        $search = $json->search;
        //var_dump($json);
        $model = model('App\Models\Models_hcv\Model_cie10');
        $data['data'] = $model->like('NOMBRE',$search)->orderBy('ID', 'NOMBRE')->findAll($limit , $offset);
        $response = [
            'status'   => 200,
            'error'    => null,
            'data'     => $data['data'],
            'messages' => [
                'success' => 'ok'
              ]
          ];
        return $this->respond($response);
    }

    public function create(){
        $model = model('App\Models\Models_hcv\Model_cie10_mini');
        $json = $this->request->getJSON();
        $data = [
            'nombre_comun' => $json->comun, 
            'cie10_id' => $json->idcie,
            'categoria' => $json->categoria   
        ];
        $model->insert($data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'AGREGADO CON EXITO'
            ]
          ];
      return $this->respondCreated($response);  
    }

    public function delete_elemento(){
        $json = $this->request->getJSON();
        $model = model('App\Models\Models_hcv\Model_cie10_mini');
        $id = $json->id_delete;
        $data = $model->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'ELIMINADO CON EXITO'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('NO ENCONTRADO');
        }

    }

    public function update_elemento(){
        $json = $this->request->getJSON();
        $model = model('App\Models\Models_hcv\Model_cie10_mini');
        $id = $json->id;
        $data = $model->get_data($id);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('NO SE ENCONTRO EL ESTATUS');
        }
    }

    public function actualizar(){
        $model = model('App\Models\Models_hcv\Model_cie10_mini');
        $json = $this->request->getJSON();
        $id = $json->id_mini;
       $data = [
            'nombre_comun' => $json->comun, 
            'cie10_id' => $json->idcie,
            'categoria' => $json->categoria   
        ];
        $model->update($id,$data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'ACTUALIZADO CON EXITO'
            ]
          ];
      return $this->respondCreated($response);  

    }

  

    
   
}