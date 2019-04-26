<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mdl_login');
		$this->load->model('mdl_login_client');
	}
	public function index()
	{
		$data['provinsi'] = $this->db->get_where('provinces',array('id'=>72));
		$data['content'] = 'client/v_account';
		$this->load->view('client/layout/layout', $data);
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
	public function check_panjang_username($str)
	{
		if (strlen($str) >= 5){
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('username_check', '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
				</i>Email minimal 5 karakter</span></label>');
			return FALSE;
		}
	}
	public function check_username()
	{
		if($this->mdl_login_client->get_username($_POST['username']) || strlen($_POST['username']) <5 ){
			echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
			</i> Email telah digunakan atau kurang dari 5 karakter</span></label>';
		}
		else {
			echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email tersedia</span></label>';
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
	public function check_password_panjang()
	{
		$pass1 = $_POST['password'];
		
		if (strlen($pass1)>=5) {
			$hasil = true;
		}else{
			$hasil = false;
		}
		if($hasil){
			echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Password Sesuai</span></label>';
		}
		else {
			echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
			</i>Password kurang dari 5 karakter</span></label>';
			
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	public function signin() {
		
		$data = array('content' => 'client/v_signin');
		$submit = $this->input->post('submit');
		if ($submit=="submit") {
			//proses login
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->mdl_login_client->login_customer($username,$password);
			if ($hasil==1) {
				$adm = $this->mdl_login_client->adm($username);
				foreach ($adm->result() as $value) {
					$id_client = $value->id;
				}
				$this->session->set_userdata(array('status_login_client' => 'client_login', 'id_client_login' => $id_client));
				redirect('client');
			}else{
				$data['salah'] = '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
				</i> Username atau password tidak ada, harap hubungi Super Admin</span></label>';
					// $this->load->view('admin_login/login', $data);
			}
		}

		$this->load->view('client/layout/layout', $data);
	}

	public function signup() {
		$this->form_validation->set_rules('username', 'Username', array('required','is_unique[customer_data.username]','callback_check_panjang_username' ));
		$this->form_validation->set_rules('password', 'Password', array('required','callback_check_panjang_password' ));
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$data['check_password'] = $this->session->flashdata('password_check');
				// $data['check_password'] = $this->session->flashdata('password_check');
			$data['check_username'] = $this->session->flashdata('username_check');
			// redirect('client/login','refresh');				
		}else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->bcrypt->hash_password($this->input->post('password'));
			$object = [
				'nama' => $nama,
				'username' => $username,
				'password' => $password,
			];
			$this->db->insert('customer_data', $object);
			redirect('client/signin','refresh');
		}

		$data = array('content' => 'client/v_signup');
		$this->load->view('client/layout/layout', $data);
	}

	public function order() {
		$id_client = $this->session->userdata('id_client_login');
		$this->db->where(array('id_customer'=> $id_client, 'metode'=>'online'));
		$data['query_progress'] = $this->db->get('penjualan_barang');

		$this->db->where(array('id_customer'=> $id_client, 'metode'=>'online', 'sampai'=>1));
		$data['query_sampai'] = $this->db->get('penjualan_barang');


		$data['controller']=$this; 
		$data['content'] = 'client/v_order';
		$this->load->view('client/layout/layout', $data);
	}
	function jumlah_pembelian($faktur){
		$query = $this->db->get_where('daftar_penjualan', array('id_pembelian'=>$faktur));
		$jumlah_pembelian = 0;
		foreach ($query->result() as $row) {
			$jumlah_pembelian += $row->jumlah*(($row->harga_jual-($row->harga_jual*$row->disc_1/100)-(($row->harga_jual-($row->harga_jual*$row->disc_1/100))*$row->disc_2/100)-(($row->harga_jual-($row->harga_jual*$row->disc_1/100)-(($row->harga_jual-($row->harga_jual*$row->disc_1/100))*$row->disc_2/100))*$row->disc_3/100))-$row->potongan);
		}
		echo $jumlah_pembelian;
	}
	

	public function account() {
		$data['provinsi'] = $this->db->get('provinces');

		$data['content'] = 'client/v_account';
		$this->load->view('client/layout/layout', $data);
	}
	function edit_customer(){
		$nama_client =  $this->input->post('nama_client');
		$hp =  $this->input->post('hp');
		$email =  $this->input->post('email');
		$kode_pos = $this->input->post('kode_pos');
		$alamat = $this->input->post('alamat');
		$provinsi =$this->input->post('provinsi');
		$kabupaten = $this->input->post('kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$id_client = $this->input->post('id_client');

		$object = array(
			'nama'=>$nama_client,
			'username'=>$email,

		);

		if ($provinsi == null && $kecamatan== null && $kabupaten ==null) {
			$object_data = array(
				'customer_data_id' =>$id_client,
				'alamat' =>$alamat,
				'kode_pos' =>$kode_pos,
				'no_hp' =>$hp
			);
		}else{
			$object_data = array(
				'customer_data_id' =>$id_client,
				// 'foto' =>$
				'provinsi_id' =>$provinsi,
				'kabupaten_id' =>$kabupaten,
				'kecamatan_id' =>$kecamatan,
				'alamat' =>$alamat,
				'kode_pos' =>$kode_pos,
				'no_hp' =>$hp
			);
		}
		$this->db->where('id', $id_client);
		$this->db->update('customer_data', $object);
		$check = $this->db->get_where('customer_info', array('customer_data_id'=>$id_client));
		if ($check->num_rows()>0) {
			$this->db->where('customer_data_id', $id_client);
			$query = $this->db->update('customer_info', $object_data);
		}else {
			$query = $this->db->insert('customer_info', $object_data);
		}
		echo json_encode($query);
	}
	function pilih_kota($id){
		$result = $this->db->where("province_id",$id)->get("regencies")->result();
		echo json_encode($result);
	}
	function pilih_kecamatan($id){
		$result = $this->db->where("regency_id",$id)->get("districts")->result();
		echo json_encode($result);
	}

	public function checkout() {
		$data = array('content' => 'client/v_checkout');
		$this->load->view('client/layout/layout', $data);
	}

	public function payment() {
		$data = array('content' => 'client/v_payment');
		$this->load->view('client/layout/layout', $data);
	}
	function _make_sure_is_client(){
		$is_user = $this->session->userdata('status_login_client');
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
			redirect('client/signin','refresh');
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
		$id_client = $this->session->userdata('id_client_login');
		if ($id_client == null) {
			redirect('client/signin','refresh');
		}else{
			$this->db->select('* ,customer_data.id as id_customer, provinces.name as provinsi, regencies.name as kabupaten, districts.name as kecamatan');
			$this->db->from('customer_data');
			$this->db->join('customer_info', 'customer_data.id = customer_info.customer_data_id', 'left');
			$this->db->join('provinces', 'customer_info.provinsi_id = provinces.id', 'left');
			$this->db->join('regencies', 'kabupaten_id = regencies.id', 'left');
			$this->db->join('districts', 'kecamatan_id = districts.id', 'left');
			$this->db->where('customer_data.id', $id_client);
			$client = $this->db->get();
		}
		return $client;
	}
	function data_client(){
		$data = $this->admin_info()->result();
		echo json_encode($data);
	}

}