<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('mdl_manage_admin');
		$this->load->model('mdl_login');
		$this->load->model('mdl_barang');
		$this->load->model('mdl_pembelian');
		$this->load->model('mdl_penjualan');
	}

	public function index(){
		$this->_make_sure_is_kasir();
		$uri = $this->uri->segment(3);
		$data['uri'] = $uri;
		$data['judul'] = "Pembelian";
		$data['btn_tambah'] = "btn_tambah_faktur";
		$adm = $this->_admin_data();
		$data['email_admin'] = $adm['email_admin'];
		$data['nama_admin'] = $adm['nama_admin'];
		$data['id_admin'] = $adm['id_admin'];
		$id_admin = $adm['id_admin'];
		$data['jabatan_admin'] = $adm['jabatan_admin'];
		$data['title'] = "Invoice";
		$data['barang'] = $this->mdl_barang->product_list();
		$data['status'] = $this->mdl_barang->status_pembelian($uri);
		$data['faktur_penjualan'] = $this->get_faktur($id_admin);
		$this->db->limit(1);
		$perusahaan = $this->db->get('profile_web');
		foreach ($perusahaan->result() as $comp) {
			$data['nama_perusahaan'] = $comp->nama_perusahaan;
			$data['logo'] = $comp->logo;
			$data['alamat'] = $comp->alamat;
			$data['telepon'] = $comp->telepon;
			$data['email'] = $comp->email;
		}
		$querygetcustomer = $this->db->get_where('penjualan_barang', array('nomor_faktur'=>$uri));
		foreach ($querygetcustomer->result() as $cus) {
			$customer_id = $cus->id_customer;
		}
		$this->db->select('* ,customer_data.id as id_customer, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan');
		$this->db->from('customer_data');
		$this->db->join('customer_info', 'customer_data.id = customer_info.customer_data_id', 'left');
		$this->db->join('provinces', 'customer_info.provinsi_id = provinces.id', 'left');
		$this->db->join('regencies', 'kabupaten_id = regencies.id', 'left');
		$this->db->join('districts', 'kecamatan_id = districts.id', 'left');
		$this->db->where('customer_data.id', $customer_id);
		$client = $this->db->get();
		foreach ($client->result() as $cus) {
			$data['nama_client'] = $cus->nama;
			$data['hp_client'] = $cus->no_hp;
			$data['email_client'] = $cus->username;
			$data['alamat_client'] = "$cus->provinsi - $cus->kabupaten - $cus->kecamatan - $cus->alamat - $cus->kode_pos";
		}

		$data['tanggal'] = date("Y/m/d");
		if (isset($uri)) {
			$data['konten'] = $this->load->view('kasir/konten/kasir',$data,true);
		}else{
			$data['konten'] = $this->load->view('kasir/konten/daftar_pembelian',$data,true);
		}
		$this->load->view('kasir/dashboard', $data);

	}
	function notif(){
		$query = $this->db->get('penjualan_barang');
		echo $query->num_rows();
	}
	function pembelian_data(){
		$this->load->model('mdl_kasir');
		$query = $this->mdl_kasir->pembelian_data();
		echo json_encode($query->result());
	}
	function show_nota(){
		$faktur = $this->input->post('kode_faktur');
		// $this->db->select('*');
		// $this->db->from('penjualan_barang');
		// $this->db->join('customer_info', 'penjualan_barang.id_customer = customer_info.customer_data_id', 'left');
		// $this->db->join('daftar_penjualan', 'penjualan_barang.nomor_faktur = daftar_penjualan.id_pembelian', 'left');
		$query = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$faktur));
		echo json_encode($query->result());
	}
	function simpan_pembayaran(){
		// $faktur = $this->input->post('kode_faktur');
		$kode = $this->input->post('kode_faktur');
		$data_penjualan = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$kode))->result();
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$tanggal = date('Y/m/d H:i:s');
		foreach ($data_penjualan as $value) {
         		// $harga = $value->harga;
			$jumlah = $value->jumlah;
         		// $harga_jual = $value->harga_jual;
         		// $disc_1 = $value->disc_1;
         		// $disc_2 = $value->disc_1;
         		// $disc_3 = $value->disc_3;
				// $nama_admin = $nama_admin;
				// $tanggal = $tanggal
			$this->db->query('UPDATE `produk` SET `jumlah` = jumlah - '.$jumlah.'  WHERE `kode_produk` = '.$value->kode_produk.'');
		}
		$this->db->where('id_pembelian', $kode);
		$this->db->update('daftar_penjualan', array('status'=>'1', 'status_bayar'=>'1'));
		$this->db->where('nomor_faktur', $kode);
		$query = $this->db->update('penjualan_barang', array('status'=>'1', 'tanggal_update'=>$tanggal, 'tanggal_posting'=>$tanggal));
		echo json_encode($query);
	}
	function konfirmasi_batal_faktur(){
		$kode_previledge = $this->input->post('kode_previledge');
		$query = $this->db->get_where('previledge', array('previledge_key'=>$kode_previledge))->num_rows();
		if ($query>=1) {
			echo json_encode($query);
		}else{
			return false;
		}
	}
	function batal_faktur(){
		// $faktur = $this->input->post('kode_faktur');
		$kode = $this->input->post('kode');
		$data_penjualan = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$kode, 'status' => 1, ))->result();
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$tanggal = date('Y/m/d H:i:s');
		foreach ($data_penjualan as $value) {
         		// $harga = $value->harga;
			$jumlah = $value->jumlah;
         		// $harga_jual = $value->harga_jual;
         		// $disc_1 = $value->disc_1;
         		// $disc_2 = $value->disc_1;
         		// $disc_3 = $value->disc_3;
				// $nama_admin = $nama_admin;
				// $tanggal = $tanggal
			$this->db->query('UPDATE `produk` SET `jumlah` = jumlah + '.$jumlah.'  WHERE `kode_produk` = '.$value->kode_produk.'');
		}
		$this->db->where('id_pembelian', $kode);
		$this->db->update('daftar_penjualan', array('status'=>'0', 'status_bayar'=>'0'));
		$this->db->where('nomor_faktur', $kode);
		$query_update = $this->db->update('penjualan_barang', array('status'=>'0', 'tanggal_update'=>$tanggal, 'tanggal_posting'=>$tanggal));
		echo json_encode($query_update);
	}
	function tambah_by_barcode(){
		$this->_make_sure_is_kasir();
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$barcode = $this->input->post('kode_barcode');
		$faktur = $this->input->post('faktur');

		$query = $this->db->get_where('produk', array('barcode'=>$barcode));
		foreach ($query->result() as $produk) {
			$nama_produk = $produk->nama_produk;
			$id_supplier = $produk->id_supplier;
			$kode_produk = $produk->kode_produk;
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
			'id_pembelian' =>$faktur,
			'ip_customer' =>'',
			'nama_produk' =>$nama_produk,
			'big_pic'=> $big_pic,
			'small_pic'=> $small_pic,
			'id_cat'=> $id_cat,
			'id_sub_cat'=> $id_sub_cat,
			'harga'=> $harga,
			// 'disc_1'=> $disc_1,
			// 'disc_2'=> $disc_2,
			// 'disc_3'=> $disc_3,
			'harga_jual'=> $harga_jual,
			'deskripsi'=>$deskripsi,
			'kode_produk'=>$kode_produk,
			'barcode'=>$barcode,
			'status'=>false,
			'jumlah'=>1,
			'nama_admin' => $nama_admin
         		// 'nama_admin'=> $nama_admin
		);
		$check_barang = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$faktur, 'barcode'=>$barcode));
		if ($check_barang->num_rows()>0) {
			$data = $this->db->query("UPDATE `daftar_penjualan` SET  `jumlah`= jumlah+1 WHERE `id_pembelian` = '".$faktur."' AND `status` = '0' AND `barcode`= '".$barcode."' ");
		}else{
			$data = $this->db->insert('daftar_penjualan', $object_pembelian);

		}
		echo json_encode($data);
	}
	function update_daftar_pembelian(){
		$kode_faktur = $this->input->post('kode_faktur');
		$kode_produk_edit = $this->input->post('kode_produk_edit');
		$nama_produk_edit = $this->input->post('nama_produk_edit');
		$barcode_edit = $this->input->post('barcode_edit');
		$harga_edit = $this->input->post('harga_edit');
		$jumlah_produk_edit = $this->input->post('jumlah_produk_edit');
		$disc_1_edit = $this->input->post('disc_1_edit');
		$disc_2_edit = $this->input->post('disc_2_edit');
		$disc_3_edit = $this->input->post('disc_3_edit');
		$hpp_edit = $this->input->post('hpp_edit');
		$harga_jual_edit = $this->input->post('harga_jual_edit');
		$laba_jual_edit = $this->input->post('laba_jual_edit');
		$potongan = $this->input->post('potongan');
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$object= array(
			'id_pembelian'=>$kode_faktur,
			'nama_produk'=>$nama_produk_edit,
			'kode_produk'=>$kode_produk_edit,
			'barcode'=>$barcode_edit,
			'jumlah'=>$jumlah_produk_edit,
			'harga'=>$harga_edit,
			'disc_1'=>$disc_1_edit,
			'disc_2'=>$disc_2_edit,
			'disc_3'=>$disc_3_edit,
			'harga_jual'=>$harga_jual_edit,
			'nama_admin'=>$nama_admin,
			'potongan'=>$potongan,
		);

		$this->db->where(array('id_pembelian'=> $kode_faktur, 'kode_produk'=>$kode_produk_edit));
		$query = $this->db->update('daftar_penjualan', $object);
		echo json_encode($query);
	}
	function posting_penjualan(){
		$kode = $this->input->post('kode_faktur');
		$data_pembelian = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$kode))->result();
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$tanggal = date('Y/m/d H:i:s');
		foreach ($data_pembelian as $value) {
			$harga = $value->harga;
			$jumlah = $value->jumlah;
			$harga_jual = $value->harga_jual;
			$disc_1 = $value->disc_1;
			$disc_2 = $value->disc_1;
			$disc_3 = $value->disc_3;
			$potogan = $value->potogan;
				// $nama_admin = $nama_admin;
				// $tanggal = $tanggal
			$this->db->query('UPDATE `produk` SET `jumlah` = jumlah - '.$jumlah.' WHERE `kode_produk` = '.$value->kode_produk.'');
		}
		$this->db->where('nomor_faktur', $kode);
		$query = $this->db->update('penjualan_barang', array('status'=>'1','tanggal_posting'=>$tanggal));
		echo json_encode($query);
	}
	function tambah_faktur(){
		$faktur = $this->input->post('nomor_faktur_input');
		$id_admin = $this->input->post('id_admin');
		$object = array(
			'nomor_faktur' =>$faktur,
			'tanggal_buat' =>date('Y/m/d H:i:s'),
			'id_admin' => $id_admin,
			'status' =>0,
			'metode' =>'offline'

		);

		$query = $this->db->insert('penjualan_barang', $object);
		echo json_encode($query);
	}
	function tambah_penjualan(){
		$kode_produk = $this->input->post('kode_produk');
		$uri = $this->input->post('uri');
		// $id_admin = $this->input->post('uri');
		$nama_admin = $this->input->post('nama_admin');
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
		$object_pembelian = array(
			'id_pembelian' =>$uri,
			'nama_produk' =>$nama_produk,
			'big_pic'=> $big_pic,
			'small_pic'=> $small_pic,
			'id_cat'=> $id_cat,
			'id_sub_cat'=> $id_sub_cat,
			'harga'=> $harga,
			// 'disc_1'=> $disc_1,
			// 'disc_2'=> $disc_2,
			// 'disc_3'=> $disc_3,
			'harga_jual'=> $harga_jual,
			'deskripsi'=>$deskripsi,
			'kode_produk'=>$kode_produk,
			'barcode'=>$barcode,
			'status'=>false,
			'jumlah'=>1,
			'nama_admin'=> $nama_admin
		);
		$query_check = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$uri, 'kode_produk'=>$kode_produk));
		if ($query_check->num_rows()>=1) {
			// echo 'alert("Gagal\nProduk sudah ada di list")';
		}else{
			$query = $this->db->insert('daftar_penjualan', $object_pembelian);
			echo json_encode($query);
		}
	}
	function hapus_daftar(){
		$kode_produk = $this->input->post('product_code');
		$faktur = $this->input->post('faktur');
		$this->db->where(array('id_pembelian'=> $faktur, 'kode_produk'=>$kode_produk, 'status'=>0));
		$query = $this->db->delete('daftar_penjualan');
		echo json_encode($query);

	}
	function get_customer(){
		$query = $this->db->get('customer');
		echo json_encode($query->result());
	}

	function penjualan_barang(){
		$this->_make_sure_is_kasir();
		$faktur = $this->input->post('faktur');
		$data = $this->mdl_penjualan->barang_jual_list($faktur);
		echo json_encode($data);
	}
	function get_faktur($id_admin){

		// $id_admin = $this->input->post('id_admin');
		// $this->db->limit(1);
		// $this->db->order_by('id', 'DESC');
		$this->db->like('tanggal_buat', date('Y-m-d'));
		$query = $this->db->get('penjualan_barang');
		$jumlah = $query->num_rows();
		$faktur = $id_admin.date('Ymd').$jumlah;
		return "$faktur";
		// echo json_encode(array('faktur'=>$faktur));
	}
	function _make_sure_is_kasir(){
		$is_user = $this->session->userdata('status_login');
		$id_admin = $this->session->userdata('id_admin_login');
		if ($id_admin == null) {
			redirect('login','refresh');
		}else{
			$this->db->select('* ,admin.id as id_admin');
			$this->db->from('admin');
			$this->db->join('contact_admin', 'admin.id = contact_admin.id_admin', 'left');
			$this->db->join('data_admin', 'admin.id = data_admin.id_admin', 'left');
			$this->db->where('admin.id', $id_admin);
			$admin_data = $this->db->get();
		}
		foreach ($admin_data->result() as $value) {
			$level_admin = $value->level;
		}
		if ($is_user == "admin_login" && $level_admin=="3") {

		}else {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}
	function _admin_data(){
		$this->_make_sure_is_kasir();
		$admin_data = $this->admin_info();
		foreach ($admin_data->result() as $value) {
			$adm['id_admin'] = $value->id_admin;
			$adm['nama_admin'] = $value->nama;
			$adm['level_admin'] = $value->level;
			$adm['foto_admin'] = $value->foto;
			$adm['alamat_admin'] = $value->alamat;
			$adm['nomor_telepon_admin'] = $value->nomor_telepon;
			$adm['email_admin'] = $value->email;
		}
		if ($adm['level_admin'] == 3) {
			$adm['jabatan_admin'] = "Kasir";
		}else{
			$adm['jabatan_admin'] = "Admin";
		}
		return $adm;
	}
	function admin_info(){
		$this->_make_sure_is_kasir();
		$id_admin = $this->session->userdata('id_admin_login');
		if ($id_admin == null) {
			redirect('login','refresh');
		}else{
			$this->db->select('* ,admin.id as id_admin');
			$this->db->from('admin');
			$this->db->join('contact_admin', 'admin.id = contact_admin.id_admin', 'left');
			$this->db->join('data_admin', 'admin.id = data_admin.id_admin', 'left');
			$this->db->where('admin.id', $id_admin);
			$admin = $this->db->get();
		}
		return $admin;
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */