<!DOCTYPE html>
<html>
<title>Se connecter</title>
<head>

</head>
<?php
$this->load->helper('form');
$this->load->helper('url');
$this->load->library("form_validation");
$data_login = array(
		'type'  => 'Email',
		'name'  => 'Email',
		'id'    => 'Email',
		'placeholder' => 'Email',
		'class' => 'input',
		'required' => 'required'
);
$data_pwd = array(
		'type'  => 'password',
		'name'  => 'Pwd',
		'id'    => 'Pwd',
		'placeholder' => 'Mot de passe',
		'class' => 'input',
		'required' => 'required'
);
?>
<div>
	<h1>Connexion</h1>
	<?php  echo form_open();

	 echo form_input($data_login);
	 echo form_error('name');
	echo "<br/>";

	 echo form_input($data_pwd);
	 echo form_error('pwd');
	echo "<br/>";
	echo form_submit('Login','Se connecter');
	echo form_close();
	echo validation_errors();

	?>


</div>


</body>
</html>
