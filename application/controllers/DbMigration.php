<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbMigration extends CI_Controller {

	public function index(){
            $this->load->library('migration');
            //if ($this->migration->current() === FALSE)
            if ($this->migration->version(2) === FALSE)
            {
                    show_error($this->migration->error_string());
            }else{
                echo "Migration Sukses..!";
            }
    }

    public function seeder(){
        $this->load->model('SeederModel');
        $upuser  = $this->SeederModel->upuser();
        $id      = $this->db->insert_id();
        $upakses = $this->SeederModel->upakses($id);
        if(($upuser)&&($upakses)){
            echo 'Seeder Sukses..!';
        }else{
            echo 'Seeder Gagal..!';
        }

    }
}
