<!DOCTYPE html>
<html>
<title><?php echo $Nom ?></title>
<style>
	input{
		width:60px;
	}
</style>
<head>
	<?php
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library("form_validation");
	$data_question = array(
			'type'  => 'text',
			'name'  => 'question',
			'id'    => 'question',
			'placeholder' => 'Question',
			'class' => 'input',
			'required' => 'required'
	);
	$data_reponse1 = array(
			'type'  => 'text',
			'name'  => 'reponse1',
			'id'    => 'reponse1',
			'placeholder' => 'reponse1',
			'class' => 'input',
			'required' => 'required'
	);
	$data_reponse2 = array(
			'type'  => 'text',
			'name'  => 'reponse2',
			'id'    => 'reponse2',
			'placeholder' => 'reponse2',
			'class' => 'input',
			'required' => 'required'
	);
	$data_reponse3 = array(
			'type'  => 'text',
			'name'  => 'reponse3',
			'id'    => 'reponse3',
			'placeholder' => 'reponse3',
			'class' => 'input',
	);
	$data_reponse4 = array(
			'type'  => 'text',
			'name'  => 'reponse4',
			'id'    => 'reponse4',
			'placeholder' => 'reponse4',
			'class' => 'input',
	);
	$data_image = array(
			'type'  => 'text',
			'name'  => 'image',
			'id'    => 'image',
			'placeholder' => 'url d\'une image',
			'class' => 'input',
	);
	?>
</head>

<div>
	<h1><?php echo $Nom[0] ?></h1>
	<table>
		<thead>
		<tr>
			<th>Question</th>
			<th>reponse 1</th>
			<th>reponse 2</th>
			<th>reponse 3</th>
			<th>reponse 4</th>
			<th>image</th>

		</tr>
		</thead>
		<tbody>
		<div>
		<?php


		for ($i = 0; $i < sizeof($Nom); $i++) {
			echo "<tr>";

			echo "<th>";
			echo $question[$i];
			echo "</th>";

			echo "<th>";
			echo $reponse1[$i];
			echo "</th>";

			echo "<th>";
			echo $reponse2[$i];
			echo "</th>";
			echo "<th>";
			echo $reponse3[$i];
			echo "</th>";
			echo "<th>";
			echo $reponse4[$i];
			echo "</th>";

			echo "<th>";
			echo $image[$i];
			echo "</th>";
			echo "</tr>";
				}
				echo "</tbody>";
	echo "</table>";

		echo "</div>";
		echo form_open();
		echo form_input($data_question);
		echo form_input($data_reponse1);
		echo form_input($data_reponse2);
		echo form_input($data_reponse3);
		echo form_input($data_reponse4);
		echo form_input($data_image);


		echo form_submit('add','Ajouter');
		echo form_close();




		?>




</div>


</body>
</html>
