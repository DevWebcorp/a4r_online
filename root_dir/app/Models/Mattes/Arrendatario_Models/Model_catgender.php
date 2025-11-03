<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_catgender extends Model
{
    protected $table      = 'catgender';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'created_at', 'updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_gender(){
        return $this->asArray()
        ->select('id, name')
        ->find();
    }

}