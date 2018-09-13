<!DOCTYPE html>
<html>
<head>
	<title>Pondasi Login</title>
</head>
<body>
	<h1>CI Tambah Data</h1>
	<?php if (validation_errors() || $this->session->flashdata('loginGagal')) { ?>
	<?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata('loginGagal'); ?>
	<?php } ?>

	<?php echo form_open('{addup}'); ?>
		<label>Username</label><br/>
		<input type="text" name="username"><br/>
		<label>Nama Lengkap</label><br/>
		<input type="text" name="nama_lengkap"><br/>
        <label>Atasan</label><br/>
		<input type="text" name="kd_atasan"><br/>
        <label>Departemen</label><br/>
		<input type="text" name="kd_departemen"><br/>
        <label>Cabang</label><br/>
		<input type="text" name="kd_cabang"><br/>
        <label>Level</label><br/>
		<input type="text" name="level_user"><br/>
		<input type="submit" value="tambah">
	</form>
</body>
</html>