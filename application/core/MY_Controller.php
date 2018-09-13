<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
  public function cekAuth()
  {
    $myAuth = $this->session->userdata('login-pond');
    $hasil  = '';
    if (($myAuth == 'LoginKu') or ($myAuth == 'RootKu')) {
        $hasil = 'Y';
    }else{
        $hasil = 'X';
    }

        if($hasil != 'Y'){
            $this->session->unset_userdata(array(
                'login-pond',
                'kduser-pond',
                'username-pond',
                'depart-pond',
                'cabang-pond'
             ));
            return redirect('Auth');
        }

  }

  public function cekAkses($field,$val){
    $myAuth = $this->session->userdata('login-pond');
    $hasil  ='';

    if($myAuth == 'RootKu'){
        $hasil = 'Y';
    }elseif($this->UserModel->akses($field,$val) == '1'){
        $hasil ='Y';
    }else{
        $hasil = 'X';
    }
        if($hasil != 'Y'){
            return redirect($_SERVER['HTTP_REQUEST']);
        }
  }

  public function menu(){
      return $inidata = "'SATU' => 'MENU SATU','DUA' => 'MENU DUA','DUA' => 'MENU DUA'";
  }
  public function cobaTampilkan(){
      $tampil = 'tampolkan ini';
    
      return $tampil;
    }
  
}