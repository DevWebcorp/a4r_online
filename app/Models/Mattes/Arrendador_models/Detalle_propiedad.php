<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Detalle_propiedad extends Model
{
    protected $table      = 'propertydetail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_propety','id_university', 'id_cp' , 'price','inhabit','addrees', 'address2','km','type_distance','latitude', 'longitude','created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_info($id_prop){
        $sql = 'SELECT COUNT(*)  AS total FROM propertydetail WHERE id_propety = ?';
        $informacion = $this->db->query($sql, [$id_prop]);
        return $informacion->getResult();
    }

    public function get_propretario($id_user){
        return $this->asObject()->where('id_user',$id_user)->first();
    }    

    public function get_ubicacion($id_loc){
        return $this->asArray()
        ->select('propertydetail.*, hcv_cat_cp.ID, hcv_cat_cp.CP, hcv_cat_cp.ASENTAMIENTO, hcv_cat_cp.MUNICIPIO, hcv_cat_cp.ESTADO, catuniversity.name, catuniversity.latitude as unilat, catuniversity.longitude as unilong')
        ->join('hcv_cat_cp', 'hcv_cat_cp.ID = propertydetail.id_cp')
        ->join('catuniversity', 'catuniversity.id = propertydetail.id_university')
        ->where('propertydetail.id_propety',$id_loc)
        ->findAll();
    }

    /* public function get_propiedades_bo(){
        $sql = 'SELECT property.name AS Propiedad,
        (SELECT propertydetail.id_cp FROM propertydetail where property.id = propertydetail.id_propety ) AS cp_prop,
        (SELECT hcv_cat_cp.ESTADO FROM hcv_cat_cp where hcv_cat_cp.ID = cp_prop) AS estado,
        (SELECT addrees FROM propertydetail where property.id = propertydetail.id_propety lIMIT 1) AS direccion_propiedad,
        (SELECT propertydetail.id_university FROM propertydetail where property.id = propertydetail.id_propety) AS univ_prop,
        (SELECT catuniversity.name FROM catuniversity where catuniversity.id = univ_prop) AS universidad,
        property.created_at AS fecha_alta, property.updated_at AS fecha_actualizacion FROM property;';
        return $this->db->query($sql)->getResult();
    } */

    public function get_propiedades_bo($query){
        return $this->db->query($query)->getResult();
    } 
    
   /*  public function get_markers($latitud,$longitud,$kilometros,$id_uni){
        $query = "SELECT * FROM (
            SELECT *, 
                (
                    (
                        (
                            acos(
                                sin(( $latitud * pi() / 180))
                                *
                                sin(( `latitude` * pi() / 180)) + cos(( $latitud * pi() /180 ))
                                *
                                cos(( `latitude` * pi() / 180)) * cos((( $longitud - `longitude`) * pi()/180)))
                        ) * 180/pi()
                    ) * 60 * 1.1515
                )
            as distance FROM `propertydetail`
        ) myTable
        WHERE distance <= $kilometros and id_university  = $id_uni
        LIMIT 15";

        return $this->db->query($query)->getResult();



    } */

    public function get_markers($id_uni,$fecha,$tipo){
        $db = \Config\Database::connect();
        $builder = $db->table('propertydetail');
        $builder->limit(1)->select("*,property.*,propetyfiles.pickture as imagen");
        $builder->join('property', 'property.id = propertydetail.id_propety','left');
        $builder->join('propetyfiles', 'propetyfiles.id_propety = propertydetail.id_propety','left');
        $builder->where('propertydetail.id_university',$id_uni);
        //$builder->getWhere(['propetyfiles.pickture  !=' => null], $limit = 1);
        $query = $builder->get();
        return $query->getResult();
    }
    

    public function getBusqueda($sql){
        return $this->db->query($sql)->getResult();


    }

    public function get_university_id($id_propiedad){
        return $this->asArray()
        ->select('id_university')
        ->where('id_propety', $id_propiedad)
        ->find();
    }
 

    public function precio_max(){
        $db = \Config\Database::connect();
        $builder = $db->table('propertydetail');
        $builder->selectMax('price');
        $query = $builder->get();
        return $query->getResult();
    }

    public function precio_min(){
        $db = \Config\Database::connect();
        $builder = $db->table('propertydetail');
        $builder->selectMin('price');
        $query = $builder->get();
        return $query->getResult();
    } 
 
}