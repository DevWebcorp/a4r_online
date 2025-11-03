<?php

namespace App\Models\Mattes\Agente_Models;

use CodeIgniter\Model;

class Datos_agente extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_group', 'id_parent', 'c_date', 'user_name', 'email', 'password', 'activation_token', 'about', 'profile_image', 'active',  'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_agente($token){
		return $this->asArray()
		->select('users.*,identityowner.name,identityowner.first_name,identityowner.second_name,identityowner.phone,identityowner.photo,identityowner.id as id_identi')
		->join('identityowner', 'users.id = identityowner.id_user')
		->where('users.activation_token',$token)->first();
	}

  public function get_agente_data($id){
		return $this->asArray()
		->select('users.*,identityowner.name,identityowner.first_name,identityowner.second_name,identityowner.phone,identityowner.photo,identityowner.id as id_identi')
		->join('identityowner', 'users.id = identityowner.id_user')
		->where('users.id',$id)->first();
	}

    
}