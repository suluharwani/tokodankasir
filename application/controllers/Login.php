<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mdl_login');
	}
	public function index()
	{
		$data['title'] = "Register Admin";
		$jumlah_admin = $this->db->get('admin')->num_rows();
		$submit = $this->input->post('submit',TRUE);
		if ($jumlah_admin<1) {
			if ($submit=="register") {
				$this->form_validation->set_rules('username', 'Username', array('required','is_unique[admin.username]','callback_check_panjang_username' ));
				$this->form_validation->set_rules('password', 'Password', array('required','callback_check_panjang_password' ));
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

				if ($this->form_validation->run() == FALSE){
					$data['check_password'] = $this->session->flashdata('password_check');
				// $data['check_password'] = $this->session->flashdata('password_check');
					$data['check_username'] = $this->session->flashdata('username_check');
					redirect('login','refresh');				
				}else {
					$nama = $this->input->post('nama');
					$username = $this->input->post('username');
					$password = $this->bcrypt->hash_password($this->input->post('password'));
					$no_hp = $this->input->post('no_hp');
					$email = $this->input->post('email');
					$object = [
						'nama' => $nama,
						'username' => $username,
						'password' => $password,
						'level' => '1',
					];
					$this->db->insert('admin', $object);
				}
				redirect('login','refresh');
			}

			$this->load->view('admin_login/reg_admin',$data);
		}else{
			if ($submit=="submit") {
			//proses login
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$hasil = $this->mdl_login->login_admin($username,$password);
				if ($hasil==1) {
					$adm = $this->mdl_login->adm($username);
					foreach ($adm->result() as $value) {
						$id_admin = $value->id;
					}
					$this->session->set_userdata(array('status_login' => 'admin_login', 'id_admin_login' => $id_admin));
					redirect('/admin');
				}else{
					$data['salah'] = '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
					</i> Username atau password tidak ada, harap hubungi Super Admin</span></label>';
					// $this->load->view('admin_login/login', $data);
				}
			}
			$this->load->view('admin_login/login',$data);
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

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */