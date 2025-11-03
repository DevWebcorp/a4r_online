<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class Model_login extends Model {

		public function get_login($email) {
			$query = sprintf("SELECT * FROM users WHERE email = %s", $this->db->escape($email) );
			$result = $this->db->query($query);
			return $result->getResult();
		}
	}