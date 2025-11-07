<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_catstate extends Model
{
    protected $table      = 'catstate';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['state', 'abbreviation', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_state(){
        return $this->asArray()
        ->select('id, state')
        ->find();
    }

}