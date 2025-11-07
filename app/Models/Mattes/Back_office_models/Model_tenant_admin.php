<?php

namespace App\Models\Mattes\Back_office_models;

use CodeIgniter\Model;

class Model_tenant_admin extends Model
{
    protected $table = 'tenant_admin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'id_status', 'created_at','updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation  = false;

    
}