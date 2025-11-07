<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Model_messages extends Model
{
    protected $table      = 'messages_chat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['conversation_id', 'msg', 'arrendador_id', 'submit_msg', 'submit_date', 'deleted_at'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_messages($id_conversacion){
        $sql = 'SELECT conversation_id, msg, submit_msg, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE arrendatario_id=id_user) 
        as arrendador, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identitytenant WHERE arrendatario_id=id_user) as arrendatario 
        FROM messages_chat  JOIN conversations ON conversations.id = messages_chat.conversation_id WHERE conversation_id = ? LIMIT 50';
        $messages = $this->db->query($sql, [$id_conversacion]);
        return $messages->getResult();
    }

    public function update_state($id_conver){
        //var_dump($data);
        $db = \Config\Database::connect();
        $builder = $db->table('messages_chat');
        $builder->set('status',1);
        $builder->where('status', 0);
        $builder->where('conversation_id',$id_conver);
        $builder->where('submit_msg', 1);
        $builder->update();
        return $db->affectedRows();
       
    }

    
}