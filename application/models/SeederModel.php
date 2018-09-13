<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SeederModel extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }


    function upuser(){
        $inserted = 'U0000'.'|'.date('Y/m/d').'|'.date('H:m:s');
        $dtarray = array(
            'kd_user'       => 'U0000',
            'nama_lengkap'  => 'administrator',
            'username'      => 'administrator',
            'password_user' => MD5('123456'),
            'status_user'   => 'Y',
            'kd_atasan'     => 'U0000',
            'kd_departemen' => 'OOO',
            'kd_cabang'     => 'OOO',
            'level_user'    => 'ADM',
            'creator_user'  => 'U0000',
            'editor_user'   => 'U0000',
            'his_user'      => $inserted);

        return $this->db->insert('tb_user',$dtarray);
    }

    function upakses($id){
        $inserted = 'U0000'.'|'.date('Y/m/d').'|'.date('H:m:s');
        $dtarray = array(
            'id_user'           => $id,
            'aks_user'          => '1,1,1,1,1',
            'aks_home'          => '1,1,1,1,1',
            'aks_log'           => '1,1,1,1,1',
            'creator_akses'     => 'U0000',
            'editor_akses'      => 'U0000',
            'his_akses'          => $inserted);

        return $this->db->insert('tb_hakakses',$dtarray);
    }
}