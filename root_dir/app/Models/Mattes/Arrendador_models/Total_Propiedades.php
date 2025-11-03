<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Total_Propiedades extends Model
{
    protected $table      = 'totalproperties';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_user', 'total',];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

public function get_total($id_user){
    return $this->asArray()->select('total')->where('id_user',$id_user)->findall();
}


    
}