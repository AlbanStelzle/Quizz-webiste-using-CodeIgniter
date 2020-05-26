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
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
</head>

<div>
	<h1>Liste de vos quizz</h1>
	<table>
		<thead>
		<tr>
			<th>Question</th>

		</tr>
		</thead>
		<tbody>
		<?php


		if (isset($Nom)) {
			for ($i = 0; $i < sizeof($Nom); $i++) {
				echo "<tr>";
				echo "<th>";
				echo anchor('MenuPrincipal/modifyQuizz/' . $clé[$i], $Nom[$i]);
				echo "</th>";
				echo "<th>";
				echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
				echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz');
				echo form_close();
				echo "</th>";
				echo "</tr>";
			}
		}
		echo "
</tbody>
	</table>";
		echo form_open('MenuPrincipal/addQuizzByTitle/');
		echo form_input($data_quizz);
		echo form_submit('ButtonAddQuizz', 'Ajouter le quizz');

		echo form_close();

		?>

</div>


</body>
</html>
