<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->cekAuth();
	}
	
	public function index(){
		$this->cekAkses('aks_home','0');
		$dt = array(
			$this->menu(),
			'login' 	=> $this->session->userdata('login-pond'),
			'kdusr' 	=> $this->session->userdata('kduser-pond'),
			'username' 	=> $this->session->userdata('username-pond'),
			'depart' 	=> $this->session->userdata('depart-pond'),
			'cabang' 	=> $this->session->userdata('cabang-pond'),
			'tampol' 	=> $this->cobaTampilkan()
		);
		$this->parser->parse('home/home',$dt);
	}
}
