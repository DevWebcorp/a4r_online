<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Model_conversation extends Model
{
    protected $table      = 'conversations';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['property_id', 'arrendatario_id', 'arrendador_id', 'date', 'deleted_at'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_id($id_renter) {
        return $this->select('id')
        ->where('arrendatario_id', $id_renter)
        ->find();
    }

    public function get_conversations() {
        $sql = 'SELECT *, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identitytenant WHERE arrendatario_id=id_user) as arrendatario, 
        (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE id_user=arrendatario_id) as propietarios, 
        (SELECT status FROM messages_chat WHERE conversation_id = conversations.id AND submit_msg = 1 ORDER BY messages_chat.id desc LIMIT 1) AS status, 
        (SELECT id_group FROM users WHERE id = arrendatario_id) AS groups, (SELECT id_tradename FROM tradenamexuser WHERE id_user = arrendatario_id) AS tipo 
        FROM conversations';
        $datos = $this->db->query($sql);
        return $datos->getResult();
    }

    public function get_convers_agente($user_id){
        $sql = 'SELECT conversations.id, conversations.date, arrendatario_id, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE arrendatario_id=id_user) 
        as agente FROM users JOIN conversations ON arrendatario_id=users.id WHERE id_parent = ?';
        $datos = $this->db->query($sql, [$user_id]);
        return $datos->getResult();

    }

    
}