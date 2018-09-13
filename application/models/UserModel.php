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

    function KDUser(){
        $this->db->select('RIGHT(kd_user,4) as kode', FALSE);
        $this->db->order_by('kd_user', 'DESC');
        $this->db->limit(1);
  
        $q = $this->db->get('tb_user');
  
        if ($q->num_rows() <> 0) {
  
                //jika kode sudah ada
                $data = $q->row();
                $kode = intval($data->kode) + 1;
  
            }else{
                //jika kode belum ada
                $kode = 1;
            }
            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $kodejadi = 'U'.$kodemax;
  
            return $kodejadi;
  
      }

    function Show(){
        $this->db->order_by('kd_user','ASC');
        return $this->db->get('tb_user');
    }

    function Detail(){
        $this->db->where('id_user',$this->uri->segment('2'));
        return $this->db->get('tb_user');
    }

    function Put(){
        $dtarray = array(
            'kd_user'       => $this->KDUser(),
            'username'      => $this->input->post('username',TRUE),
            'nama_lengkap'  => $this->input->post('nama_lengkap',TRUE),
            'password_user' => MD5('user12345'),
            'status_user'   => $this->input->post('status_user',TRUE),
            'kd_atasan'     => $this->input->post('kd_atasan',TRUE),
            'kd_departemen' => $this->input->post('kd_departemen',TRUE),
            'level_user'    => $this->input->post('level_user',TRUE),
        );
        $this->db->insert('tb_user',$dtarray);
    }
}