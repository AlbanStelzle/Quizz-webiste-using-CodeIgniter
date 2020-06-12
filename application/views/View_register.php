
<title>S'enregistrer</title>

<?php

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
	'placeholder' => 'Email',
	'class' => 'form-control ',
);
$data_pwd = array(
	'type'  => 'password',
	'name'  => 'Pwd',
	'id'    => 'Pwd',
	'placeholder' => 'Mot de passe',
	'class' => 'form-control',
);
$data_pwdv = array(
		'type'  => 'password',
		'name'  => 'Pwdv',
		'id'    => 'Pwd',
		'placeholder' => 'Confirmer votre mot de passe',
		'class' => 'form-control',
);
?>
<body class="text-center">
<?php
echo form_open('',array('class'=>'form-signin'));
	echo "<h1 class=\" h3 mb-3 font-weight-normal\">S'enregistrer</h1>";

echo form_input($data_login);
echo "<br>";
echo form_input($data_email);
echo "<br>";

echo form_input($data_pwd);
echo form_input($data_pwdv);

echo "<br>";
echo form_button('popupvalidation','S\'enregistrer',array('class'=>'btn btn-lg btn-primary btn-block',
																'data-toggle'=>'modal',
																'data-target'=>'#popup'));

//-- Modal --
echo "<div class=\"modal fade\" id=\"popup\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
	<div class=\"modal-dialog\">
		<div class=\"modal-content\">
			<div class=\"modal-header\">
				<h5 class=\"modal-title\" id=\"staticBackdropLabel\">Confirmation</h5>
				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
					<span aria-hidden=\"true\">&times;</span>
				</button>
			</div>
			<div class=\"modal-body\">
				Cliquez sur Valider pour recevoir un mail pour valider votre inscription.
				Ou alors appuyez sur Modifier pour modifier vos informations.
			</div>
			<div class=\"modal-footer\">
				<button type=\"button\" class=\"btn btn-secondary\">Modifier</button>";
				 echo form_submit('Register','Valider',array('class'=>'btn btn-primary',
						));
			echo"</div>
		</div>
	</div>
</div>";

echo anchor('Accueil/login','Se connecter',array('class'=>"h3 mb-3 font-weight-normal",'style'=>'font-size:1em;'));
echo form_close();
	?>



</body>
</html>
