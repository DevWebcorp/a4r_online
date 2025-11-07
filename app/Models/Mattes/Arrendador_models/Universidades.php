<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Universidades extends Model
{
    protected $table      = 'catuniversity';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['university_id', 'name', 'date_fundation', 'adscripcion', 'state_id', 'state', 'municipio_id', 'municipio', 'localidad_id', 'localidad', 'address' , 'colonia', 'cp', 'phone','web_page', 'mail', 'latitude','longitude','link_sic','created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_universidades($busqueda){
        return $this->asObject()
        ->select('id, name,latitude,longitude,state')
        ->like('name', $busqueda)    
        ->like("catuniversity.deleted_at","0000-00-00 00:00:00")    
       
        ->findAll(100);
    }

    //Consulta para obtener las universidades que tienen al menos una propiedad
    public function get_universidades_prop($busqueda){
        return $this->asObject()
        ->select('catuniversity.name, MIN(propertydetail.id) AS id, 
        MIN(propertydetail.id_propety) AS id_propety, 
        MIN(propertydetail.id_university) AS id_university,         catuniversity.latitude, catuniversity.longitude, 
        catuniversity.state')
        ->like('catuniversity.name', $busqueda)    
        ->like("catuniversity.deleted_at","0000-00-00 00:00:00")    
        ->join('propertydetail', 'propertydetail.id_university = catuniversity.id')
        ->groupby('catuniversity.name, catuniversity.latitude, 
        catuniversity.longitude, catuniversity.state')
        ->findAll(100);
    } 


    public function prop_x_uni(){
        $sql = 'SELECT catuniversity.id AS id_university, (SELECT name FROM propertydetail WHERE id_university = catuniversity.id limit 1) as universidad, (SELECT 
        COUNT(*) FROM propertydetail WHERE id_university = catuniversity.id LIMIT 1) AS prop_resgistradas FROM catuniversity
       HAVING prop_resgistradas != 0 ORDER BY prop_resgistradas desc limit 1';
        $questions = $this->db->query($sql);
        return $questions->getResult(); 
    }

    public function getBusqueda($sql){
        return $this->db->query($sql)->getResult();
    }

    public function get_datos_uni($id){
        return $this->asArray()
        ->select('id, name, latitude, longitude, state')
        ->where('id', $id)
        ->findAll();
    }

}