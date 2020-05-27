<?php
$data_clé = array(
	'type'  => 'text',
	'name'  => 'clé',
	'placeholder' => 'Entrez la clé du quizz',
	'class' => 'form-control',
	'required' => 'required'
);
?>

<body class="text-center">
	<?php  echo form_open('Quizz/joinQuizz',array('class'=>'form-signin'));
	echo"<h1 class=\" h3 mb-3 font-weight-normal\">Quizz</h1>";

	echo form_input($data_clé);
	echo "<br>";

	echo form_submit('launchQuizz','Lancer le quizz',array('class'=>'btn btn-lg btn-primary btn-block'));
	echo form_close();



?>
</body>
