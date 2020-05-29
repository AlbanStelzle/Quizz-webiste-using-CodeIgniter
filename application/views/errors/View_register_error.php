
<title>S'enregistrer</title>

<?php
$name=$_POST['Login'] ?? "";
$mail=$_POST['Email'] ?? "";
if(form_error('Login')==null){
	$validation_name= "is-valid";
}else{
	$validation_name ="is-invalid";
}
if(form_error('Email')==null){
	$validation_mail= "is-valid";
}else{
	$validation_mail ="is-invalid";
}
$data_login = array(
	'type'  => 'text',
	'name'  => 'Login',
	'id'    => 'Login',
	'placeholder' => 'Nom',
	'value'=> $name,
	'class' => "form-control $validation_name",
);
$data_email = array(
	'type'  => 'Email',
	'name'  => 'Email',
	'id'    => 'validationServer03',
	'placeholder' => 'Email',
	'value'=> $mail,
	'class' => "form-control $validation_mail",
);
$data_pwd = array(
	'type'  => 'password',
	'name'  => 'Pwd',
	'id'    => 'Pwd',
	'placeholder' => 'Mot de passe',
	'class' => 'form-control is-invalid',
);
?>
<body class="text-center">
<?php
echo form_open('',array('class'=>'form-signin'));
	echo "<h1 class=\" h3 mb-3 font-weight-normal\">S'enregistrer</h1>";

echo form_input($data_login);
echo form_error('Login','<div class="invalid-feedback">','</div>');
echo "<br>";
echo form_input($data_email);

echo form_error('Email','<div class="invalid-feedback">','</div>');

echo "<br>";

echo form_input($data_pwd);
echo form_error('Pwd','<div class="invalid-feedback">','</div>');
if(form_error('Pwd')==null){
	echo"<div class=\"invalid-feedback\"> Veuillez retaper votre mot depasse. </div>";
}

echo "<br>";
echo form_submit('Register','S\'enregistrer',array('class'=>'btn btn-lg btn-primary btn-block'));

echo anchor('Accueil/login','Se connecter',array('class'=>"h3 mb-3 font-weight-normal",'style'=>'font-size:1em;'));
echo form_close();
	?>




</body>
</html>
