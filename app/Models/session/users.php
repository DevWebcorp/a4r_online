<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['id',
     'id_group',
    'c_date',
    'user_name',
    'email',
    'password',    
    'activation_token',
    'about',
    'active'];
    protected $useTimestamps = false;
    //protected $createdField  = 'c_date';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get_id($token){
        return $this->asArray()
        ->select('id')->where('activation_token' ,$token)->first();

    } 

    public function get_pacientes(){
            return $this->asArray()
            ->select('users.id as patients_id,hcv_identity.NAME,hcv_identity.F_LAST_NAME,hcv_identity.verified, date_format(hcv_identity.vigencia_membresia, "%d-%m-%Y") as vigencia_membresia, hcv_identity.type as tipo,hcv_cat_membresia.*,hcv_cat_sector.name as sector,hcv_doctors_x_patients.doctor_id')
            ->join('hcv_doctors_x_patients', 'hcv_doctors_x_patients.patients_id = users.id')
            ->join('hcv_identity', 'hcv_identity.ID_USER = users.id')
            ->join('hcv_cat_membresia', 'hcv_cat_membresia.id = hcv_identity.id_cat_membresia')
            ->join('hcv_cat_cp_custom', 'hcv_cat_cp_custom.id_hcv_cat_cp = hcv_identity.ID_ZIP_CODE')
            ->join('hcv_cat_sector', 'hcv_cat_sector.id = hcv_cat_cp_custom.id_hcv_cat_sector')
            ->where('users.id_group',2)
           
           // ->orderBy('ID', 'DESC')
            ->findAll();
        
    }


    public function get_pacientes2(){
        return $this->asArray()
        ->select('users.id as patients_id,hcv_identity.NAME,hcv_identity.F_LAST_NAME,hcv_identity.verified, date_format(hcv_identity.vigencia_membresia, "%d-%m-%Y") as vigencia_membresia, hcv_identity.type as tipo,hcv_cat_membresia.*,hcv_cat_sector.name as sector')
        //->join('hcv_doctors_x_patients', 'hcv_doctors_x_patients.patients_id = Users.id')
        ->join('hcv_identity', 'hcv_identity.ID_USER = users.id')
        ->join('hcv_cat_membresia', 'hcv_cat_membresia.id = hcv_identity.id_cat_membresia')
        ->join('hcv_cat_cp_custom', 'hcv_cat_cp_custom.id_hcv_cat_cp = hcv_identity.ID_ZIP_CODE')
        ->join('hcv_cat_sector', 'hcv_cat_sector.id = hcv_cat_cp_custom.id_hcv_cat_sector')
        ->where('users.id_group',2)
       // ->orderBy('ID', 'DESC')
        ->findAll();
    }

    public function get_pacientes3(){
        $paciente = $this->db->query('SELECT users.id AS patients_id, hcv_identity.NAME, hcv_identity.F_LAST_NAME, hcv_identity.verified, date_format( hcv_identity.vigencia_membresia, "%d-%m-%Y" ) AS vigencia_membresia, hcv_identity.type AS tipo, 
        ( SELECT name FROM hcv_cat_membresia WHERE hcv_cat_membresia.id = hcv_identity.id_cat_membresia ) AS membrecia, 
        ( SELECT `id_hcv_cat_sector` FROM `hcv_cat_cp_custom` WHERE `id_hcv_cat_cp` = hcv_identity.ID_ZIP_CODE limit 1 ) AS id_sector , 
        (SELECT `name` FROM `hcv_cat_sector` WHERE id=id_sector limit 1) as name_sector, (SELECT `doctor_id` FROM `hcv_doctors_x_patients` WHERE `patients_id` = users.id LIMIT 1) AS id_doctor, 
        (SELECT NAME FROM `hcv_identity_operativo` WHERE `ID_USER` = id_doctor LIMIT 1) AS nombre_doctor FROM users, hcv_identity WHERE hcv_identity.ID_USER = users.id and users.id_group = 2
            ');
			return $paciente->getResult();

    }


}