<?php
$clé=$_POST['clé'] ?? "";

if(form_error('clé')==null){
	$validation_key= "is-valid";
}else{
	$validation_key ="is-invalid";
}
$data_clé = array(
	'type'  => 'text',
	'name'  => 'clé',
	'value'=>$clé,
	'placeholder' => 'Entrez la clé du quizz',
	'class' => "form-control $validation_key",
	'required' => 'required'
);

?>

<body class="text-center">
	<?php  echo form_open('Quizz/joinQuizz/',array('class'=>'form-signin'));
	echo"<h1 class=\" h3 mb-3 font-weight-normal\">Quizz</h1>";

	echo form_input($data_clé);
	echo form_error('clé','<div class="invalid-feedback">','</div>');

	echo "<br>";

	echo form_submit('launchQuizz','Lancer le quizz',array('class'=>'btn btn-lg btn-primary btn-block'));
	echo anchor('Accueil/','Retour à l\'accueil.');
	echo form_close();



?>
</body>
