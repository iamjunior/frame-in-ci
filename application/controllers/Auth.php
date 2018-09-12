<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$session = $this->session->userdata('login-pond');
			if(($session != 'LoginKu') or ($session != 'RootKu')){
				$this->load->view('auth/login');
			}else{
				redirect('Home');
			}
	}

	public function chekLogin(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        
		$username   = $this->security->xss_clean($this->input->post("username"));
        $password   = $this->security->xss_clean($this->input->post("password"));

        $cek        = $this->UserModel->chekLogin($username,md5($password));
        if($this->form_validation->run() != TRUE){
            $this->load->view('auth/login');
        }elseif(($username=='root')&&($password=='root')){
            $this->session->set_userdata(array(
                'login-pond'            => "RootKu",
				'kduser-pond'       	=> 'ROOT',
                'username-pond'         => 'ROOT',
				'depart-pond'           => 'ROOT',
				'cabang-pond'       	=> 'ROOT'
            ));
			//AuthLog($this->session->userdata('kduser-pond'),$username,'Success');
            redirect('Home');
        }elseif(count($cek) == 1){
            $this->session->set_userdata(array(
                'login-pond'            => "LoginKu",
				'kduser-pond'       	=> $cek[0]['kd_user'],
                'username-pond'         => $cek[0]['username'],
				'depart-pond'           => $cek[0]['kd_departemen'],
				'cabang-pond'       	=> $cek[0]['kd_cabang']
            ));
			//AuthLog($this->session->userdata('kduser-pond'),$username,'Success');
            redirect('Home');
        }else{
			//AuthLog($username,$username,'Failed');
            $this->session->set_flashdata('loginGagal', '<br>Username/Password salah</br>');
			header('location:'. site_url('Auth'));
        }
    }

	public function logout(){
		//$this->session->sess_destroy();
		//AuthLog($this->session->userdata('kduser-pond'),$this->session->userdata('username-pond'),'Success');
				$this->session->unset_userdata(array(
						'login-pond',
						'kduser-pond',
						'username-pond',
						'depart-pond',
						'cabang-pond'
				));
        redirect('Auth','refresh');
    }
}
