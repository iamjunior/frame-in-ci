<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public $tb  ="tb_user";
    public $fId ="id_user";
    public $fKd ="kd_user";

    public function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password_user',$password);
        $this->db->where('status_user','Y');
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    //digunakan untuk hak akses per modul
    public function akses($field,$val){
        $this->db->join('tb_user','tb_hakakses.id_user = tb_user.id_user');
        $this->db->where('kd_user',$this->session->userdata('kduser-pond'));
        $q   = $this->db->get('tb_hakakses')->first_row();

        $key = explode(",", $q->$field);
        return $key[$val];
    }
}