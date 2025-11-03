<?php

namespace App\Models\Mattes\Arrendatario_Models;

use CodeIgniter\Model;

class Model_favoritos extends Model
{
    protected $table      = 'favorite_property';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_user', 'id_property', 'favorite'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_favorite($user_id){
        $sql = 'SELECT favorite_property.id, favorite_property.id_property, name,
        price, km, disability, wifi, cleaning, parking, security, washer, kitchen_room, stamp_mattes, verified, positioning, 
        (SELECT pickture FROM propetyfiles WHERE propetyfiles.id_propety = favorite_property.id_property AND pickture != " " AND propetyfiles.deleted_at  = "0000-00-00 00:00:0" and pickture not like "%.mp4%" LIMIT 1) AS imagen  
        FROM favorite_property JOIN property ON property.id = favorite_property.id_property 
        JOIN propertyservices ON propertyservices.id_propety = property.id
        JOIN propertydetail ON propertydetail.id_propety = property.id WHERE favorite_property.id_user = ? AND favorite_property.favorite = ?';
        $propiedades = $this->db->query($sql, [$user_id,1]);
        return $propiedades->getResult();   
    }

    public function get_id_fav($id_propiedad, $user_id){
        $sql = 'SELECT favorite FROM favorite_property WHERE id_property = ? AND id_user = ? ';
        $favorito = $this->db->query($sql, [$id_propiedad, $user_id]);
        return $favorito->getResult();   
    }

    public function get_id($id_propiedad, $user_id){
        return $this
        ->select('*')
        ->where('id_property', $id_propiedad)
        ->where('id_user', $user_id)
        ->find();
    }

    public function get_favorite2($user_id){
        $sql = 'SELECT favorite_property.id, favorite_property.id_property, name,
        price, km, disability, wifi, cleaning, parking, security, washer, kitchen_room, stamp_mattes, verified, positioning, 
        (SELECT pickture FROM propetyfiles WHERE propetyfiles.id_propety = favorite_property.id_property AND pickture != " "  AND pickture not like "%.mp4%" AND  propetyfiles.deleted_at  = "0000-00-00 00:00:0"   LIMIT 1) AS imagen  
        FROM favorite_property JOIN property ON property.id = favorite_property.id_property 
        JOIN propertyservices ON propertyservices.id_propety = property.id
        JOIN propertydetail ON propertydetail.id_propety = property.id WHERE favorite_property.id_user = :userid: AND favorite_property.favorite = :bandera:
        AND property.deleted_at = :eliminado:';
        $propiedades = $this->db->query($sql, ['userid' => $user_id, 'bandera' => 1, 'eliminado' => "0000-00-00 00:00:00"]);
        return $propiedades->getResult();   
    }
}