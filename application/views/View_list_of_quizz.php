<!DOCTYPE html>
<html>
<title>Mes quizz !</title>
<head>
	<?php
	$this->load->helper('url');
	$this->load->library('form_validation');
	$data_quizz = array(
			'type' => 'text',
			'name' => 'QuizzName',
			'id' => 'QuizzName',
			'placeholder' => 'Nom du quizz',
			'class' => 'input',
	);
	?>
</head>

	<h1 class="display-4">Liste de vos quizz</h1>
<div class="table-responsive">

<table class="table table-hover table-bordered">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Question</th>
			<th scope="col">Clé</th>
			<th scope="col" colspan="2">Action</th>

		</tr>
		</thead>
		<tbody>
		<?php


		if (isset($Nom)) {
			for ($i = 0; $i < sizeof($Nom); $i++) {
				echo "<tr>";
				echo "<th scope=\"row\">$Nom[$i] </th>";
				echo "<th scope=\"row\">";
				echo $clé[$i];
				echo form_close();
				echo "</th>";
				echo "<th scope=\"row\">";
				echo form_open("./MenuPrincipal/modifyQuizz/" . $clé[$i]);
				echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz');
				echo form_close();

				echo "</th>";
				echo "<th scope=\"row\">";
				echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
				echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz');
				echo form_close();
				echo "</th>";

				echo "</tr>";

			}
		}
		echo "<tr>";
		echo "<th>";
		echo form_open('MenuPrincipal/addQuizzByTitle/');
		echo form_input($data_quizz);
		echo "</th>";
		echo "<th scope=\"row\">";

		echo form_submit('ButtonAddQuizz', 'Ajouter le quizz');

		echo form_close();
		echo "</th>";

		echo "</tr>";

		echo "
</tbody>
	</table>";
		echo"</div>";

		echo anchor('MenuPrincipal/','Retour au menu principal');

		?>



</body>
</html>
