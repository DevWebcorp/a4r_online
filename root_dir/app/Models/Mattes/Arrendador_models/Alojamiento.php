<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Alojamiento extends Model
{
    protected $table      = 'typeofaccommodation';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_alojamiento(){
        return $this->asObject()->findAll();
    }
}