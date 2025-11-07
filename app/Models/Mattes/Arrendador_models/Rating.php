<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Rating extends Model
{
    protected $table      = 'propertyrating';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_property', 'users_count', 'property_count'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_datos($id_propiedad){
        return $this->asArray()->select('users_count, property_count')->where('id_property',$id_propiedad)->findall();
    }

    public function get_id($id_propiedad){
        return $this->asObject()->select('id')->where('id_property',$id_propiedad)->first();

    }

    public function get_id_rat($id_propiedad){
        return $this->asArray()->select('id')->where('id_property',$id_propiedad)->first();

    }


    
}