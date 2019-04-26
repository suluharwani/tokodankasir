<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_homepage extends CI_Model {

	function all_items(){
		$ip = $this->input->ip_address();
		$this->db->select('*, produk.id as produk_id, daftar_penjualan.jumlah as jml, produk.big_pic as p_big_pic ,produk.kode_produk as p_kode_produk, produk_info.satuan as i_satuan, produk.nama_produk as p_nama_produk, produk.harga_jual as p_harga_jual, daftar_penjualan.status as status_penjualan ');
		$this->db->from('produk');
		$this->db->join('produk_info', 'produk.id = produk_info.id_produk', 'left outer');
		$this->db->join("daftar_penjualan", "(produk.kode_produk = daftar_penjualan.kode_produk) and (daftar_penjualan.ip_customer = '$ip') and (status = '0')", "left outer");
		$this->db->order_by('produk_id', 'desc');
		$this->db->limit(15);
		$query= $this->db->get();
		return $query;
	}
	function new_items(){
		$ip = $this->input->ip_address();
		$this->db->select('*, produk.id as produk_id, daftar_penjualan.jumlah as jml, produk.big_pic as p_big_pic ,produk.kode_produk as p_kode_produk, produk_info.satuan as i_satuan, produk.nama_produk as p_nama_produk, produk.harga_jual as p_harga_jual, daftar_penjualan.status as status_penjualan ');
		$this->db->from('produk');
		$this->db->join('produk_info', 'produk.id = produk_info.id_produk', 'left outer');
		$this->db->join("daftar_penjualan", "(produk.kode_produk = daftar_penjualan.kode_produk) and (daftar_penjualan.ip_customer = '$ip')", "left outer");
		$this->db->order_by('produk_id', 'desc');
		$this->db->limit(15);
		$this->db->where('status', 0);
		$query= $this->db->get();
		return $query;
	}
	function items_sesuai($kategori){
		$ip = $this->input->ip_address();
		$this->db->select('*, produk.id as produk_id, daftar_penjualan.jumlah as jml, produk.big_pic as p_big_pic ,produk.kode_produk as p_kode_produk, produk_info.satuan as i_satuan, produk.nama_produk as p_nama_produk, produk.harga_jual as p_harga_jual, daftar_penjualan.status as status_penjualan ');
		$this->db->from('produk');
		$this->db->join('produk_info', 'produk.id = produk_info.id_produk', 'left outer');
		$this->db->join("daftar_penjualan", "(produk.kode_produk = daftar_penjualan.kode_produk) and (daftar_penjualan.ip_customer = '$ip') and (status = '0')", "left outer");
		$this->db->order_by('produk_id', 'desc');
		$this->db->limit(15);
		$this->db->where('produk.id_cat', $kategori);
		$query= $this->db->get();
		return $query;

	}

}

