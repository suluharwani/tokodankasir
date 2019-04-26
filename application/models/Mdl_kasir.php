<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_kasir extends CI_Model {
function pembelian_data(){
	$this->db->order_by('status', 'desc');
	$this->db->order_by('metode', 'desc');
	$this->db->order_by('tanggal_buat', 'desc');
	$query = $this->db->get('penjualan_barang');
	return $query;
}
	

}

/* End of file Mdl_kasir.php */
/* Location: ./application/models/Mdl_kasir.php */