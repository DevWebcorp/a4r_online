<?php 

namespace App\Controllers\Apis;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\a4r\Datos_propietario as GruposModel;



class Datos_propietario extends ResourceController 
{
    use ResponseTrait;
    var $model;
    var $db;

    public function __construct() { 
       $this->model = new GruposModel();
        $this->db = db_connect();
    }

     public function create()
    {
        if (!hasApiAccess()) {
            return $this->response->setJSON([
                'status' => 403,
                'message' => 'No tienes acceso a este recurso'
            ])->setStatusCode(403);
        }
        
        $data = $this->request->getPost();

        $rules = [
            'nombre' => 'required|min_length[2]',
            'description' => 'required|permit_empty|max_length[250]'
        ];

        // if (!$this->validate($rules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        try 
        {
            $id = $this->model->insert($data);
            return $this->respondCreated([
                'status' => 200,
                'message' => 'Agregado con exito',
            ]);
        
        } catch (\Exception $e) {
            return $this->failServerError('Error en la base de datos: ' . $e->getMessage());
        }
    }

    public function getProfiles()
    {
        if (!hasApiAccess()) {
            return $this->response->setJSON([
                'status' => 403,
                'message' => 'No tienes acceso a este recurso'
            ])->setStatusCode(403);
        }
         
        $session = session();
        if ($session->group == 1) {
            $data['data'] = $this->model->getGroups();
            return $this->respond($data, 200);
        }else{
            $data['data'] = $this->model->getGrupFilt();
            return $this->respond($data, 200);
        }
    }

    public function updatePerfil(){
        $datos = $this->request->getPost();
        $id = $datos['idPerfil'] ?? null;

        if ($id && $this->model->find($id)) {
            
            $dataUpdate = [
                'nombre'      => $datos['nombre'],
                'description' => $datos['description'],
            ];

            // Hacer el update
            $this->model->update($id, $dataUpdate);
            return $this->respondCreated([
                'status' => 200,
                'message' => 'Actualizado con exito',
            ]);
        } else {
            return $this->respondCreated([
                'status' => 400,
                'message' => 'Error intentalo mas tarde',
            ]);
        }
    }

    public function deletePerfil(){
        if (!hasApiAccess()) {
            return $this->response->setJSON([
                'status' => 403,
                'message' => 'No tienes acceso a este recurso'
            ])->setStatusCode(403);
        }
        
        $id = $this->request->getPost('iDelete') ?? $this->request->getJsonVar('iDelete');
    
        // Validar que exista el ID
        if (empty($id)) {
            return $this->respondCreated([
                'status' => 400,
                'message' => 'Error intentalo mas tarde',
            ]);
        }


        try {
            if ($this->model->delete($id)) {
                return $this->respondCreated([
                    'status' => 200,
                    'message' => 'Eliminado con exito',
                ]);
            } else {
                return $this->respondCreated([
                    'status' => 404,
                    'message' => 'No se pudo eliminar el registro',
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => null
            ]);
        }

    }

}