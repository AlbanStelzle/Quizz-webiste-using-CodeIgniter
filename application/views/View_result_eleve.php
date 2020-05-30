<!DOCTYPE html>
<html>
<title><?php echo $dataquizz['Nom'][0] ?></title>

<head>
	<?php
	?>
</head>

<div class="table-responsive">
	<h1><?php echo $dataquizz['Nom'][0] ?></h1>
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

$scoretotal=0;
		for ($i = 0; $i < sizeof($dataResultQuizz['idQuestion']); $i++) {

				echo "<tr>";

				echo "<th scope=\"row\">";
				echo $dataquizz['question'][$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $dataResultQuizz['réponseséleve'][$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $dataquizz['BonneRéponse'][$i];
				echo "</th>";

				if(strcmp($dataResultQuizz['réponseséleve'][$i],$dataquizz['BonneRéponse'][$i])==0){
					$scoretotal++;
				}

			echo "</tr>";
		}

		echo "</tbody>";
		echo "</table>";
		echo $scoretotal;

		echo anchor('MenuPrincipal/quizzHub', 'Retour à la liste de vos quizz');
		?>
</div>
</body>
</html>
