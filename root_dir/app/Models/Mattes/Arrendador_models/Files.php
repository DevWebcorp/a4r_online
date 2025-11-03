<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Files extends Model
{
    protected $table      = 'propetyfiles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_propety', 'pickture','video','file_address','file_receipt', 'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_info($id_prop){
        $sql = 'SELECT COUNT(id) AS total FROM propetyfiles WHERE id_propety = ? ';
        $files = $this->db->query($sql,[$id_prop]);
        return $files->getResult();
    }

    public function get_pickture($id_propiedad){
            return $this->asArray()->select('id,pickture')->where('id_propety',$id_propiedad)
            ->where("pickture !=","")->findall();
    }

    public function validar_delete($id){
        return $this->asArray()->selectCount('file_address')->where('id',$id)->where("file_address !=","")->first();
    }

    public function pickture($id){
        return $this->asArray()->select('pickture')->where('id',$id)->first();
    }

    public function filesDomicilio($id){
        return $this->asArray()->select('id,file_address,file_receipt')
        ->where('file_receipt!=',"")->where('file_address!=',"")->where('id_propety',$id)->first();
    }

    public function get_images($id_propiedad) {
        return $this->asArray()->select('id_propety,pickture')->where('id_propety',$id_propiedad)->
        where('pickture !='," ")->
        notLike('pickture','.mp4')->findall();
    }

    public function get_images_detalle($id_propiedad) {
        return $this->asArray()->select('id_propety,pickture')->where('id_propety',$id_propiedad)->where("pickture !=", " ")->
         findall();
    }

}