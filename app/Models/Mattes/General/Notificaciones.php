<?php

namespace App\Models\Mattes\General;

use CodeIgniter\Model;

class Notificaciones extends Model
{
    protected $table      = 'notifications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['state','id_user_receptor','date', 'id_type'];
    protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    




    public function update_state($user_id,$tipo){
        //var_dump($data);
        $db = \Config\Database::connect();
        $builder = $db->table('notifications');
        $builder->set('state',1);
        $builder->where('state', 0);
        $builder->where('id_user_receptor',$user_id);
        $builder->where('id_type',$tipo);
        $builder->update();
        return $db->affectedRows();
       
    }

    public function update_admin($user_id){
        //var_dump($data);
        $db = \Config\Database::connect();
        $builder = $db->table('notifications');
        $builder->set('state',1);
        $builder->where('state', 0);
        $builder->where('id_user_receptor',$user_id);
        //$builder->where('id_type',$tipo);
        $builder->update();
        return $db->affectedRows();
       
    }

   /*  public function get_gender(){
        return $this->asArray()
        ->select('id, name')
        ->where('deleted_at', '0000-00-00 00:00:00')
        ->find();
    } */

}