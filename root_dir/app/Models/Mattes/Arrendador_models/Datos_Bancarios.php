<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Datos_Bancarios extends Model
{
    protected $table      = 'bankdata';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'full_name', 'bank_name','interbank_number', 'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_bancarios($id_user){
        return $this->asArray()->where('id_user',$id_user)->findall();
    }

   

    public function get_id($id_user){
        return $this->asObject()->select('id')->where('id_user',$id_user)->first();

    }

    public function get_info($user_id){
        $sql = 'SELECT COUNT(*)  AS bancarios FROM bankdata WHERE id_user = ?';
        $informacion = $this->db->query($sql, [$user_id]);
        return $informacion->getResult();
    }


}