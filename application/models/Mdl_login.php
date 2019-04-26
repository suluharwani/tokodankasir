<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login extends CI_Model {


	// function login($nisn, $password){

	// 	// $password = 'hunter2';
	// 	$this->db->where('nisn', $nisn);
	// 	$query = $this->db->get('alumni');
	// 	if ($query->num_rows() < 1) {
	// 		return 0;
	// 	}else{
	// 		foreach ($query->result() as $al) {
	// 			$stored_hash = $al->password;
	// 		}
	// 		if ($this->bcrypt->check_password($password, $stored_hash))
	// 		{	
	// 			return 1;
	// 		}
	// 		else

	// 		{
	// 			return 0;
	// 		// Password dan email salah
	// 		}
	// 	}
		
		
	// }
	function login_admin($username, $password){

		// $password = 'hunter2';
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		if ($query->num_rows() < 1) {
			return 0;
		}else{
			foreach ($query->result() as $value) {
				$stored_hash = $value->password;
			}
			if ($this->bcrypt->check_password($password, $stored_hash))
			{	
				$this->session->set_userdata(array('masuk_pak_eko' => $query->result()));
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
		$check = $this->db->get_where('admin',array('username' => $username));
		if ($check->num_rows()>0) {
			return $check;
		}
		else{
			return 0;
		}
	}
	function check_nisn($nisn){
		$check = $this->db->get_where('alumni',array('nisn' => $nisn));
		if ($check->num_rows()>0) {
			return 1;
		}
		else{
			return 0;
		}

	}

	public function get_username($username){
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		if ($query->num_rows() >0) {
			return true;
		}else{
			return false;
		}

	}

}

/* End of file mdl_login.php */
/* Location: ./application/models/mdl_login.php */