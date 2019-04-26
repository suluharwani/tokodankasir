<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index() {
		$data = array('content' => 'blog/v_blog');
    	$this->load->view('blog/layout/layout', $data);
	}

	public function readmore() {
		$data = array('content' => 'blog/v_readmore');
    	$this->load->view('blog/layout/layout', $data);
	}

}