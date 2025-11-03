<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Benefits extends Model
{
    protected $table      = 'benefits';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_user', 'name', 'email'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
}