
<?php

$mail=$_POST['Email'] ?? "";
$this->load->helper('form');
$this->load->helper('url');
$this->load->library("form_validation");
$data_email = array(
		'type'  => 'Email',
		'name'  => 'Email',
		'id'    => 'inputEmail',
		'value' => $mail,
		'placeholder' => 'Email',
		'class' => 'form-control',
		'required' => 'required'
);
$data_pwd = array(
		'type'  => 'password',
		'name'  => 'Pwd',
		'id'    => 'inputPassword',
		'placeholder' => 'Mot de passe',
		'class' => 'form-control',
		'required' => 'required'
);
?>
<body class="text-center">

	<?php  echo form_open('',array('class'=>'form-signin'));
	echo"<h1 class=\" h3 mb-3 font-weight-normal\">Connexion</h1>";
	 echo form_input($data_email);
	 echo form_error('Email');
	echo "<br>";

	 echo form_input($data_pwd);
	 echo form_error('Pwd');
	echo "<br>";
	echo form_submit('connect','Se connecter',array('class'=>'btn btn-lg btn-primary btn-block'));
	echo anchor('Accueil/register','S\'enregistrer',array('class'=>"h3 mb-3 font-weight-normal",'style'=>'font-size:1em;'));
	echo "<br>";
	echo anchor('Accueil/join','Lancer un quizz',array('class'=>"h3 mb-3 font-weight-normal",'style'=>'font-size:1em;'));

	echo form_close();
	echo validation_errors();

	?>




</body>

