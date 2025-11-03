<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Renta extends Model
{
    protected $table = 'rentproperty';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'id_alumno' , 'id_property', 'amount','bank','folio','date','entry_date'];
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation  = false;

    public function get_rentadas($user_id){
        $sql = 'SELECT property.id AS id_property, property.name AS property, id_alumno, (SELECT pickture FROM propetyfiles WHERE propetyfiles.id_propety = 
        rentproperty.id_property AND pickture != " " LIMIT 1) AS imagen  FROM rentproperty JOIN property ON property.id = rentproperty.id_property 
        WHERE id_alumno = ? AND property.deleted_at = ?';
        $rentadas = $this->db->query($sql,[$user_id, '0000-00-00 00:00:00']);
        return $rentadas->getResult();
    }

    
}