<?php
if(form_error('cleduresultat')==null){
	$validation_key= "";
}else{
	$validation_key= "is-invalid";

}
$data_cle = array(
	'type'  => 'text',
	'name'  => 'cleduresultat',
	'placeholder' => 'Clé du quizz élève',
	'class' => "form-control $validation_key",
);

?>

<body class="text-center">
<div class="container ">
	<h1 class="text-center display-1" style="font-size: 3.6rem">Voir ses résultats</h1>

	<div class='row '>
		<div class='mx-auto ' >

<?php
	echo form_open('',array('class'=>'form-signin'));
	echo form_input($data_cle);
	echo form_error('cleduresultat','<div class="invalid-feedback">','</div>');
	echo "<br>";
	echo form_submit('SendDataEleve','Accéder aux résultats',array('class'=>'btn btn-lg btn-primary btn-block'));
	echo form_close();
	echo anchor('Accueil/join','Retour');

?>

		</div>
</div>
</div>
</body>
