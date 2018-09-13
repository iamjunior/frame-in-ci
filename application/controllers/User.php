<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->cekAuth();
	}
	
	public function index(){
        $this->cekAkses('aks_user','0');
        $data = $this->UserModel->Show()->result_array();

        foreach($data as $key=>$dt){
            $no = $key+1;
            $data[$key]['no'] = $no;
            $data[$key]['edit'] = base_url('user/'.$dt['id_user']);
        }

        $parser = array(
            'judul'     => 'User',
            'sjudul'    => 'Viw User',
            //'add'       => base_url('user-add'),
            'add'       => 'user-add',
            'dataweb'   => $data,
        );
        $this->parser->parse('user/view', $parser);
    }

    public function add(){
        $parser = array(
            'judul'     => 'User',
            'sjudul'    => 'Add User',
            'addup'     => base_url('user-add')
        );
            $this->parser->parse('user/add',$parser);
    }
    public function addup(){
        echo 'cilu ba';        
    }
    public function edit(){
        $data = $this->UserModel->Detail()->first_row();
        if(empty($data)){
            redirect('error-404');
        }else{
            $this->parser->parse('user/edit',$data);
        }
    }
}
