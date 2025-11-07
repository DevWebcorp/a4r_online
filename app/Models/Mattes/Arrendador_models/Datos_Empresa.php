<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Datos_Empresa extends Model
{
    protected $table = 'identityowner';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_user', 'verify','status','photo', 'name', 'first_name', 'second_name', 'phone', 'ine', 'real_estate_name', 'razon_social', 'address', 'legal_representation', 'rfc', 'proof_of_address', 'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function total($id_user){
        return $this->asArray()
        ->select('identityowner.*, users.email')
        ->join('users', 'users.id = identityowner.id_user')
        ->where('id_user',$id_user)->findall();

    }
    public function get_id($id_user){
        return $this->asObject()->select('id,proof_of_address')->where('id_user',$id_user)->first();

    }

    public function get_info($user_id){
        $sql = 'SELECT COUNT(*)  AS generales FROM identityowner WHERE id_user = ? ';
        $informacion = $this->db->query($sql, [$user_id]);
        return $informacion->getResult();
    }
}