<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_penjualan extends CI_Model {
	function barang_jual_list($faktur){
		$this->db->where(array('id_pembelian'=>$faktur,'status_bayar'=> false));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('daftar_penjualan')->result();
		return $query;
	}
}

/* End of file Mdl_penjualan.php */
/* Location: ./application/models/Mdl_penjualan.php */