<?php

namespace App\Models\a4r;

use CodeIgniter\Model;

class Identity extends Model
{
    protected $table      = 'identityowner';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'photo','name', 'first_name' , 'second_name','birth_date', 'phone','ine','real_estate_name','razon_social',
                                'address','legal_representation','rfc','proof_of_address','proof_of_address','created_at','status','verify','updated_at','deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_propretario($id_user){
        return $this->asObject()->where('id_user',$id_user)->first();
    }

    public function total($id_user){
        return $this->asArray()->where('id_user',$id_user)->findall();

    }
    public function get_id($id_user){
        return $this->asObject()->select('id,photo,ine')->where('id_user',$id_user)->first();

    }

    public function get_name($id_renter) {
        return $this->asArray()->select('name')->where('id_user',$id_renter)->findall();
    }

    public function get_info($user_id){
        $sql = 'SELECT COUNT(*)  AS generales FROM identityowner WHERE id_user = ? ';
        $informacion = $this->db->query($sql, [$user_id]);
        return $informacion->getResult();
    }

    public function get_propietario($id_propietario){
        return $this->asArray()->select('name')->where('id_user', $id_propietario)->findall();
    }
    
    public function get_nombre($id_crofter) {
        return $this->asArray()->select('name, first_name, second_name')->where('id_user', $id_crofter)->findall();
    }

    public function validar($id_user){
        return $this->asArray()
        ->select('identityowner.id as id_personal, bankdata.id as id_banco, taxdata.id as id_fiscales, notificationsacess.id as id_noti')
        ->join('bankdata', 'bankdata.id_user = identityowner.id_user')
        ->join('taxdata', 'taxdata.id_user = identityowner.id_user')
        ->join('notificationsacess', 'notificationsacess.id_user = identityowner.id_user')
        ->where('identityowner.id_user',$id_user)
        ->findAll();
        
    }





}