<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_manage_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function admin_list(){
		$this->db->select('*, admin.id as id_admin');
		$hasil = $this->db->get('admin');
		return $hasil->result();
	}
	function get_admin_by_kode($id_admin){
		$this->db->select('*, admin.id as id_admin');
		$this->db->from('admin');
		$this->db->join('contact_admin', 'admin.id = contact_admin.id_admin', 'left');
		$this->db->join('data_admin', 'admin.id = data_admin.id_admin', 'left');
		$this->db->where('admin.id', $id_admin);
		$admin = $this->db->get();
		if ($admin->num_rows()>=1) {
			foreach ($admin->result() as $adm) {
				$hasil['nama'] = $adm->nama;
				$hasil['id_admin'] = $adm->id_admin;
				$hasil['username'] = $adm->username;
				$hasil['level'] = $adm->level;
				$hasil['nomor_telepon'] = $adm->nomor_telepon;
				$hasil['email'] = $adm->email;
				$hasil['alamat'] = $adm->alamat;
				$hasil['foto'] = $adm->foto;
			}
		}
		return $hasil;
	}

	function simpan_admin($nama, $username, $password, $level){
		$object = [
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'level' => $level,
		];
		$hasil = $this->db->insert('admin', $object);
		return $hasil;
	}
	function update_admin($nama, $username,  $level, $id_admin){
		$object = [
			'nama' => $nama,
			'username' => $username,
			// 'password' => $password,
			'level' => $level,
		];
		$this->db->where('id', $id_admin);
		$hasil = $this->db->update('admin', $object);
		return $hasil;
	}
	function update_admin_password($password, $id_admin){
		$object = [
			'password' => $password
			
		];
		$this->db->where('id', $id_admin);
		$hasil = $this->db->update('admin', $object);
		return $hasil;
	}
	// function hapus_admin($id_admin){
	// 	$query = $this->db->query("DELETE admin,contact_admin,data_admin 
	// 		FROM admin,contact_admin,data_admin 
	// 		WHERE contact_admin.id_admin=admin.id
	// 		AND data_admin.id_admin=admin.id
	// 		AND admin.id= $id_admin");
	// 	$hasil = $query;
	// 	return $hasil;
	// }
	function hapus_admin($id_admin){
		if ($this->db->affected_rows($this->db->query("
			DELETE admin,contact_admin,data_admin FROM admin,contact_admin,data_admin WHERE contact_admin.id_admin=admin.id AND data_admin.id_admin=admin.id AND admin.id= $id_admin")) >= 1){
		return $query;
		}else if ($this->db->affected_rows($this->db->query("
			
			DELETE admin FROM admin WHERE admin.id= $id_admin")) >= 1){
		return $query;
		}else if ($this->db->affected_rows($this->db->query("
			DELETE admin,contact_admin FROM admin,contact_admin,data_admin WHERE contact_admin.id_admin=admin.id AND  AND admin.id= $id_admin")) >= 1){
		return $query;
		}else if ($this->db->affected_rows($this->db->query("
			DELETE admin,data_admin FROM admin,contact_admin,data_admin WHERE data_admin.id_admin=admin.id AND admin.id= $id_admin")) >= 1){
		return $query;
		}else{
			return false;
		}
		
	}
}

/* End of file Mdl_manage_admin.php */
/* Location: ./application/models/Mdl_manage_admin.php */