<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HakaksesModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public $tb  = "tb_hakakses";
    public $fId = "id_hakakses";
    public $fKd = "id_user";

    function OShowAkses($mtd){
          $dtarray = array(
            'id_hakakses'      => $this->input->$mtd('inKD'),
            'tb_user.kd_user'  => $this->input->$mtd('inKK')
            );

          $this->db->join('tb_user','tb_hakakses.id_user = tb_user.id_user');
          $this->db->where($dtarray);
          return $this->db->get($this->tb);
      }
    
    function OPut($iduser){
        $dtakses ='';
        $lvl     = $this->input->post('level_user');
        if($lvl == 'STF'){
            $dataakses = array(
                'id_user'       => $iduser,
                'ask_user'      =>',,1,,',
                'ask_home'      =>'1,,,,',
                'ask_log'       =>'1,1,1,1,'
                );
        }elseif($lvl == 'SPV'){
            $dataakses = array(
                'id_user'       => $iduser,
                'ask_user'      =>',,1,,',
                'ask_home'      =>'1,,,,',
                'ask_log'       =>'1,1,1,1,'
                );
        }elseif($lvl == 'MGR'){
            $dataakses = array(
                'id_user'       => $iduser,
                'ask_user'      =>',,1,,',
                'ask_home'      =>'1,,,,',
                'ask_log'       =>'1,1,1,1,'
                );
        }else{
            $dataakses = array(
                'id_user'       => $iduser,
                'ask_user'      =>',,1,,',
                'ask_home'      =>'1,,,,',
                'ask_log'       =>'1,1,1,1,'
                );
        }

            return $this->db->insert($this->tb,$dataakses);
    }
    
    function OChangeProf(){
        $id = $this->input->post('inKD');
        $dtakses ='';
        $lvl     = $this->input->post('level_user');
        if($lvl == 'STF'){
            $dataakses = array(
                'ops_home'      =>'1,,,,',
                'ops_event'     =>'1,1,1,1,',
                'ops_ktp'       =>'1,1,1,,',
                'ops_passport'  =>'1,1,1,,',
                'ops_pax'       =>'1,1,1,,',
                'ops_reg'       =>'1,1,,,',
                'ops_scan'      =>'1,1,,,',
                'ops_arr'       =>'1,1,,,',
                'ops_dep'       =>'1,1,,,',
                'ops_user'      =>',,1,,',
                'ops_log'       =>',,,,',
                'ops_promark'   =>',,,,'
                );
        }elseif($lvl == 'SPV'){
            $dataakses = array(
                'ops_home'      =>'1,,,,',
                'ops_event'     =>'1,1,1,1,',
                'ops_ktp'       =>'1,1,1,,',
                'ops_passport'  =>'1,1,1,,',
                'ops_pax'       =>'1,1,1,,',
                'ops_reg'       =>'1,1,,,',
                'ops_scan'      =>'1,1,,,',
                'ops_arr'       =>'1,1,,,',
                'ops_dep'       =>'1,1,,,',
                'ops_user'      =>'1,1,1,1,',
                'ops_log'       =>'1,,,,',
                'ops_promark'   =>',,,,'
                );
        }elseif($lvl == 'MGR'){
            $dataakses = array(
                'ops_home'      =>'1,,,,',
                'ops_event'     =>'1,,,,',
                'ops_ktp'       =>'1,,,,',
                'ops_passport'  =>'1,,,,',
                'ops_pax'       =>'1,,,,',
                'ops_reg'       =>'1,,,,',
                'ops_scan'      =>'1,,,,',
                'ops_arr'       =>'1,,,,',
                'ops_dep'       =>'1,,,,',
                'ops_user'      =>',,1,,',
                'ops_log'       =>',,,,',
                'ops_promark'   =>',,,,'
                );
        }else{
            $dataakses = array(
                'ops_home'      =>',,,,',
                'ops_event'     =>',,,,',
                'ops_ktp'       =>',,,,',
                'ops_passport'  =>',,,,',
                'ops_pax'       =>',,,,',
                'ops_reg'       =>',,,,',
                'ops_scan'      =>',,,,',
                'ops_arr'       =>',,,,',
                'ops_dep'       =>',,,,',
                'ops_user'      =>',,,,',
                'ops_log'       =>',,,,',
                'ops_promark'   =>',,,,'
                );
        }

        $this->db->where($this->fKd,$id);
        return $this->db->update($this->tb,$dataakses);
    }

    function OChange(){
        ob_start();
        $id = $this->input->post('inKD');

        $reg	    =array($this->input->post('regv',TRUE),$this->input->post('regd',TRUE),',',',');
        $event		=array($this->input->post('evtv',TRUE),$this->input->post('evta',TRUE),
                           $this->input->post('evte',TRUE),$this->input->post('evtd',TRUE));
        $pax	    =array($this->input->post('paxv',TRUE),$this->input->post('paxe',TRUE),
                           $this->input->post('paxr',TRUE),',');
        $ktp	    =array($this->input->post('ktpv',TRUE),$this->input->post('ktpe',TRUE),
                           $this->input->post('ktpr',TRUE),',');
        $pass	    =array($this->input->post('pasv',TRUE),$this->input->post('pase',TRUE),
                           $this->input->post('pasr',TRUE),',');
        $scan	    =array($this->input->post('scnv',TRUE),$this->input->post('scna',TRUE),
                           $this->input->post('scne',TRUE),$this->input->post('scnd',TRUE));
        $arr	    =array($this->input->post('arrv',TRUE),$this->input->post('arre',TRUE),',',',');
        $dep	    =array($this->input->post('depv',TRUE),$this->input->post('depe',TRUE),',',',');
        $user	    =array($this->input->post('usrv',TRUE),$this->input->post('usra',TRUE),
                           $this->input->post('usre',TRUE),$this->input->post('usrd',TRUE));
        $akses	    =array($this->input->post('akse',TRUE),',',',',',');
        $prom	    =array($this->input->post('prmv',TRUE),$this->input->post('prma',TRUE),
                           $this->input->post('prme',TRUE),$this->input->post('prmd',TRUE));
        $log	    =array($this->input->post('logv',TRUE),',',',',',');

        $dtarray = array(
            'ops_reg'       =>implode(",",$reg),
            'ops_event'     =>implode(",",$event),
            'ops_pax'       =>implode(",",$pax),
            'ops_ktp'       =>implode(",",$ktp),
            'ops_passport'  =>implode(",",$pass),
            'ops_scan'      =>implode(",",$scan),
            'ops_arr'       =>implode(",",$arr),
            'ops_dep'       =>implode(",",$dep),
            'ops_user'      =>implode(",",$user),
            'ops_akses'     =>implode(",",$akses),
            'ops_promark'   =>implode(",",$prom),
            'ops_log'       =>implode(",",$log)
            );

        $this->db->where('id_hakakses', $id);
        return $this->db->update($this->tb,$dtarray);
    }

    function ODrop(){
        $dtarray = array(
            'id_user'  => $this->input->get('inKD')
        );
        
        $this->db->where($dtarray);
        return $this->db->delete($this->tb);
    }

    }