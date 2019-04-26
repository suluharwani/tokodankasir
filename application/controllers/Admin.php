<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('mdl_manage_admin');
		$this->load->model('mdl_login');
		$this->load->model('mdl_barang');
		$this->load->model('mdl_pembelian');
		
	}
	public $folder_admin = "adm"; 
	public function index()
	{
		$this->_make_sure_is_admin();
		$adm = $this->_admin_data();
		//code


		//code
		
		$data['nama_admin'] = $adm['nama_admin'];
		$data['jabatan_admin'] = $adm['jabatan_admin'];
		$data['email_admin'] = $adm['email_admin'];
		$data['title'] = "Admin";
		$data['konten'] = $this->load->view("$this->folder_admin/konten/dashboard",$data,true);
		$this->load->view("$this->folder_admin/dashboard", $data);	
	}

	public function supplier(){
		$this->_make_sure_is_admin();
		$adm = $this->_admin_data();
		$data['kategori'] = $this->db->get('kategori');
		$data['supplier'] = $this->db->get('kategori');

		$data['title'] = "Kategori";
		$data['nama_admin'] = $adm['nama_admin'];
		$data['jabatan_admin'] = $adm['jabatan_admin'];
		$data['email_admin'] = $adm['email_admin'];
		$data['konten'] = $this->load->view("$this->folder_admin/konten/supplier",$data,true);
		$this->load->view("$this->folder_admin/dashboard", $data);
	}
	function tambah_supplier(){
		$this->_make_sure_is_admin();
		$supplier = $this->input->post('supplier');
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];
		$tanggal_tambah = date('Y/m/d H:i:s');
		$this->form_validation->set_rules('supplier', 'supplier', 'required|callback_check_supplier');
		if ($this->form_validation->run() == TRUE){
			$query = $this->db->insert('supplier', array('nama_supplier'=>$supplier, 'tanggal_tambah'=>$tanggal_tambah, 'nama_admin'=>$nama_admin));
			echo json_encode($query);
		}
	}
	function tambah_sales(){
		$this->_make_sure_is_admin();
		$sales = $this->input->post('sales');
		$id_sup = $this->input->post('id_sup');
		$no_hp = $this->input->post('no_hp');
		$adm = $this->_admin_data();
		$nama_admin = $adm['nama_admin'];

		$query = $this->db->insert('sales', array('nama'=>$sales, 'id_supplier'=>$id_sup, 'no_hp'=>$no_hp));
		echo json_encode($query);
	}
	function update_sales(){
		$this->_make_sure_is_admin();
		$id_sales = $this->input->post('id_sales');
		$no_hp = $this->input->post('no_hp'); 
		$nama = $this->input->post('nama'); 
		$id_supplier = $this->input->post('id_supplier');
		
		$check = $this->db->get_where('sales', array('nama'=>$nama,'id_supplier'=>$id_supplier,'no_hp'=>$no_hp));
		if ($check->num_rows()==0){
			$this->db->where('id', $id_sales);
			$query = $this->db->update('sales', array('nama'=>$nama, 'no_hp'=>$no_hp));
			echo json_encode($query);
		}
	}
	function update_supplier(){
		$this->_make_sure_is_admin();
		$id_supplier = $this->input->post('id_supplier');
		$nama_supplier = $this->input->post('nama_supplier'); 
		$adm = $this->_admin_data();		
		$nama_admin = $adm['nama_admin'];
		$tanggal_tambah = date('Y/m/d H:i:s');
		$check = $this->db->get_where('supplier', array('nama_supplier'=>$nama_supplier));
		if ($check->num_rows()==0){
			$this->db->where('id', $id_supplier);
			$query = $this->db->update('supplier', array('nama_supplier'=>$nama_supplier, 'tanggal_tambah'=>$tanggal_tambah, 'nama_admin'=>$nama_admin));
			echo json_encode($query);
		}
	}
	function get_supplier(){
		$query = $this->db->get('supplier');
		echo json_encode($query->result());
	}
	function get_sales(){
		$this->db->select('*, sales.id as sales_id');
		$this->db->from('sales');
		$this->db->join('supplier', 'sales.id_supplier = supplier.id', 'left');
		$query = $this->db->get();
		echo json_encode($query->result());
	}
	function hapus_sales(){
		$id_sales = $this->input->post('id_sales');
		$this->db->where('id', $id_sales);
		$query = $this->db->delete('sales');
		echo json_encode($query);
	}
	function hapus_supplier(){
		$id_sup = $this->input->post('id_sup');
		$this->db->where('id', $id_sup);
		$this->db->delete('supplier');
		$this->db->where('id_supplier', $id_sup);
		$query = $this->db->delete('sales');
		echo json_encode($query);
	}
	function tambah_kategori(){
		$this->_make_sure_is_admin();
		$kategori = $this->input->post('kategori');
		$this->form_validation->set_rules('kategori', 'kategori', 'required|callback_check_kategori');
		if ($this->form_validation->run() == TRUE){
			$query = $this->db->insert('kategori', array('kategori'=>$kategori));
			echo json_encode($query);
		}
	}
	function check_kategori(){
		$this->_make_sure_is_admin();
		$kategori = $this->input->post('kategori');
		$check = $this->db->get_where('kategori', array('kategori'=>$kategori));
		if ($check->num_rows()>1){
			return false;
		}else{
			return true;
		}
	}
	function check_supplier(){
		$this->_make_sure_is_admin();
		$supplier = $this->input->post('supplier');
		$check = $this->db->get_where('supplier', array('nama_supplier'=>$supplier));
		if ($check->num_rows()>1){
			return false;
		}else{
			return true;
		}
	}
	function tambah_sub_kategori(){
		$this->_make_sure_is_admin();
		$id_kategori = $this->input->post('id_kategori');
		$sub_kategori = $this->input->post('sub_kategori');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required');
		$this->form_validation->set_rules('sub_kategori', 'sub_kategori', 'required|callback_check_sub_kategori');
		if ($this->form_validation->run() == TRUE){
			$query = $this->db->insert('sub_kategori', array('id_kategori'=>$id_kategori,'sub_kategori'=>$sub_kategori));
			echo json_encode($query);
		}
	}
	function hapus_sub_kategori(){
		$id_sub = $this->input->post('kode_sub');
		$this->db->where('id', $id_sub);
		$query = $this->db->delete('sub_kategori');
		echo json_encode($query);
	}
	function hapus_kategori(){
		$id_cat = $this->input->post('id_cat');
		$this->db->where('id_kategori', $id_cat);
		$query1 = $this->db->delete('sub_kategori');
		$this->db->where('id', $id_cat);
		$query2 = $this->db->delete('kategori');
		echo json_encode($query2);
	}
	function check_sub_kategori(){
		$this->_make_sure_is_admin();
		$id_kategori = $this->input->post('id_kategori');
		$sub_kategori = $this->input->post('sub_kategori');
		$check = $this->db->get_where('sub_kategori', array('id_kategori'=>$id_kategori,'sub_kategori'=>$sub_kategori));
		if ($check->num_rows()>=1){
			return false;
		}else{
			return true;
		}
	}
	function update_sub_kategori(){
		$this->_make_sure_is_admin();
		$id_sub = $this->input->post('id_sub');
		$id_cat_parent_edit = $this->input->post('id_cat_parent_edit');
		$sub_kategori_edit = $this->input->post('sub_cat');
		$kategori_parent = $this->input->post('kategori_parent');
		$check = $this->db->get_where('sub_kategori', array('id_kategori'=>$id_cat_parent_edit,'sub_kategori'=>$sub_kategori_edit));
		if ($check->num_rows()==0){
			$this->db->where('id', $id_sub);
			$query = $this->db->update('sub_kategori', array('sub_kategori'=>$sub_kategori_edit));
			echo json_encode($query);
		}

	}
	function update_kategori(){
		$this->_make_sure_is_admin();
		$id_cat = $this->input->post('id_cat');
		$kategori = $this->input->post('kategori');
		$check = $this->db->get_where('kategori', array('kategori'=>$kategori));
		if ($check->num_rows()==0){
			$this->db->where('id', $id_cat);
			$query = $this->db->update('kategori', array('kategori'=>$kategori));
			echo json_encode($query);
		}

	}


	public function kategori(){
		$this->_make_sure_is_admin();
		$adm = $this->_admin_data();
		$data['kategori'] = $this->db->get('kategori');
		$data['title'] = "Kategori";
		$data['nama_admin'] = $adm['nama_admin'];
		$data['jabatan_admin'] = $adm['jabatan_admin'];
		$data['email_admin'] = $adm['email_admin'];
		$data['konten'] = $this->load->view("$this->folder_admin/konten/kategori",$data,true);
		$this->load->view("$this->folder_admin/dashboard", $data);
	}
	function get_kategori(){
		$this->db->select('*, sub_kategori.id as sub_id, kategori.id as cat_id');
		$this->db->from('sub_kategori');
		$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id', 'left');
		$query = $this->db->get();
		echo json_encode($query->result());
	}
	function get_cat(){
		$query = $this->db->get('kategori');
		echo json_encode($query->result());
	}
	public function product(){
		$this->_make_sure_is_admin();
		$adm = $this->_admin_data();
		//code

		//code
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['supplier'] = $this->db->get('supplier')->result();
		$data['nama_admin'] = $adm['nama_admin'];
		$data['jabatan_admin'] = $adm['jabatan_admin'];
		$data['email_admin'] = $adm['email_admin'];
		$data['title'] = "Produk";
		$data['konten'] = $this->load->view("$this->folder_admin/konten/produk",$data,true);
		$this->load->view("$this->folder_admin/dashboard", $data);
	}
	function det_produk(){
		$kode_barang = $this->input->post('kode_produk');
		$this->db->select('*, produk.nama_admin as nama_admin_produk');
		$this->db->where('kode_produk', $kode_barang);
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_cat = kategori.id', 'left');
		$this->db->join('sub_kategori', 'produk.id_sub_cat = sub_kategori.id', 'left');
		$this->db->join('supplier', 'produk.id_supplier = supplier.id', 'left');
		$query = $this->db->get()->result();
		echo json_encode($query);
	}
	function delete_produk(){
		$this->_make_sure_is_admin();
		$kode_produk = $this->input->post('kode_produk');
		$this->db->where('kode_produk', $kode_produk);
		$query = $this->db->delete('produk');
		echo json_encode($query);
	}
	function get_nama_kategori($id_sub){
		$this->_make_sure_is_admin();
		$this->db->select('kategori, sub_kategori');
		$this->db->from('kategori');
		$this->db->join('sub_kategori', 'sub_kategori.id_kategori = kategori.id', 'left');
		$this->db->where('sub_kategori.id', $id_sub);
		$query = $this->db->get()->result();
		echo json_encode($query);	
	}
	function get_kode_produk($id_sub){
		$this->db->select('*');
		$this->db->order_by("id", "desc");
		$this->db->where('id_sub_cat', $id_sub);
		$query = $this->db->get('produk', 1);


		if ($query->num_rows() < 1) {
			$this->db->where('id', $id_sub);
			$sub_cat_query = $this->db->get('sub_kategori');
			foreach ($sub_cat_query->result() as $row) {
				$id_cat = $row->id_kategori;
				$id_sub_cat = $row->id;
			}
			$hasil = array('kode_barang' => $id_cat.$id_sub_cat."0001");
		}else{
			foreach ($query->result() as $row) {
				$kode_terakhir = $row->kode_produk;
				$id_cat1 = $row->id_cat;
				$id_sub_cat1 = $row->id_sub_cat;
			}
			$kode_awalan = $id_cat1.$id_sub_cat1;
			$panjang = strlen($kode_awalan);
			$kode_akhir = substr($kode_terakhir, $panjang);
			$kode = $kode_awalan.$kode_akhir+1;
			if ($this->check_kode($kode) == false) {
				$hasil = array('kode_barang' =>$this->get_unique_code($kode_awalan, $panjang, $kode_akhir, $kode, $id_sub_cat1));
			}else {
				$hasil = array('kode_barang' =>$kode);
			}
		}
		echo json_encode($hasil);
		// echo json_encode($sub_cat_query);
	}
	function tambah_produk(){
		$this->form_validation->set_rules('kode_produk', 'Kode Produk', array('required','is_unique[produk.kode_produk]'));
		if ($this->form_validation->run() == TRUE){
			$adm = $this->_admin_data();
			$tgl = date('Y/m/d H:i:s');
			$data_barang = array(
			//admin
				'nama_admin' => $adm['nama_admin'],
            //produk
				'nama_produk'  => $this->input->post('nama_produk'), 
				'id_sub_cat'  => $this->input->post('sub_kategori'), 
				'id_cat' => $this->input->post('kategori'), 
				'kode_produk' => $this->input->post('kode_produk'), 
				'id_supplier' => $this->input->post('supplier'),
				'barcode' => $this->input->post('kode_produk'),
				'tanggal' => $tgl,
			);

			$data=$this->mdl_barang->save_product($data_barang);	 
			echo json_encode($data);
		}
	}
	public function do_upload(){
		$this->load->library('upload');
		$config['upload_path']          = './assets/gambar/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
		$config['max_size']             = 100000;
		$config['max_width']            = 20000;
		$config['max_height']           = 20000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
             if (!$this->upload->do_upload('gambar')) { //jika gagal upload
               $error = array('error' => $this->upload->display_errors()); //tampilkan error
               // $this->session->set_flashdata('berhasil', $this->notif_gagal);
               // redirect("adminru/$url",'refresh');
             } else { //jika berhasil upload
             	$file = $this->upload->data();

             	$path =  "./assets/gambar/produk/".$file['file_name']."";
             	$new_path =  "./assets/gambar/thumb/";
             	$width = 300;
             	$height = 300;
             	$this->load->library('image_lib');

             	$this->image_lib->initialize(array(
             		'image_library' => 'gd2',
             		'source_image' => $path,
             		'new_image' => $new_path,
             		'maintain_ratio' => true,
             		'master_dim' => 'width',
             		'width' => $width,
             		'height' => $height
             	));
             	$this->image_lib->resize();
             }
             $object_foto = array(
             	'big_pic' => $file['file_name'],
             	'small_pic' =>  $file['file_name']
             );
             $id_barang = $this->input->post('product_code_foto');
             $this->db->where('kode_produk', $id_barang);		
             $query = $this->db->update("produk", $object_foto);
             echo json_encode($query);
         }
         function update_barang(){
         	$adm = $this->_admin_data();
         	$id_barang = $this->input->post('id_barang');
         	$data_barang = array(
         		'nama_admin'  => $adm['nama_admin'],
         		'kode_produk' => $this->input->post('kode_produk'),
         		'barcode'	  => $this->input->post('barcode'),
         		'nama_produk' => $this->input->post('nama_produk'),
         		'disc_1'      => $this->input->post('disc_1'),
         		'disc_2'      => $this->input->post('disc_2'),
         		'disc_3'      => $this->input->post('disc_3'),
         		'harga'       => $this->input->post('harga'),
         		'harga_jual'  => $this->input->post('harga_jual'),
         		'jumlah'      => $this->input->post('stock_produk_edit'),
         		'tanggal'      => date('Y/m/d H:i:s')
         	);
         	$this->db->where('id', $id_barang);		
         	$query = $this->db->update("produk", $data_barang);
         	echo json_encode($query);
         }
         function check_kode($kode){
         	$this->db->where('kode_produk', $kode);
         	$query = $this->db->get('produk');
         	if ($query->num_rows()==0) {
         		return true;
         	}else {
         		return false;
         	}
         }
         function get_unique_code($kode_awalan, $panjang, $kode_akhir, $kode, $id_sub_cat){
         	for ($i = $kode ; $this->check_kode($kode) == true; $i++) {

         	}
         	return $i;
         }
         function product_data(){
         	$this->_make_sure_is_admin();
         	$data = $this->mdl_barang->product_list();
         	echo json_encode($data);
         }
         function save(){
         	$this->_make_sure_is_admin();
         	$data=$this->product_model->save_product();
         	echo json_encode($data);
         }
         function update(){
         	$this->_make_sure_is_admin();
         	$data=$this->product_model->update_product();
         	echo json_encode($data);
         }
         function delete(){
         	$this->_make_sure_is_admin();
         	$data=$this->product_model->delete_product();
         	echo json_encode($data);
         }
         function pilih_kategori($id) {
         	$result = $this->db->where("id_kategori",$id)->get("sub_kategori")->result();
         	echo json_encode($result);
         }
         public function pembelian(){
         	$this->_make_sure_is_admin();
         	$adm = $this->_admin_data();
		//code

		//code
         	$data['email_admin'] = $adm['email_admin'];
         	$data['nama_admin'] = $adm['nama_admin'];
         	$data['jabatan_admin'] = $adm['jabatan_admin'];
         	$data['title'] = "Produk";
         	$data['konten'] = $this->load->view("$this->folder_admin/konten/pembelian",$data,true);
         	$this->load->view("$this->folder_admin/dashboard", $data);
         }
         function hapus_barang_pembelian(){
         	$this->_make_sure_is_admin();
         	$faktur = $this->input->post('faktur');
         	$product_code = $this->input->post('product_code');
         	$this->db->where(array('id_pembelian'=> $faktur, 'kode_produk'=>$product_code));
         	$query = $this->db->delete('daftar_pembelian');
         	echo json_encode($query);
         }
         function hapus_faktur(){
         	$this->_make_sure_is_admin();
         	$id = $this->input->post('id_faktur');
         	$nomor_faktur = $this->input->post('nomor_faktur');
         	$this->db->where(array('id'=>$id, 'status'=>0));
         	$this->db->delete('pembelian_barang');
         	$this->db->where('id_pembelian', $nomor_faktur);
         	$query = $this->db->delete('daftar_pembelian');
         	echo json_encode($query);
         }
         public function beli(){
         	$this->_make_sure_is_admin();
         	$uri = $this->uri->segment(3);
         	$data['uri'] = $uri;
         	$data['judul'] = "Pembelian $uri";
         	$adm = $this->_admin_data();
         	$data['email_admin'] = $adm['email_admin'];
         	$data['nama_admin'] = $adm['nama_admin'];
         	$data['jabatan_admin'] = $adm['jabatan_admin'];
         	$data['title'] = "Produk";
         	$data['barang'] = $this->mdl_barang->product_list();
         	$data['status'] = $this->mdl_barang->status_pembelian($uri);

         	if (!isset($uri)) {
         		redirect('admin/pembelian','refresh');
         	}else{
         		if ($this->mdl_barang->check_faktur($uri)<1) {
         			redirect('admin/pembelian','refresh');
         		}else{
         			$data['konten'] = $this->load->view("$this->folder_admin/konten/beli",$data,true);
         			$this->load->view("$this->folder_admin/dashboard", $data);
         		}
         	}

         }
         function info_barang_beli(){
         	$kode_produk_edit = $this->input->post('kode_produk_edit');
         	$id_pembelian = $this->input->post('id_pembelian');
         	$query = $this->db->get_where('daftar_pembelian', array('id_pembelian'=>$id_pembelian,'kode_produk'=>$kode_produk_edit));
         	echo json_encode($query);
         }
         function tambah_pembelian(){
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
         		'disc_1'=> $disc_1,
         		'disc_2'=> $disc_2,
         		'disc_3'=> $disc_3,
         		'harga_jual'=> $harga_jual,
         		'deskripsi'=>$deskripsi,
         		'kode_produk'=>$kode_produk,
         		'barcode'=>$barcode,
         		'status'=>false,
         		'nama_admin'=> $nama_admin
         	);
         	$query_check = $this->db->get_where('daftar_pembelian', array('id_pembelian'=>$uri, 'kode_produk'=>$kode_produk));
         	if ($query_check->num_rows()>=1) {
			// echo 'alert("Gagal\nProduk sudah ada di list")';
         	}else{
         		$query = $this->db->insert('daftar_pembelian', $object_pembelian);
         		echo json_encode($query);
         	}
         }
         function update_daftar_pembelian(){
		// $kode_produk = $this->input->post('kode_produk');
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
         	);

         	$this->db->where(array('id_pembelian'=> $kode_faktur, 'kode_produk'=>$kode_produk_edit));
         	$query = $this->db->update('daftar_pembelian', $object);
         	echo json_encode($query);
         }
         function posting_pembelian(){
         	$kode = $this->input->post('kode_faktur');
         	$data_pembelian = $this->db->get_where('daftar_pembelian', array('id_pembelian'=>$kode))->result();
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
				// $nama_admin = $nama_admin;
				// $tanggal = $tanggal
         		$this->db->query('UPDATE `produk` SET `harga` = '.$harga.', `jumlah` = jumlah + '.$jumlah.', `harga_jual` = '.$harga_jual.', `disc_1` = '.$disc_1.', `disc_2` = '.$disc_2.', `disc_3` = '.$disc_3.', `nama_admin` = "'.$nama_admin.'", `tanggal` = "'.$tanggal.'" WHERE `kode_produk` = '.$value->kode_produk.'');
         	}
         	$this->db->where('nomor_faktur', $kode);
         	$query = $this->db->update('pembelian_barang', array('status'=>'1','tanggal_posting'=>$tanggal));
         	echo json_encode($query);

         }

         function batal_posting_pembelian(){
         	$kode = $this->input->post('kode_faktur');
         	$data_pembelian = $this->db->get_where('daftar_pembelian', array('id_pembelian'=>$kode))->result();
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
				// $nama_admin = $nama_admin;
				// $tanggal = $tanggal
         		$this->db->query('UPDATE `produk` SET `harga` = '.$harga.', `jumlah` = jumlah - '.$jumlah.', `harga_jual` = '.$harga_jual.', `disc_1` = '.$disc_1.', `disc_2` = '.$disc_2.', `disc_3` = '.$disc_3.', `nama_admin` = "'.$nama_admin.'", `tanggal` = "'.$tanggal.'" WHERE `kode_produk` = '.$value->kode_produk.'');
         	}
         	$this->db->where('nomor_faktur', $kode);
         	$query = $this->db->update('pembelian_barang', array('status'=>'0', 'tanggal_update'=>$tanggal));
         	echo json_encode($query);

         }
         function simpan_faktur_pembelian(){
         	$faktur = $this->input->post('nomor_faktur');
         	$id_supplier = $this->input->post('id_supplier');
         	$adm = $this->_admin_data();
         	$tanggal_buat = date('Y/m/d H:i:s');
         	$id_admin = $adm['id_admin'];
         	$object = array(
         		'nomor_faktur' => $faktur,
         		'id_supplier' => $id_supplier,
         		'tanggal_buat' => $tanggal_buat,
         		'id_admin' => $id_admin,
         		'status' => 0,
         	);
         	$query = $this->db->insert('pembelian_barang', $object);
         	echo json_encode($query);
         }
         function check_nomor_faktur(){
         	$nomor_faktur = $this->input->post('nomor_faktur_input');
         	$query = $this->db->get_where('pembelian_barang', array('nomor_faktur'=>$nomor_faktur));
         	if ($query->num_rows()>0) {
         		echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         		</i>Nomor Faktur sudah ada, mohon ganti dengan yang lain atau tambah dengan nama supplier di belakang nomor faktur!</span></label>';
         	}else{
         		echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Faktur Tersedia</span></label>';
         	}
         }
         function batal_pembelian(){
         	$this->_make_sure_is_admin();
         	$faktur = $this->input->post('faktur');
         	$this->db->where('nomor_faktur', $faktur);
         	$query = $this->db->update('pembelian_barang', array('status'=>'0'));
         	echo json_encode($query);
         }
         function pembelian_data(){
         	$this->_make_sure_is_admin();
         	$data = $this->mdl_pembelian->pembelian_list();
         	echo json_encode($data);
         }
         function pembelian_barang($uri){
         	$this->_make_sure_is_admin();
         	$data = $this->mdl_pembelian->barang_beli_list($uri);
         	echo json_encode($data);
         }
         function manage_admin(){
         	$this->_make_sure_is_super_admin();
         	$adm = $this->_admin_data();
         	$string = $this->random_string('8');
         	$data['kodeaktivasi'] = $this->encrypt($string, 88);
         	$data['email_admin'] = $adm['email_admin'];
         	$data['nama_admin'] = $adm['nama_admin'];
         	$data['jabatan_admin'] = $adm['jabatan_admin'];
         	$data['title'] = "Produk";
         	$data['konten'] = $this->load->view("$this->folder_admin/konten/manage_admin",$data,true);
         	$this->load->view("$this->folder_admin/dashboard", $data);
         }
         function admin_list(){
         	$data = $this->mdl_manage_admin->admin_list();
         	echo json_encode($data);
         }
         function get_admin(){
         	$id_admin = $this->input->get('id_admin');
         	$data = $this->mdl_manage_admin->get_admin_by_kode($id_admin);
         	echo json_encode($data);
         }
         function simpan_admin(){
         	$this->_make_sure_is_admin();
         	$this->form_validation->set_rules('username', 'Username', array('required','is_unique[admin.username]','callback_check_panjang_username' ));
         	$this->form_validation->set_rules('password', 'Password', array('required','callback_check_panjang_password' ));
         	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
         	if ($this->form_validation->run() == FALSE){
         		$check['check_password'] = $this->session->flashdata('password_check');
				// $check['check_password'] = $this->session->flashdata('password_check');
         		$check['check_username'] = $this->session->flashdata('username_check');			
         	}else {
         		$nama = $this->input->post('nama');
         		$username = $this->input->post('username');
         		$level = $this->input->post('level');
         		$password = $this->bcrypt->hash_password($this->input->post('password'));
         		$kodeaktivasi = $this->input->post('kodeaktivasi');
         		$konfirmasi_aktivasi = $this->input->post('konfirmasi_aktivasi');
         		$konfirmasi = $this->decrypt($kodeaktivasi, 88);
         		if ($konfirmasi_aktivasi == $konfirmasi) {
         			$data = $this->mdl_manage_admin->simpan_admin($nama, $username, $password, $level);
         			echo json_encode($data);
         		}
         	}
         }
         function update_admin(){
         	$this->_make_sure_is_admin();
         	$id_admin = $this->input->post('id_admin');
         	$nama = $this->input->post('nama');
         	$username = $this->input->post('username');
         	$level = $this->input->post('level');
			// $password = $this->bcrypt->hash_password($this->input->post('password'));
         	$data = $this->mdl_manage_admin->update_admin($nama, $username, $level, $id_admin);
         	echo json_encode($data);
         }     
         function update_password_admin(){
         	$this->_make_sure_is_admin();
         	$this->form_validation->set_rules('password', 'Password', array('required','callback_check_panjang_password' ));
         	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
         	if ($this->form_validation->run() == FALSE){
         		$check['check_password'] = $this->session->flashdata('password_check');
				// $data['check_password'] = $this->session->flashdata('password_check');
         		$check['check_username'] = $this->session->flashdata('username_check');			
         	}else {
         		$id_admin = $this->input->post('id_admin');
         		$password = $this->bcrypt->hash_password($this->input->post('password'));
         		$data = $this->mdl_manage_admin->update_admin_password($password, $id_admin);
         		echo json_encode($data);
         	}     
         }
         function hapus_admin(){
         	$this->_make_sure_is_admin();
         	$id_admin = $this->input->post('id_admin');
         	$data = $this->mdl_manage_admin->hapus_admin($id_admin);
         	echo json_encode($data);
         }
         function _make_sure_is_admin(){
         	$is_user = $this->session->userdata('status_login');
         	$admin_data = $this->admin_info();
         	foreach ($admin_data->result() as $value) {
         		$level_admin = $value->level;
         	}

         	if ($is_user == "admin_login") {
         		if ($level_admin==3) {
         			redirect("/kasir",'refresh');
         		}
         	}else {
         		$this->session->sess_destroy();
         		redirect('login','refresh');
         	}
         }
         function _admin_data(){
		// $this->_make_sure_is_admin();
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
         	if ($adm['level_admin'] == 1) {
         		$adm['jabatan_admin'] = "Super Admin";
         	}else{
         		$adm['jabatan_admin'] = "Admin";
         	}
         	return $adm;
         }
         function admin_info(){
		// $this->_make_sure_is_admin();
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
         function _make_sure_is_super_admin(){
         	$id_admin = $this->session->userdata('id_admin_login');
         	$admin = $this->db->get_where('admin', array('id'=>$id_admin));
         	foreach ($admin->result() as $value) {
         		$level = $value->level;
         	}
         	if (isset($level)) {
         		if ($level != "1") {
         			$this->session->sess_destroy();
         			redirect('login','refresh');
         		}
         	}else{
         		$this->session->sess_destroy();
         		redirect('login','refresh');
         	}
         }
         function sign_out(){
         	$this->session->sess_destroy();
         	$url = site_url('login');
         	redirect("$url",'refresh');
         }

         public function check_panjang_username($str)
         {
         	if (strlen($str) >= 5){
         		return TRUE;
         	}
         	else
         	{
         		$this->form_validation->set_message('username_check', '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         			</i>Username minimal 5 karakter</span></label>');
         		return FALSE;
         	}
         }
         public function check_username()
         {
         	if($this->mdl_login->get_username($_POST['username']) || strlen($_POST['username']) <5 ){
         		echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         		</i> Username telah digunakan atau kurang dari 5 karakter</span></label>';
         	}
         	else {
         		echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username tersedia</span></label>';
         	}
         }
         public function check_password()
         {
         	$pass1 = $_POST['password'];
         	$pass2 = $_POST['confirm_password'];
         	if ($pass1 == $pass2 && strlen($pass1)>=5) {
         		$hasil = true;
         	}else{
         		$hasil = false;
         	}
         	if($hasil){
         		echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Password Sesuai</span></label>';
         	}
         	else {
         		echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         		</i>Password tidak sama atau kurang dari 5 karakter</span></label>';

         	}
         }
         public function check_kode_produk()
         {
         	$kode_p = $_POST['kode_produk'];
         	$query = $this->db->get_where('produk', array('kode_produk'=>$kode_p));
         	if ($query->num_rows() >= 1) {
         		$hasil = false;
         	}else{
         		$hasil = true;
         	}
         	if($hasil){
         		echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Kode Produk Tersedia</span></label>';
         	}
         	else {
         		echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         		</i>Kode Produk sudah ada, mohon diubah</span></label>';

         	}
         }
         public function check_panjang_password($str)
         {
         	if (strlen($str) >= 5){
         		return TRUE;
         	}
         	else
         	{
         		$this->form_validation->set_message('password_check', '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
         			</i>Password minimal 5 karakter</span></label>');
         		return FALSE;
         	}
         }

         function test_print(){
         	$qr= "fgvhbjnk";
         	$data['coba'] = $qr;
         	$this->load->view("$this->folder_admin/printer", $data);
         }
         function test_nota(){
         	$qr= "fgvhbjnk";
         	$data['coba'] = $qr;
         	$this->load->view("nota", $data);
         }
         function random_string($length) {
         	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         	$charactersLength = strlen($characters);
         	$randomString = '';
         	for ($i = 0; $i < $length; $i++) {
         		$randomString .= $characters[rand(0, $charactersLength - 1)];
         	}
         	return $randomString;
         }
         function generate_kode(){
         	$string = $this->random_string(8);
         	$en = $this->encrypt($string, 88);
         	$hasil = array('kode'=>$en);
		// echo json_encode($hasil);
         	echo $en;
         }
         function encrypt($string, $key) {
         	$result = '';
         	for($i=0; $i<strlen($string); $i++) {
         		$char = substr($string, $i, 1);
         		$keychar = substr($key, ($i % strlen($key))-1, 1);
         		$char = chr(ord($char)+ord($keychar));
         		$result.=$char;
         	}

         	return base64_encode($result);
         }

         function decrypt($string, $key) {
         	$result = '';
         	$string = base64_decode($string);

         	for($i=0; $i<strlen($string); $i++) {
         		$char = substr($string, $i, 1);
         		$keychar = substr($key, ($i % strlen($key))-1, 1);
         		$char = chr(ord($char)-ord($keychar));
         		$result.=$char;
         	}

         	return $result;
         }

     }

     /* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */