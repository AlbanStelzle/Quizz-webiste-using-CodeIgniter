<!DOCTYPE html>
<html>
<title>Se connecter</title>
<head>

</head>
<body>
<?php

$mail=$_POST['Email'] ?? "";
$this->load->helper('form');
$this->load->helper('url');
$this->load->library("form_validation");
$data_email = array(
		'type'  => 'Email',
		'name'  => 'Email',
		'id'    => 'Email',
		'value' => $mail,
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

	 echo form_input($data_email);
	 echo form_error('Email');
	echo "<br/>";

	 echo form_input($data_pwd);
	 echo form_error('Pwd');
	echo "<br/>";
	echo form_submit('connect','Se connecter');
	echo form_close();
	echo validation_errors();
	echo anchor('Accueil/register','S\'enregistrer');

	?>


</div>


</body>
</html>
