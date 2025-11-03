<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_citas extends Model
{
    protected $table      = 'diary';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_crofter', 'id_renter', 'id_property', 'comment', 'status', 'date_schedule','created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_citas_alumno($id_propietario) {
        return $this->asArray()->select('id, id_crofter, date_schedule')->where('id_crofter',$id_propietario)->find();
    }

    public function get_citas_prop($user_id) {
        $sql = 'SELECT diary.id, diary.id_renter, diary.id_property, diary.id_crofter, property.name AS propiedad, catuniversity.name AS universidad, identitytenant.name AS arrendatario, identitytenant.first_name, identitytenant.second_name, diary.date_schedule, diary.status FROM diary 
        JOIN property ON property.id = diary.id_property 
        JOIN propertydetail ON propertydetail.id_propety = diary.id_property JOIN catuniversity ON catuniversity.id = propertydetail.id_university
        JOIN identitytenant ON identitytenant.id_user = diary.id_renter WHERE property.deleted_at = :deletedh: AND diary.id_crofter = :user_id: ';
        $citas = $this->db->query($sql, ['user_id' => $user_id, 'deletedh' => "0000-00-00 00:00:00"]);
        return $citas->getResult();
    }

    public function get_visitas($id_propiedad) {
        $sql = 'SELECT diary.id, diary.id_renter, diary.id_property, property.name AS propiedad, CONCAT(identityowner.name, " ",identityowner.first_name, " ", 
        identityowner.second_name) AS propietario, identitytenant.name AS arrendatario, identitytenant.first_name, identitytenant.second_name, 
        diary.date_schedule, (SELECT catstatusdiary.name FROM catstatusdiary WHERE id = diary.status) AS status FROM diary JOIN property ON property.id = 
        diary.id_property JOIN identitytenant ON identitytenant.id_user = diary.id_renter JOIN identityowner ON identityowner.id_user = property.id_user
        WHERE diary.id_property = ?';
        $citas = $this->db->query($sql, [$id_propiedad]);
        return $citas->getResult();
    }

    public function horas_disp($user_id, $fecha) {
        return $this
        ->select('DATE_FORMAT(date_schedule, "%T") AS horas')
        ->where('id_crofter', $user_id)
        ->where('date_schedule LIKE "%'.$fecha.'%"')
        ->find();
        
    }

    public function get_name_prop($id_cita) {
        return $this
        ->select('property.name')
        ->join('property', 'diary.id_property = property.id')
        ->where('diary.id', $id_cita)
        ->first();
    }

    public function get_horario($id_cita){
        return $this->asArray()->select('date_schedule')->where('id', $id_cita)->find();
    }

    public function get_citas_renter($user_id){
        $sql = 'SELECT diary.id, diary.id_crofter, diary.id_renter, diary.id_property, property.name AS propiedad, catuniversity.name AS universidad, 
        (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE diary.id_crofter = id_user) as arrendador, (SELECT phone FROM 
        identityowner WHERE diary.id_crofter = id_user) AS phone, (SELECT email FROM users WHERE diary.id_crofter = id) AS email, diary.date_schedule, 
        diary.status FROM diary JOIN property ON property.id = diary.id_property JOIN propertydetail ON propertydetail.id_propety = diary.id_property 
        JOIN catuniversity ON catuniversity.id = propertydetail.id_university JOIN identityowner ON identityowner.id_user = diary.id_crofter WHERE
        id_renter = ? AND property.deleted_at = ?';
        $citas = $this->db->query($sql, [$user_id, '0000-00-00 00:00:00']);
        return $citas->getResult();
    }

    public function get_citas_agente($user_id){
        $sql = 'SELECT diary.id, diary.id_property, diary.id_crofter, property.name AS propiedad, diary.id_crofter, diary.id_renter,catuniversity.name AS universidad, 
        identitytenant.name AS arrendatario, identitytenant.first_name, identitytenant.second_name, identityowner.name AS agente, 
        identityowner.first_name AS ap_agente, identityowner.second_name AS am_agente, diary.date_schedule, diary.status FROM diary
        JOIN property ON property.id = diary.id_property JOIN propertydetail ON propertydetail.id_propety = diary.id_property JOIN catuniversity 
        ON catuniversity.id = propertydetail.id_university JOIN identitytenant ON identitytenant.id_user = diary.id_renter JOIN users 
        ON users.id = diary.id_crofter JOIN identityowner ON identityowner.id_user = diary.id_crofter WHERE property.deleted_at = :deletedh: AND users.id_parent = :parent_id:';
        $citas_agente = $this->db->query($sql,['parent_id' => $user_id, 'deletedh' => "0000-00-00 00:00:00"]);
        return $citas_agente->getResult();
    }

    public function get_datos_cita($id_cita){
        return $this->asArray()
        ->select('*')
        ->where('id', $id_cita)->find();
    }
   
   
    
  
}