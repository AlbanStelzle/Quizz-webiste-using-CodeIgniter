
<title>Se connecter</title>

<?php
$this->load->helper('form');
$this->load->helper('url');
$this->load->library("form_validation");
$data_login = array(
	'type'  => 'text',
	'name'  => 'Login',
	'id'    => 'Login',
	'placeholder' => 'Nom',
	'class' => 'form-control',
);
$data_email = array(
	'type'  => 'Email',
	'name'  => 'Email',
	'id'    => 'Email',
	'placeholder' => 'Email',
	'class' => 'form-control',
);
$data_pwd = array(
	'type'  => 'password',
	'name'  => 'Pwd',
	'id'    => 'Pwd',
	'placeholder' => 'Mot de passe',
	'class' => 'form-control',
);
?>
<body class="text-center">
<?php
echo form_open('',array('class'=>'form-signin'));
	echo "<h1 class=\" h3 mb-3 font-weight-normal\">S'enregistrer</h1>";

echo form_input($data_login);
echo form_error('Login','<div class="alert alert-danger" role="alert">','</div>');
echo "<br>";
echo form_input($data_email);
echo form_error('Email','<div class="alert alert-danger" role="alert">','</div>');

echo "<br>";

echo form_input($data_pwd);
echo form_error('Pwd','<div class="alert alert-danger" role="alert">','</div>');


echo "<br>";
echo form_submit('Register','S\'enregistrer',array('class'=>'btn btn-lg btn-primary btn-block'));

echo anchor('Accueil/login','Se connecter',array('class'=>"h3 mb-3 font-weight-normal",'style'=>'font-size:1em;'));
echo form_close();
	?>




</body>
</html>
