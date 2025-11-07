<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_contacto extends Model
{
    protected $table      = 'contacto';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_propiedad', 'id_arrendatario', 'tel_arrendatario', 'tel_arrendador', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_contactos(){
        $sql = 'SELECT property.name AS propiedad, CONCAT(identityowner.name, " ", identityowner.first_name, " ", identityowner.second_name) AS propietario,
        identityowner.phone AS tel_propietario, CONCAT(identitytenant.name, " ", identitytenant.first_name, " ", identitytenant.second_name) AS 
        alumno, identitytenant.phone AS tel_alumno, contacto.created_at AS fecha_contacto FROM contacto JOIN property ON contacto.id_propiedad = 
        property.id JOIN identityowner ON identityowner.id_user = property.id_user LEFT JOIN identitytenant ON contacto.id_arrendatario = 
        identitytenant.id_user';
        $contacto = $this->db->query($sql);
        return $contacto->getResult();   
    }
}