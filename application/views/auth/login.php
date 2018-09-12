<!DOCTYPE html>
<html>
<head>
	<title>Pondasi Login</title>
</head>
<body>
	<h1>CI Pondasi Login</h1>
	<?php if (validation_errors() || $this->session->flashdata('loginGagal')) { ?>
	<?php echo validation_errors(); ?>
	<?php echo $this->session->flashdata('loginGagal'); ?>
	<?php } ?>

	<?php echo form_open('Auth/chekLogin'); ?>
		<label>Username</label><br/>
		<input type="text" name="username"><br/>
		<label>Password</label><br/>
		<input type="text" name="password"><br/>
		<input type="submit" value="Login">
	</form>
</body>
</html>