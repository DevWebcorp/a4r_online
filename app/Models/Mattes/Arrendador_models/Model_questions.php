<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Model_questions extends Model
{
    protected $table      = 'questions_and_answers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['property_id', 'question', 'answer', 'status', 'user_id', 'university_id', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;

    public function get_questions_prop($user_id){
        $sql = 'SELECT questions_and_answers.id, questions_and_answers.user_id, question, questions_and_answers.answer, questions_and_answers.created_at, questions_and_answers.status, catuniversity.name AS universidad, property.name AS propiedad, identitytenant.name AS arrendatario, identitytenant.first_name, identitytenant.second_name FROM property JOIN propertydetail ON property.id = propertydetail.id_propety
        JOIN catuniversity ON catuniversity.id = propertydetail.id_university  JOIN questions_and_answers ON property.id = questions_and_answers.property_id JOIN identitytenant ON identitytenant.id_user = questions_and_answers.user_id
        WHERE property.id_user = ? AND questions_and_answers.deleted_at = ? AND property.deleted_at = ?';
        $questions = $this->db->query($sql, [$user_id, '0000-00-00 00:00:00', '0000-00-00 00:00:00']);
        return $questions->getResult();
    }

    public function get_questions_alumno($user_id){
        $sql = 'SELECT questions_and_answers.id, questions_and_answers.user_id, question, answer, questions_and_answers.created_at, questions_and_answers.status, status_arrendador, catuniversity.name AS universidad, property.name AS propiedad, identityowner.name AS arrendador, identityowner.first_name, identityowner.second_name
        FROM property JOIN propertydetail ON property.id = propertydetail.id_propety
        JOIN catuniversity ON catuniversity.id = propertydetail.id_university JOIN questions_and_answers ON property.id = questions_and_answers.property_id 
        JOIN identityowner ON identityowner.id_user = property.id_user WHERE questions_and_answers.user_id = ? AND questions_and_answers.deleted_at = ?  AND property.deleted_at = ?';
        $questions = $this->db->query($sql, [$user_id, '0000-00-00 00:00:00', '0000-00-00 00:00:00']);
        return $questions->getResult();
    }

    public function get_questions_agente($user_id){
        $sql = 'SELECT questions_and_answers.id, questions_and_answers.user_id, question, answer,  questions_and_answers.status, property.name AS propiedad, identityowner.name AS agente,
        identityowner.first_name AS ap_agente, identityowner.second_name AS am_agente, catuniversity.name AS universidad,
        identitytenant.name AS arrendatario, identitytenant.first_name, identitytenant.second_name FROM property JOIN propertydetail 
        ON property.id = propertydetail.id_propety JOIN catuniversity ON catuniversity.id = propertydetail.id_university JOIN questions_and_answers 
        ON property.id = questions_and_answers.property_id  JOIN identitytenant ON identitytenant.id_user = questions_and_answers.user_id JOIN users 
        ON users.id = property.id_user JOIN identityowner ON identityowner.id_user = property.id_user WHERE users.id_parent = ? AND questions_and_answers.deleted_at = ?  AND property.deleted_at = ?';
        $questions = $this->db->query($sql, [$user_id, '0000-00-00 00:00:00', '0000-00-00 00:00:00']);
        return $questions->getResult();
    }

    public function get_questions($id_propiedad){
        $sql = 'SELECT question, answer, created_at FROM questions_and_answers 
        WHERE property_id = ? AND questions_and_answers.status = ? AND deleted_at = ?';
        $questions = $this->db->query($sql, [$id_propiedad, 1, '0000-00-00 00:00:00']);
        return $questions->getResult();   
    }

    public function total_preguntas($id_user){
        $sql = 'SELECT COUNT(id) AS total FROM questions_and_answers where questions_and_answers.status = ? and user_id = ?';
        $questions = $this->db->query($sql, [0,$id_user]);
        return $questions->getResult(); 

    }    


    public function get_id_prop($id_question){
        return $this->select('property_id')->where('id', $id_question)->findall();

    }

    
    
}