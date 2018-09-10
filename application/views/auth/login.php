<!DOCTYPE html>
<html>
<head>
	<title>Pondasi Login</title>
</head>
<body>
	<h1>Membuat Form Validation dengan CodeIgniter</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Auth/chekLogin'); ?>
		<label>Username</label><br/>
		<input type="text" name="username"><br/>
		<label>Password</label><br/>
		<input type="text" name="password"><br/>
		<input type="submit" value="Simpan">
	</form>
</body>
</html>