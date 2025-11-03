<?php

namespace App\Models\Mattes\Back_office;

use CodeIgniter\Model;

class Back_Arrendador extends Model
{
    protected $table      = 'admin_renter';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'id_status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function lista_propietarios($sql){
        return $this->db->query($sql)->getResult();
    }


}