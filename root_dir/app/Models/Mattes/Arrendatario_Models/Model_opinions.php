<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_opinions extends Model
{
    protected $table = 'opinions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_user' , 'id_property', 'comment','qualification','created_at','updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation  = false;

    public function get_opinions($id_propiedad){
        $sql = 'SELECT opinions.id, comment, qualification, (SELECT photo FROM identitytenant WHERE opinions.id_user = identitytenant.id_user AND  photo != " " 
        LIMIT 1) AS photo, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identitytenant WHERE opinions.id_user = identitytenant.id_user) 
        as alumno FROM opinions WHERE opinions.id_property = ?';
        $questions = $this->db->query($sql, [$id_propiedad]);
        return $questions->getResult();   
    }

    
}