<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class Table_user extends Model {

		protected $table="users";
		protected $primaryKey="id";
		protected $returnType="array";
		protected $useSoftDeletes=false;
		protected $allowedFields=['id_group','c_date','user_name', 'email', 'password', 'activation_token', 'about','active'];
		protected $useTimestamps=false;
		protected $createdField='created_at';
		protected $updatedField='updated_at';
		protected $validationRules=[];
		protected $validationMessages=[];
		protected $skipValidation=false;


		public function get_users_dos(){
			$Nombres = $this->db->query("SELECT * from users WHERE id_group=2");
			return $Nombres->getResult();
		}


		public function get_identity($id){
			$Nombres = $this->db->query("SELECT * from hcv_identity where id_user='".$id."'");
			return $Nombres->getResult();
		}

		public function getIdFromMail($id){
			$query = $this->db->query("SELECT id, username, email FROM users WHERE id_user='".$id."'");
			return $query->getResult();
		}

	}