<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_identity extends Model
{
    protected $table      = 'identitytenant';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'name', 'first_name', 'second_name', 'phone', 'prefix', 'date_of_Birth', 'id_gender', 'description', 'photo', 'verify', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function total($id_user){
        return $this->asArray('*, users.email')
        ->join('users', 'users.id = identitytenant.id_user')
        ->where('id_user',$id_user)->findall();

    }

    public function get_id($id_user){
        return $this->asObject()->select('id,photo')->where('id_user',$id_user)->first();

    }

    public function get_name($id_renter){
        return $this->asArray()->select('name')->where('id_user',$id_renter)->findall();
    }

    public function get_nombre($user_id) {
        return $this->asArray()->select('name,first_name, second_name')->where('id_user',$user_id)->findall();
    }

    public function get_verify($user_id) {
        return $this->asArray()->select('verify')->where('id_user',$user_id)->findall();
    }

    public function get_generos_total(){
        $sql = 'SELECT (SELECT COUNT(id_gender) FROM identitytenant WHERE id_gender = 1) AS hombres, (SELECT COUNT(id_gender) FROM identitytenant WHERE id_gender = 2) AS
        mujeres, (SELECT COUNT(id_gender) FROM identitytenant WHERE id_gender = 3) AS sin_especificar FROM identitytenant LIMIT 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();   
    }

    public function verify($id_user){
        return $this->asArray()->where('id_user',$id_user)->findall();
    }



    

}