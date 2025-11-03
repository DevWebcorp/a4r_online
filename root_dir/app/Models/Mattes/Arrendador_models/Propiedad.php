<?php

namespace App\Models\Mattes\Arrendador_models;

use CodeIgniter\Model;

class Propiedad extends Model
{
    protected $table      = 'property';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_user', 'name', 'description', 'visit', 'visiting_hours', 'date_start', 'date_finish', 'id_type_accommodation', 'stamp_mattes', 'verified', 'positioning', 'rent', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_propiedades_moral($user_id)
    {
        $sql = 'SELECT property.id, id_user, name, description, visiting_hours, date_start, date_finish,
        stamp_mattes, verified, positioning, id_type_accommodation, property.created_at, property.updated_at, property.deleted_at AS eliminado,
        (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != " " AND propetyfiles.deleted_at  = "0000-00-00 00:00:0" AND pickture not like "%.mp4%" LIMIT 1) 
            AS imagen, (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:00") 
            AS precio FROM property JOIN users ON users.id = property.id_user WHERE id_parent = :parent_id: OR property.id_user = :usersid: having eliminado = :deletedh:';
        $propiedades = $this->db->query($sql, ['parent_id' => $user_id, 'usersid' => $user_id, 'deletedh' => "0000-00-00 00:00:00"]);
        return $propiedades->getResult();
    }

    public function get_propiedades_fisica($user_id)
    {
        $sql = 'SELECT *, (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != " " AND propetyfiles.deleted_at  = "0000-00-00 00:00:0" AND pickture not like "%.mp4%" LIMIT 1) AS imagen, 
        (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:00") 
        AS precio FROM property WHERE id_user = :iduser: AND property.deleted_at = :deletedat:';
        $propiedades = $this->db->query($sql, ['iduser' => $user_id, 'deletedat' => "0000-00-00 00:00:00"]);
        return $propiedades->getResult();
    }

    public function get_properties($id_propiedad)
    {
        return $this->asArray()->where('id', $id_propiedad)->findall();
    }

    public function get_id($id_user)
    {
        return $this->asObject()->select('id')->where('id_user', $id_user)->first();
    }

    /*  public function get_propiedades_moral($user_id){
        $propiedades = $this->db->query('SELECT property.id, id_user, name, description, visiting_hours, date_start, date_finish,
        stamp_mattes, verified, positioning, id_type_accommodation, property.created_at, property.updated_at, property.deleted_at,
        (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != " " AND propetyfiles.deleted_at  = "0000-00-00 00:00:0" LIMIT 1) 
            AS imagen, (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0") 
            AS precio FROM property JOIN users ON users.id = property.id_user WHERE id_parent = "'.$user_id.'" or users.id = "'.$user_id.'" 
            AND property.deleted_at = "0000-00-00 00:00:0"');
        return $propiedades->getResult();
    }
 */
    public function busqueda_moral($user_id, $busqueda)
    {
        $search = $busqueda;
        $sql = "SELECT property.id, id_user, name, description, visiting_hours, date_start, date_finish, stamp_mattes, verified, positioning, id_type_accommodation, property.created_at, property.updated_at, property.deleted_at AS eliminado,
        (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != '' AND propetyfiles.deleted_at  = '0000-00-00 00:00:0' AND pickture not like '%.mp4%' LIMIT 1) 
        AS imagen, (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = '0000-00-00 00:00:00') 
        AS precio FROM property JOIN users ON users.id = property.id_user WHERE id_parent = :idparent: OR id_user = :iduser: AND property.name LIKE '%" . $this->db->escapeLikeString($search) . "%' ESCAPE '!' having eliminado = '0000-00-00 00:00:00'";
        $propiedades = $this->db->query($sql, ['idparent' => $user_id, 'iduser' => $user_id]);
        return $propiedades->getResult();
    }

    public function busqueda_fisica($user_id, $busqueda)
    {
        $search = $busqueda;
        $sql = "SELECT *, property.deleted_at AS eliminado, (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != '' AND propetyfiles.deleted_at  = '0000-00-00 00:00:0'  AND pickture not like '%.mp4%' LIMIT 1) AS imagen, 
        (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = '0000-00-00 00:00:0') 
        AS precio FROM property WHERE id_user = :iduser: AND property.name LIKE '%" . $this->db->escapeLikeString($search) . "%' HAVING eliminado = '0000-00-00 00:00:00'";
        $propiedades = $this->db->query($sql, ['iduser' => $user_id]);
        return $propiedades->getResult();
    }

    public function get_detalles($id_propiedad, $id_parent)
    {
        $sql = 'SELECT property.id as prop_id, property.name AS propiedad, description, date_start, 
        rent, price, km, latitude, longitude, property.id_user, identityowner.name AS propietario, 
        identityowner.first_name AS p_apellido, identityowner.second_name AS m_apellido, identityowner.photo, identityowner.phone, (SELECT identityowner.name FROM 
	    identityowner WHERE identityowner.id_user = :parent:) AS inmobiliaria, (SELECT email FROM 
        users WHERE property.id_user = users.id) AS email, n_roomies, n_bathing, petfrienly, 
        status_bath, available, disability, wifi, cleaning, parking, security, washer, kitchen_room,
        (SELECT id_group FROM users WHERE property.id_user = users.id) AS grouptype, (SELECT 
        users_count FROM propertyrating WHERE property.id = propertyrating.id_property) AS users_count, 
	    (SELECT property_count FROM propertyrating WHERE property.id = propertyrating.id_property) AS property_count FROM property 
        JOIN identityowner ON identityowner.id_user = property.id_user
        JOIN propertydetail ON property.id = propertydetail.id_propety
        JOIN propertyservices ON propertyservices.id_propety = property.id 
        WHERE property.id = :propiedad: AND property.deleted_at = "0000-00-00 00:00:00"';
        $detalles = $this->db->query($sql, ['propiedad' => $id_propiedad, 'parent' => $id_parent]);
        return $detalles->getResult();
    }

    public function get_propiedad($id_propiedad)
    {
        return $this->select('name, id_user')->where('id',  $id_propiedad)->find();
    }

    public function get_datos($id_propiedad)
    {
        $sql = 'SELECT property.id, property.name AS propiedad, identityowner.name AS nombre_p,
        identityowner.first_name AS firstname_p, identityowner.second_name AS secondname_p,
        (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety) AS precio FROM property 
        JOIN identityowner ON identityowner.id_user = property.id_user 
        WHERE property.id = ? AND identityowner.id_user = property.id_user AND property.deleted_at = "0000-00-00 00:00:00"';
        $datos = $this->db->query($sql, [$id_propiedad]);
        return $datos->getResult();
    }

    public function get_propietario($id_propiedad)
    {
        return $this->select('id_user')->where('id',  $id_propiedad)->find();
    }

    public function validar_name($propiedad)
    {
        $sql = 'SELECT COUNT(*)  AS propiedad_name FROM property WHERE name = ? ';
        $informacion = $this->db->query($sql, [$propiedad]);
        return $informacion->getResult();
    }

    public function total_propiedades($user_id)
    {
        $sql = 'SELECT COUNT(*) AS total FROM property WHERE id_user = ? and property.deleted_at = ?';
        $total = $this->db->query($sql, [$user_id, '0000-00-00 00:00:00']);
        return $total->getResult();
    }

    public function get_data_propiedad($id_propiedad)
    {
        return $this->asArray()
            ->select('property.id,property.id_user,identityowner.photo,identityowner.name,identityowner.first_name,identityowner.second_name,users.id_group')
            ->join('identityowner', 'identityowner.id_user = property.id_user')
            ->join('users', 'users.id = property.id_user')
            ->where('property.id', $id_propiedad)
            ->first();
    }

    public function get_questions_propiedad($id_propiedad)
    {
        $sql = 'SELECT questions_and_answers.user_id, questions_and_answers.id, question, answer, catuniversity.name AS universidad, property.name AS propiedad, CONCAT(identitytenant.name, " ",identitytenant.first_name," ", identitytenant.second_name) AS name_student  FROM property 
		JOIN propertydetail ON property.id = propertydetail.id_propety JOIN catuniversity ON catuniversity.id = propertydetail.id_university 
		JOIN questions_and_answers ON property.id = questions_and_answers.property_id 
        JOIN identitytenant ON identitytenant.id_user = questions_and_answers.user_id 
        WHERE questions_and_answers.property_id = ? 
		AND questions_and_answers.deleted_at = ?';
        $preguntas = $this->db->query($sql, [$id_propiedad, '0000-00-00 00:00:00']);
        return $preguntas->getResult();
    }

    public function propiedades_alta()
    {
        $sql = 'SELECT COUNT(*) AS total_propiedades FROM property';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function tipo_alojamiento()
    {
        $sql = 'SELECT (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 1) AS casa, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 2) 
        AS h_ind_casa, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 3) AS h_comp_casa, (SELECT COUNT(*) FROM property WHERE 
        id_type_accommodation = 4) AS departamento, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 5) AS h_ind_dep, (SELECT COUNT(*) FROM 
        property WHERE id_type_accommodation = 6) AS h_comp_dep, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 7) AS loft FROM property 
        LIMIT 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function rent_x_alojamiento()
    {
        $sql = 'SELECT (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 1 AND property.id = id_property) AS casa, (SELECT COUNT(*) FROM property WHERE 
        id_type_accommodation = 2 AND property.id = id_property) AS h_ind_casa, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 3 AND 
        property.id = id_property) AS h_comp_casa, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 4 AND property.id = id_property) AS 
        departamento, (SELECT COUNT(*) FROM property WHERE id_type_accommodation = 5 AND property.id = id_property) AS h_ind_dep, (SELECT COUNT(*) FROM 
        property WHERE id_type_accommodation = 6 AND property.id = id_property) AS h_comp_dep, (SELECT COUNT(*) FROM property WHERE id_type_accommodation 
        = 7) AS loft FROM rentproperty LIMIT 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function roomies_x_prop()
    {
        $sql = 'SELECT name, n_roomies AS roomies, n_bathing FROM property JOIN propertyservices ON id_propety = property.id';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function prop_verificadas()
    {
        $sql = 'SELECT COUNT(*) AS verificadas FROM property WHERE verified = 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function prop_sello()
    {
        $sql = 'SELECT COUNT(*) AS sello FROM property WHERE stamp_mattes = 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();
    }

    public function getproperty()
    {
        $query = $this->db->query("select id as propertyid, name, description, id_user as id_usuario, DATE_FORMAT(created_at, '%d/%m/%Y') as fecha_registro, stamp_mattes, positioning,verified, date_start, id_type_accommodation as tipo_casa,
        (SELECT CONCAT(name,' ', first_name ,' ', second_name )  from identityowner where id_user = id_usuario) as nombre_propietario,
        (select id_cp from  propertydetail where id_propety = propertyid) as id_postal,
        (select inhabit from  propertydetail where id_propety = propertyid) as habita,
        (select price from  propertydetail where id_propety = propertyid) as precio,
        (select address2 from  propertydetail where id_propety = propertyid) as direccion,
        (select km from  propertydetail where id_propety = propertyid) as distancia,
        (select id_university from  propertydetail where id_propety = propertyid) as id_universidad,
        (select cp from hcv_cat_cp where ID = id_postal) as codigo_postal,
        (select MUNICIPIO from hcv_cat_cp where ID = id_postal) as delegacion,
        (select ESTADO from hcv_cat_cp where ID = id_postal) as estado,
        (select ASENTAMIENTO from hcv_cat_cp where ID = id_postal) as colonia,
        (select name from typeofaccommodation where id = tipo_casa) as casa,
        (select name from catuniversity where id = id_universidad) as universidad,
        (select n_bathing from propertyservices where id_propety = propertyid limit 1) as banos,
        (select n_roomies from propertyservices where id_propety = propertyid limit 1) as roomies,
        (select n_beds from propertyservices where id_propety = propertyid limit 1) as camas,
        (select petfrienly from propertyservices where id_propety = propertyid limit 1) as mascotas,
        (select available from propertyservices where id_propety = propertyid limit 1) as disponible,
        (select disability from propertyservices where id_propety = propertyid limit 1) as discapacidad,
        (select wifi from propertyservices where id_propety = propertyid limit 1) as wifi,
        (select cleaning from propertyservices where id_propety = propertyid limit 1) as limpieza,
        (select parking from propertyservices where id_propety = propertyid limit 1) as estacionamiento,
        (select n_drawers from propertyservices where id_propety = propertyid limit 1) as numero_estacionamiento,
        (select security from propertyservices where id_propety = propertyid limit 1) as seguridad,
        (select washer from propertyservices where id_propety = propertyid limit 1) as lavanderia,
        (select kitchen_room from propertyservices where id_propety = propertyid limit 1) as cocina,
        (select count(pickture) from propetyfiles where id_propety = propertyid ) as numero_fotos,
        (select file_address from propetyfiles where id_propety = propertyid limit 1) as comprobante,
        (select file_receipt from propetyfiles where id_propety = propertyid limit 1) as recibo,
        (select count(diary.id) from diary where id_property = propertyid and status = 501) as numero_visitas,
        (select count(id_property) from rentproperty where id_property = propertyid) as numero_rentadas,
        (select id_alumno from rentproperty where id_property = propertyid limit 1) as user_renter,
        (SELECT CONCAT(name,' ', first_name ,' ', second_name )  from identitytenant where id_user = user_renter) as rentando,
        (SELECT  DATE_FORMAT( `date`, '%d/%m/%Y')  from rentproperty where id_property = propertyid limit 1) as fecha_renta
        from property where deleted_at = '0000-00-00 00:00:00'");
        return $query->getResult();
    }
}
