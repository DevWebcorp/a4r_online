<?php

namespace App\Models\a4r;

use CodeIgniter\Model;

class Login extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_group', 'id_parent', 'user_name', 'email', 'password', 'activation_token','num_celular', 'photo', 'created_at', 'updated_at','deleted_at'];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUsuarios(){
        return $this->asArray()
        ->select('users.*, groups.nombre AS grupo, delegaciones.nombre AS delegacion')
        ->join('groups', 'groups.id = users.id_group')
        ->join('delegaciones', 'delegaciones.id_delegacion = users.id_delegacion', 'left')
        ->where('groups.deleted_at IS NULL')
        ->findAll();
    }

    public function getDatos($id_user){
        return $this->asArray()
        ->select('users.*, groups.nombre AS grupo')
        ->join('groups', 'groups.id = users.id_group')
        ->where('users.id', $id_user)
        ->where('groups.deleted_at IS NULL')
        ->findAll();
    }

    public function get_login($email) {
        return $this->asArray()
        ->select('*')
        ->where('email', $email)
        ->findAll();
    }

    public function busquedaUsuarios($busqueda, $id_delegacion){
        $sql = "select users.*, d.nombre as delegacion from users, delegaciones d  where user_name ilike '%" .$this->db->escapeLikeString($busqueda)."%' and users.id_delegacion = $id_delegacion and (id_group = 12 or id_group = 2) and users.deleted_at is NULL and d.id_delegacion = users.id_delegacion";
        $datos = $this->db->query($sql, ['delegacion' => $id_delegacion]);
        return $datos->getResult();
    }

}