<?php

namespace App\Models\a4r;

use CodeIgniter\Model;

class Datos_users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_group', 'id_parent', 'c_date', 'user_name', 'email', 'password', 'activation_token', 'about', 'profile_image', 'active',  'created_at' , 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function datos_agentes($id_usuario){
        $sql = 'SELECT users.id, users.id_group, users.id_parent,users.user_name,users.profile_image, users.active, 
        ( SELECT count(*) as total FROM property where property.id_user = users.id lIMIT 1) AS propiedades,
        ( SELECT photo FROM identityowner where id_user=users.id) AS profile_image,
        ( SELECT CONCAT(name, " ",first_name, " ", second_name)  from identityowner where id_user=users.id) as fullname
        FROM users WHERE id_parent= ? ';
        $agente = $this->db->query($sql, [$id_usuario]);
        return $agente->getResult();
    }

    public function correo_repetido($email){
        $query = "SELECT count(*) as num FROM `users` WHERE `email` = '".$email."'";
        $result = $this->db->query($query)->getResult();
        return $result[0]->num;
    }


    public function user_exist_token($token){
        $query = "SELECT count(*) as num FROM `users` WHERE `activation_token` = '".$token."'";
        $result = $this->db->query($query)->getResult();
        return $result[0]->num;
    }
    public function get_user($id_user){
        return $this->asArray()
        ->select('users.*,identityowner.name,identityowner.first_name,identityowner.second_name')
        ->join('identityowner', 'identityowner.id_user = users.id')->where('users.id',$id_user)->first();

    }
    
   /*  public function confirm_email($validation_token){
        $query = sprintf("UPDATE `users` SET `active`=1 WHERE `activation_token` = %s", $this->db->escape($validation_token) );
        $this->db->query($query);
        return $this->db->affectedRows();
    } */

    public function get_tradename($user_id){
        $sql = 'SELECT id_tradename FROM users JOIN tradenamexuser ON users.id = tradenamexuser.id_user WHERE id_user = ? ';
        $tradename = $this->db->query($sql, [$user_id]);
        return $tradename->getResult();
    }

    public function token_id($token_url) {
        $sql = 'SELECT id FROM users WHERE activation_token = ? ';
        $id_user = $this->db->query($sql, [$token_url]);
        return $id_user->getResult();
    }

    public function get_email($id_renter){
        return $this->asArray()->select('email')->where('id', $id_renter)->findall();
    }

    public function get_email_prop($id_propietario){
        return $this->asArray()->select('email')->where('id', $id_propietario)->findall();
    }

    public function get_agente($id_user){
        return $this->asArray()
        ->select('users.*,identityowner.name,identityowner.first_name,identityowner.second_name,identityowner.photo,identityowner.phone')
        ->join('identityowner', 'identityowner.id_user = users.id')->where('users.id',$id_user)->first();

    }    

    public function get_group($id_propietario){
        return $this->asArray()->select('id_group, id_parent')->where('id', $id_propietario)->findall();
    }

    public function getBusqueda($sql){
        return $this->db->query($sql)->getResult();
    }

    public function lista_propietarios($sql){
        return $this->db->query($sql)->getResult();
    }

    public function validar_email($email){
        $sql = 'SELECT  COUNT(*) AS validar FROM users WHERE email = ? ';
        $id_user = $this->db->query($sql, [$email]);
        return $id_user->getResult();
    }

    public function get_activo($user){
        return $this->asArray()->select('active')->where('id', $user)->findall();
    }

    public function dominios_correo(){
        $sql = 'SELECT (SELECT COUNT(email) FROM users WHERE email LIKE "'."%"."gmail"."%".'") AS gmail, (SELECT COUNT(email) FROM users WHERE email LIKE "'."%"."hotmail"."%".'") AS hotmail, 
        (SELECT COUNT(email) FROM users WHERE email LIKE "'."%"."outlook"."%".'") AS outlook, (SELECT COUNT(email) FROM users WHERE email LIKE "'."%"."live"."%".'") AS live 
        FROM users WHERE id_group = 4 LIMIT 1';
        $questions = $this->db->query($sql);
        return $questions->getResult();   
    }

    public function tipo_prop(){
        $sql = 'SELECT (SELECT COUNT(*) FROM tradenamexuser WHERE id_tradename = 2) AS inmobiliaria, (SELECT COUNT(*) FROM tradenamexuser WHERE id_tradename = 1)
        AS independiente, (SELECT COUNT(*) FROM users WHERE id_group = 5) AS agente FROM tradenamexuser LIMIT 1';
        $questions = $this->db->query($sql);
        return $questions->getResult(); 
    }

    public function prop_x_users(){
        $sql = 'SELECT users.id, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE id_user = users.id) as propietario, 
        (SELECT COUNT(*) FROM property WHERE id_user = users.id) AS total_prop FROM users WHERE id_group = 3 OR 5 having total_prop != 0';
        $questions = $this->db->query($sql);
        return $questions->getResult(); 
    }

    public function sin_propiedades(){
        $sql = 'SELECT users.id, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE id_user = users.id) as propietario, 
        (SELECT COUNT(*) FROM property WHERE id_user = users.id) AS total_prop FROM users WHERE id_group = 3 OR 5 having total_prop = 0';
        $questions = $this->db->query($sql);
        return $questions->getResult(); 
    }

    public function con_propiedades(){
        $sql = 'SELECT users.id, (SELECT CONCAT(name, " ",first_name, " ", second_name) from identityowner WHERE id_user = users.id) as propietario, 
        (SELECT COUNT(*) FROM property WHERE id_user = users.id) AS total_prop FROM users WHERE id_group = 3 OR 5 having total_prop != 0';
        $questions = $this->db->query($sql);
        return $questions->getResult(); 
    }

    public function getStudents(){
        $query = $this->db->query("select id as iduser,email, DATE_FORMAT(created_at, '%d/%m/%Y') as fecha_registro, (select name from identitytenant where id_user = iduser) as nombre,
        (select first_name from identitytenant where id_user = iduser) as ap,
        (select second_name from identitytenant where id_user = iduser) as am,
        (select date_of_Birth from identitytenant where id_user = iduser) as nacimiento,
        (select phone from identitytenant where id_user = iduser) as telefono,
        (select description from identitytenant where id_user = iduser) as descripcion,
        (select verify from identitytenant where id_user = iduser) as verificado,
        (select id_gender from identitytenant where id_user = iduser) as id_genero,
        (select catgender.name from catgender where catgender.id = id_genero) as genero,
        (select studentdata.id_state from studentdata where studentdata.id_user = iduser) as id_estado,
        (select studentdata.university_id from studentdata where studentdata.id_user = iduser) as id_universidad,
        (select studentdata.college_career from studentdata where studentdata.id_user = iduser) as carrera,
        (select studentdata.university_file from studentdata where studentdata.id_user = iduser) as carta,
        (select studentdata.ine from studentdata where studentdata.id_user = iduser) as ine,
        (select catstate.state from catstate where catstate.id = id_estado) as estado,
        (select catuniversity.name from catuniversity where catuniversity.id = id_universidad) as universidad,
        (select count(id) from diary where diary.id_renter = iduser ) as agendadas,
        (select count(id) from rentproperty where rentproperty.id_alumno = iduser ) as rentadas
        from users  where id_group = 4");
        return $query->getResult();

    }

    public function getArrendadores(){
        $query = $this->db->query("select id as iduser,email, DATE_FORMAT(created_at, '%d/%m/%Y') as fecha_registro, id_group as grupo,
        (select name from identityowner where id_user = iduser) as nombre,
        (select first_name from identityowner where id_user = iduser) as ap,
        (select second_name from identityowner where id_user = iduser) as am,
        (select birth_date from identityowner where id_user = iduser) as cumple,
        (select phone from identityowner where id_user = iduser) as telefono,
        (select ine from identityowner where id_user = iduser) as ine,
        (select verify from identityowner where id_user = iduser LIMIT 1) as verificado,
        (select id_tradename  from tradenamexuser where id_user = iduser LIMIT 1) as razon_social,
        (select name  from tradename where id = razon_social limit 1) as name_razon_social,
        (select total  from totalproperties where id_user = iduser limit 1) as total_propiedades,
        (select count(id_user) from property  INNER join rentproperty  on property.id = rentproperty.id_property where id_user = iduser limit 1) as rentadas,
        (select count(id_user) from property where property.id_user = iduser limit 1) as numero_propiedades,
        (select full_name  from bankdata where id_user = iduser limit 1) as nombre_fiscal,
        (select bank_name  from bankdata where id_user = iduser limit 1) as banco,
        (select interbank_number  from bankdata where id_user = iduser limit 1) as clabe,
        (select rfc  from taxdata where id_user = iduser limit 1) as rfc,
        (select fiscal_address  from taxdata where id_user = iduser limit 1) as direccion_fiscal
        from users  where id_group = 3 or id_group  = 5");
        return $query->getResult();

    }

    



}