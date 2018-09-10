ini home<br/>

<?php echo $this->session->userdata('login-pond')?><br/>
<?php echo $this->session->userdata('kduser-pond')?><br/>
<?php echo $this->session->userdata('username-pond')?><br/>
<?php echo $this->session->userdata('depart-pond')?><br/>
<?php echo $this->session->userdata('cabang-pond')?><br/>
<a href="<?php echo site_url('Auth/Logout')?>">Ini Logout</a>