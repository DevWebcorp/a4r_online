<?php 

namespace App\Controllers\Apis;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\a4r\Registro_propietario as RegistroModel;

class Registro_propietario extends ResourceController 
{
    use ResponseTrait;
    var $model;
    var $db;

    public function __construct() { 
        $this->model = new RegistroModel();
        $this->db = db_connect();
    }

    // CREAR UN PROPIETARIO
    public function create() {
        foreach ($_POST as $name => $val) {
            $data[$name] = $val;
        }  
        try  {
            //retun id
            $id = $this->model->insert($data);
            return $this->respondCreated([
                'status' => 200,
                'message' => 'Agregado con exito',
            ]);        
        } catch (\Exception $e) {
            return $this->failServerError('Error en la base de datos: ' . $e->getMessage());
        }
    }
    

}