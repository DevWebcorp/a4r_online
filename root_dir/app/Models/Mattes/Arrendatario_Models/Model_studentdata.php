<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_studentdata extends Model
{
    protected $table      = 'studentdata';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'university_id', 'college_career', 'id_state', 'university_file', 'ine'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function total($id_user){
        return $this->asArray()
        ->select('catuniversity.name AS university, studentdata.university_id, college_career, id_state, university_file, ine')
        ->join('catuniversity', 'catuniversity.id = studentdata.university_id')
        ->where('id_user',$id_user)->findall();

    }

    public function get_id($id_user){
        return $this->asObject()->select('id,university_file,ine')->where('id_user',$id_user)->first();

    }

    public function get_university($user_id){
        return $this->asArray()
        ->select('catuniversity.name AS university, catuniversity.latitude, catuniversity.longitude, studentdata.university_id')
        ->join('catuniversity', 'catuniversity.id = studentdata.university_id')
        ->where('id_user', $user_id)->findall();
    }

    public function get_estados_total(){
        $sql = 'SELECT catstate.state, (SELECT COUNT(id_state) FROM studentdata WHERE id_state = catstate.id) AS total FROM catstate';
        $questions = $this->db->query($sql);
        return $questions->getResult();   
    }


    

}