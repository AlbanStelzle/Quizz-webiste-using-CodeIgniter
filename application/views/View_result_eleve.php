<!DOCTYPE html>
<html>
<title><?php echo $Nom[0] ?></title>

<head>
	<?php
	?>
</head>

<div class="table-responsive">
	<h1><?php echo $Nom[0] ?></h1>
	<table class="table table-hover table-bordered">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Question</th>
			<th scope="col">Vos réponses</th>
			<th scope="col">Bonnes réponses</th>
		</tr>
		</thead>
		<tbody>
		<?php


		for ($i = 0; $i < sizeof($Nom); $i++) {
			if (isset($dataquizz['question'][$i])) {

				echo "<tr>";

				echo "<th scope=\"row\">";
				echo $dataquizz['question'][$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $dataResultQuizz['réponseéleve'][$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $dataquizz['BonneRéponse'][$i];
				echo "</th>";



			}
			echo "</tr>";
		}


		echo "</tbody>";
		echo "</table>";
		echo anchor('MenuPrincipal/quizzHub', 'Retour à la liste de vos quizz');
		?>
</div>
</body>
</html>
