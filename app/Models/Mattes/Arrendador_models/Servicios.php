<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Servicios extends Model
{
    protected $table      = 'propertyservices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_propety','n_roomies', 'n_beds' , 'n_bathing','petfrienly','status_bath', 'available','disability',
    'wifi','cleaning', 'parking','security','washer','n_drawers','kitchen_room','created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_info($id_prop){
        $sql = 'SELECT COUNT(*) AS total FROM propertyservices WHERE id_propety = ?';
        $informacion = $this->db->query($sql, [$id_prop]);
        return $informacion->getResult();
    }

   public function get_services($id_serv){
        return $this->asArray()->where('id_propety',$id_serv)->findall();
    }
}