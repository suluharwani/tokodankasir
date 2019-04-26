<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('mdl_homepage');		
	}
	function test(){
		$this->load->view('admin/printer');
	}

	public function index() {
		$data['title'] = "Titipin";
		$data['ip_customer'] = $this->input->ip_address();
		$data['id_client'] = $this->session->userdata('id_client_login');
		$data['controller']=$this; 
		$this->load->view('homepage/v_homepage', $data);
	}
	function check_user_checkout(){
		$status_login_client = $this->session->userdata('status_login_client');
		$ip =  $this->input->post('ip_customer');
		if ($status_login_client == "client_login" &&  isset($status_login_client)) {
			
			$tgl = idate('Y').(idate('m')).(idate('d'));
			$id_client = $this->session->userdata('id_client_login');
			$jumlah_daftar = $this->db->get('penjualan_barang')->num_rows();
			$faktur = $jumlah_daftar.$tgl.$id_client.$jumlah_daftar;
			$object = array(
				'nomor_faktur' => $faktur,
				'id_customer' => $id_client,
				'tanggal_buat' => date('Y/m/d H:i:s'),
				'status' => 0
			);
			$object_penjualan = array(
				'id_pembelian' => $faktur,
				'status' => 1
			);
			$this->db->insert('penjualan_barang', $object);

			$this->db->where(array('ip_customer'=>$ip, 'status'=>0));
			$query = $this->db->update('daftar_penjualan', $object_penjualan);
			echo json_encode($query);
		}else{
			return false;
		}
	}
	function hapus_dari_chart(){
		$kode_produk = $this->input->post('kode_produk');
		$ip = $this->input->ip_address();
		$this->db->where(array('ip_customer'=>$ip, 'kode_produk'=>$kode_produk, 'status'=>0,'status_bayar'=>0,'status_kirim'=>0));
		$query = $this->db->delete('daftar_penjualan');
		echo json_encode($query);
	}
	function jumlah_item(){
		$kode_produk  = $this->input->post('kode_produk');
		$id_pembelian = $this->input->post('id_pembelian');
		$query = $this->db->get_where('daftar_penjualan', array('kode_produk'=>$kode_produk, 'id_pembelian'=>$id_pembelian))->result();
		echo json_encode($query);
	}
	function all_items(){
		$data = $this->mdl_homepage->all_items()->result();
		echo json_encode($data);
	}
	function items_sesuai(){
		$uri = $this->input->post('uri');
		$this->db->select('*');
		$this->db->where('id', $uri);
		$query = $this->db->get('produk');
		foreach ($query->result() as $prdk) {
			$kategori = $prdk->id_cat;
		}

		$data = $this->mdl_homepage->items_sesuai($kategori);
		echo json_encode($data->result());

	}
	function new_items(){
		$data = $this->mdl_homepage->new_items()->result();
		echo json_encode($data);
	}
	function chart(){
		$ip = $this->input->ip_address();
		$query = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$ip));
		echo json_encode($query);
	}
	function kurang_ke_chart(){
		$ip = $this->input->ip_address();
		$pembelian = $ip;
		$id = $this->input->post('id_item');
		$kode_produk = $this->input->post('kode_produk');
		// $nama_admin = $this->input->post('nama_admin');
		$this->db->select('*');
		$this->db->where('kode_produk', $kode_produk);
		$produk_query = $this->db->get('produk');
		foreach ($produk_query->result() as $produk) {
			$nama_produk = $produk->nama_produk;
			$id_supplier = $produk->id_supplier;
			$barcode = $produk->barcode;
			$deskripsi = $produk->deskripsi;
			$big_pic = $produk->big_pic;
			$small_pic = $produk->small_pic;
			$harga = $produk->harga;

			$harga_jual = $produk->harga_jual;
			$disc_1 = $produk->disc_1;
			$disc_2 = $produk->disc_2;
			$disc_3 = $produk->disc_3;
			$id_cat = $produk->id_cat;
			$id_sub_cat = $produk->id_sub_cat;
		}

		$query_check = $this->db->get_where('daftar_penjualan', array('ip_customer'=>$pembelian, 'kode_produk'=>$kode_produk, 'status'=>0));
		foreach ($query_check->result() as $value) {
			if ($query_check->num_rows()>=1 && $value->jumlah>0) {
				$query = $this->db->query("UPDATE `daftar_penjualan` SET `id_pembelian` = '', `nama_produk` = '".$nama_produk."', `big_pic` = '".$big_pic."', `small_pic` = '".$small_pic."', `id_cat` = '".$id_cat."', `id_sub_cat` = '".$id_sub_cat."', `harga` = '".$harga."', `disc_1` = '".$disc_1."', `disc_2` = '".$disc_2."', `disc_3` = '".$disc_3."', `harga_jual` = '".$harga_jual."', `deskripsi` = '".$deskripsi."', `kode_produk` = '".$kode_produk."', `barcode` = '".$barcode."', `status` = 0, `jumlah`= jumlah-1 WHERE `ip_customer` = '".$pembelian."' AND `kode_produk` = '".$kode_produk."'  AND `status` = '0'");
				echo json_encode($query);
			}
			
			
		}
		
	}
	function tambah_ke_chart(){
		$ip = $this->input->ip_address();
		$pembelian = $ip;
		$id = $this->input->post('id_item');
		$kode_produk = $this->input->post('kode_produk');
		// $nama_admin = $this->input->post('nama_admin');
		$this->db->select('*');
		$this->db->where('kode_produk', $kode_produk);
		$produk_query = $this->db->get('produk');
		foreach ($produk_query->result() as $produk) {
			$nama_produk = $produk->nama_produk;
			$id_supplier = $produk->id_supplier;
			$barcode = $produk->barcode;
			$deskripsi = $produk->deskripsi;
			$big_pic = $produk->big_pic;
			$small_pic = $produk->small_pic;
			$harga = $produk->harga;
			$jumlah_stock = $produk->jumlah;

			$harga_jual = $produk->harga_jual;
			$disc_1 = $produk->disc_1;
			$disc_2 = $produk->disc_2;
			$disc_3 = $produk->disc_3;
			$id_cat = $produk->id_cat;
			$id_sub_cat = $produk->id_sub_cat;
		}
		$object_pembelian = array(
			'id_pembelian' =>'',
			'ip_customer' =>$pembelian,
			'nama_produk' =>$nama_produk,
			'big_pic'=> $big_pic,
			'small_pic'=> $small_pic,
			'id_cat'=> $id_cat,
			'id_sub_cat'=> $id_sub_cat,
			'harga'=> $harga,
			'disc_1'=> $disc_1,
			'disc_2'=> $disc_2,
			'disc_3'=> $disc_3,
			'harga_jual'=> $harga_jual,
			'deskripsi'=>$deskripsi,
			'kode_produk'=>$kode_produk,
			'barcode'=>$barcode,
			'status'=>false,
			'jumlah'=>1,
         		// 'nama_admin'=> $nama_admin
		);
		$object_pembelian_add = array(
			'id_pembelian' =>$pembelian,
			'nama_produk' =>$nama_produk,
			'big_pic'=> $big_pic,
			'small_pic'=> $small_pic,
			'id_cat'=> $id_cat,
			'id_sub_cat'=> $id_sub_cat,
			'harga'=> $harga,
			'disc_1'=> $disc_1,
			'disc_2'=> $disc_2,
			'disc_3'=> $disc_3,
			'harga_jual'=> $harga_jual,
			'deskripsi'=>$deskripsi,
			'kode_produk'=>$kode_produk,
			'barcode'=>$barcode,
			'status'=>false,
			'jumlah=jumlah+1',
         		// 'nama_admin'=> $nama_admin
		);
		$query_check = $this->db->get_where('daftar_penjualan', array('ip_customer'=>$pembelian, 'kode_produk'=>$kode_produk));
		if ($query_check->num_rows()>=1) {
			foreach ($query_check->result() as $check_jumlah) {
				$jumlah_dibeli = $check_jumlah->jumlah;
				$status_penjualan = $check_jumlah->status;
			}
		}else{
			$jumlah_dibeli = 0;
		}
		
		if ($jumlah_stock>$jumlah_dibeli) {
			if ($query_check->num_rows()>=1 && $status_penjualan==false) {
				// $this->db->where(array('id_pembelian'=>$ip, 'kode_produk'=>$kode_produk));
         		// $query = $this->db->update('daftar_pednjualan', $object_pembelian_add);
				$query = $this->db->query("UPDATE `daftar_penjualan` SET `id_pembelian` = '', `nama_produk` = '".$nama_produk."', `big_pic` = '".$big_pic."', `small_pic` = '".$small_pic."', `id_cat` = '".$id_cat."', `id_sub_cat` = '".$id_sub_cat."', `harga` = '".$harga."', `disc_1` = '".$disc_1."', `disc_2` = '".$disc_2."', `disc_3` = '".$disc_3."', `harga_jual` = '".$harga_jual."', `deskripsi` = '".$deskripsi."', `kode_produk` = '".$kode_produk."', `barcode` = '".$barcode."', `status` = 0, `jumlah`= jumlah+1 WHERE `ip_customer` = '".$pembelian."' AND `kode_produk` = '".$kode_produk."' AND `status` = '0'");
				echo json_encode($query);
			}else{
				$query = $this->db->insert('daftar_penjualan', $object_pembelian);
				echo json_encode($query);
			}
		}

	}

	public function news_promo() {
		$data = array('content' => 'homepage/v_news_promo');
		$this->load->view('homepage/layout/layout', $data);
	}

	public function how_it_works() {
		$data = array('content' => 'homepage/v_how_it_works');
		$this->load->view('homepage/layout/layout', $data);
	}

	public function our_farmers() {
		$data = array('content' => 'homepage/v_our_farmers');
		$this->load->view('homepage/layout/layout', $data);
	}

	public function how_to_pay() {
		$data = array('content' => 'homepage/v_how_to_pay');
		$this->load->view('homepage/layout/layout', $data);
	}

	public function detail() {
		$data['title'] = "Titipin";
		$data['ip_customer'] = $this->input->ip_address();
		$data['id_client'] = $this->session->userdata('id_client_login');
		$data['controller']=$this; 
		$data['uri'] = $this->uri->segment(3);
		$data['content']= 'homepage/v_detail';
		$this->load->view('homepage/layout/layout2', $data);
	}

	public function see_all() {
		$data = array('content' => 'homepage/v_see_all');
		$this->load->view('homepage/layout/layout2', $data);
	}

	public function signin_signup() {
		$data = array('content' => 'homepage/v_signin_signup');
		$this->load->view('homepage/layout/layout', $data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('','refresh');
	}

}