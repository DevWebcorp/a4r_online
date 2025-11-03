<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class Register extends Model {

		public function get_groups() {
			$Nombres = $this->db->query("SELECT * from groups");
			return $Nombres->getResult();
		}

		public function user_exist($email){
			$query = "SELECT count(*) as num FROM `users` WHERE `email` = '".$email."'";
			$result = $this->db->query($query)->getResult();
			return $result[0]->num;
		}

		public function user_exist_token($token){
			$query = "SELECT count(*) as num FROM `users` WHERE `activation_token` = '".$token."'";
			$result = $this->db->query($query)->getResult();
			return $result[0]->num;
		}

		public function insert_user($datos){
			$users = $this->db->table('users');
			$users->insert($datos);
			return $this->db->affectedRows();
		}

		public function confirm_email($validation_token){
			$query = sprintf("UPDATE `users` SET `active`=1 WHERE `activation_token` = %s", $this->db->escape($validation_token) );
			$this->db->query($query);
			return $this->db->affectedRows();
		}
	}