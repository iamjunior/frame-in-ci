<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->cekAuth();
	}
	
	public function index(){
		$this->cekAkses('ops_home','0');

		$dt = array(
			'tampol' => $this->cobaTampilkan()
		);
		$this->load->view('home/home',$dt);
	}
}
