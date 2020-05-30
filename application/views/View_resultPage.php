<?php
if(form_error('clédurésultat')==null){
	$validation_key= "";
}else{
	$validation_key= "is-invalid";

}
$data_clé = array(
	'type'  => 'text',
	'name'  => 'clédurésultat',
	'placeholder' => 'Clé du quizz élève',
	'class' => "form-control $validation_key",
);

?>

<body>
<div class="container ">
	<h1 class="text-center display-1" style="font-size: 3.6rem">Voir ses résultats</h1>

	<div class='row '>
		<div class='mx-auto ' >

<?php
	echo form_open('',array('class'=>'form-signin'));
	echo form_input($data_clé);
	echo form_error('clédurésultat','<div class="invalid-feedback">','</div>');
	echo "<br>";
	echo form_submit('SendDataEleve','Accéder aux résultats',array('class'=>'btn btn-lg btn-primary btn-block'));
	echo form_close();
?>
		</div>
</div>
</div>
</body>
