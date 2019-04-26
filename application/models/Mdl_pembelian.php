<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_pembelian extends CI_Model {
function pembelian_list(){
    $this->db->select('pembelian_barang.id, nomor_faktur, id_supplier, tanggal_buat, tanggal_posting, tanggal_update, id_admin, status, nama, nama_supplier ');
    $this->db->from('pembelian_barang');
    $this->db->order_by('pembelian_barang.id', 'desc');
    $this->db->join('admin', 'admin.id = pembelian_barang.id_admin', 'left');
    $this->db->join('supplier', 'pembelian_barang.id_supplier = supplier.id', 'left');
    $query = $this->db->get()->result();
    return $query;
}
function barang_beli_list($uri){
	$this->db->where(array('id_pembelian'=>$uri,'status'=> false));
	$this->db->order_by('id', 'desc');
	$query = $this->db->get('daftar_pembelian')->result();
	return $query;
}

}

/* End of file Mdl_berita.php */
/* Location: ./application/models/Mdl_berita.php */