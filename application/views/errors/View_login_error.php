
<?php

$mail=$_POST['Email'] ?? "";
if(form_error('Email')==null){
	$validation_mail= "is-valid";
}else{
	$validation_mail ="is-invalid";
}
$data_email = array(
		'type'  => 'Email',
		'name'  => 'Email',
		'id'    => 'inputEmail',
		'placeholder' => 'Email',
		'value'=> $mail,
		'class' => "form-control $validation_mail",
);
$data_pwd = array(
		'type'  => 'password',
		'name'  => 'Pwd',
		'id'    => 'inputPassword',
		'placeholder' => 'Mot de passe',
		'class' => 'form-control is-invalid',
);
?>
<body class="text-center">

	<?php  echo form_open('',array('class'=>'form-signin'));

	echo"<h1 class=\" h3 mb-3 font-weight-normal\">Connexion</h1>";
	 echo form_input($data_email);
	echo form_error('Email','<div class="invalid-feedback">','</div>');

	echo "<br>";

	 echo form_input($data_pwd);
	 echo form_error('Pwd','<div class="invalid-feedback">','</div>');

	echo form_submit('connect','Se connecter',array('class'=>' btn-lg btn-outline-primary btn-block','style'=>'width:100%'));
		echo "<br>";

	echo anchor('Accueil/register','S\'enregistrer',array('class'=>"btn btn-outline-success",'style'=>'width:100%'));
	echo anchor('Accueil/','Retour à l\'accueil.');


	echo form_close();

	?>




</body>

