<?php

namespace App\Models\Mattes\Back_office_models;

use CodeIgniter\Model;

class Model_property_admin extends Model
{
    protected $table = 'property_admin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_property', 'id_status', 'created_at','updated_at', 'deleted_at','attended'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation  = false;

    public function get_status_propiedades($query){
        return $this->db->query($query)->getResult();
    } 

    public function change_status($status){
        $db      = \Config\Database::connect();
        $builder = $db->table('property_admin');
        $builder->set('attended', 1);
        $builder->where('id_status', $status);
        $builder->update();

    }

    public function change($status){
        $db      = \Config\Database::connect();
        $builder = $db->table('property_admin');
        $builder->set('attended', 1);
        $builder->where('id_status', $status);
        $builder->orWhere('id_status', 202);
        $builder->update();

    }

    
}