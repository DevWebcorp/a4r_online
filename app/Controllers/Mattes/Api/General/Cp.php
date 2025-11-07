<?php 

namespace App\Controllers\Mattes\Api\General;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

helper('Acceso');


class Cp extends ResourceController
{
    use ResponseTrait;

    public function index(){
        $acceso = Acceso();
        if($acceso){
            $json = $this->request->getJSON();
            $limit = $json->limit;
            $offset = $json->offset;
            $search = $json->search;
            //var_dump($json);
            $model = model('App\Models\Mattes\Arrendador_models\Cp');
            $data['data'] = $model->like('CP',$search)->orderBy('ID', 'CP')->findAll($limit , $offset);
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
        
    }
    

}