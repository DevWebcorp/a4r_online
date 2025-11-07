<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Primeravez extends Model
{
    protected $table      = 'tradenamexuser';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'id_tradename', 'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function tipo_persona($id_user){
        return $this->asObject()->select('id_tradename')->where('id_user',$id_user)->findall();
    }

    public function get_tradename($user_id){
        $sql = 'SELECT id_tradename FROM users JOIN tradenamexuser ON users.id = tradenamexuser.id_user WHERE id_user =?';
        $tradename = $this->db->query($sql,[$user_id]);
        return $tradename->getResult();
    }
}