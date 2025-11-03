<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Accesos_Notificaciones extends Model
{
    protected $table      = 'notificationsacess';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'email', 'appointment','notices', 'message' , 'promotions', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_notificaciones($id_user){
        return $this->asArray()->where('id_user',$id_user)->findall();
    }
    public function get_id($id_user){
        return $this->asObject()->select('id')->where('id_user',$id_user)->first();

    }

    public function get_info($user_id){
        $sql = 'SELECT COUNT(*) AS notificaciones FROM notificationsacess WHERE id_user = ?';
        $informacion = $this->db->query($sql, [$user_id]);
        return $informacion->getResult();
    }

    public function get_notis($id_renter){
        return $this->asArray()->select('email, appointment')->where('id_user', $id_renter)->findall();
    }

    public function get_notis_prop($id_propietario){
        return $this->asArray()->select('email, appointment')->where('id_user', $id_propietario)->findall();
    }

    public function get_notis_msg($id_renter){
        return $this->asArray()->select('id_user, email, message')->where('id_user', $id_renter)->findall();
    }
}