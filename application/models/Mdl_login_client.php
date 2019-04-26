<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login_client extends CI_Model {

	public function get_username($username){
		$this->db->where('username', $username);
		$query = $this->db->get('customer_data');
		if ($query->num_rows() >0) {
			return true;
		}else{
			return false;
		}

	}
	function login_customer($username, $password){

		// $password = 'hunter2';
		$this->db->where('username', $username);
		$query = $this->db->get('customer_data');
		if ($query->num_rows() < 1) {
			return 0;
		}else{
			foreach ($query->result() as $value) {
				$stored_hash = $value->password;
			}
			if ($this->bcrypt->check_password($password, $stored_hash))
			{	
				$this->session->set_userdata(array('masuk_pak_client' => $query->result()));
				return 1;
			}
			else

			{
				return 0;
			// Password dan email salah
			}
		}
		
		
	}
	function adm($username){
		$check = $this->db->get_where('customer_data',array('username' => $username));
		if ($check->num_rows()>0) {
			return $check;
		}
		else{
			return 0;
		}
	}

}

/* End of file Mdl_login_client.php */
/* Location: ./application/models/Mdl_login_client.php */