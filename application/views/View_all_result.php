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
			<th scope="col">Nom élève</th>
			<th scope="col">Prénom élève</th>
			<th scope="col">Question</th>
			<th scope="col">Réponse1</th>
			<th scope="col">Réponse2</th>
			<th scope="col">Réponse3</th>
			<th scope="col">Réponse4</th>
			<th scope="col">Vos réponses</th>
			<th scope="col">Bonnes réponses</th>
			<th scope="col">Réussi ?</th>

		</tr>
		</thead>
		<tbody>
		<?php

		$scoretotal=0;
		for ($i = 0; $i < sizeof($dataquizz['idQuestion']); $i++) {

			echo "<tr>";
			echo "<th scope=\"row\" class='bg-dark' style='border-left: 0; border-right: 0;'>";
			echo "</th>";

			echo "<th scope=\"row\" class='bg-dark' style='border-left: 0'>";
			echo "</th>";


			echo "<th scope=\"row\">";
			echo $dataquizz['question'][$i];
			echo "</th>";

			echo "<th scope=\"row\">";
			echo $dataquizz['reponse1'][$i];
			echo "</th>";

			echo "<th scope=\"row\">";
			echo $dataquizz['reponse2'][$i];
			echo "</th>";

			echo "<th scope=\"row\">";
			echo $dataquizz['reponse3'][$i];
			echo "</th>";

			echo "<th scope=\"row\">";
			echo $dataquizz['reponse4'][$i];
			echo "</th>";

			echo "<th scope=\"row\" class='bg-dark' >";
			echo "</th>";

			echo "<th scope=\"row\">";
			echo $dataquizz['BonneRéponse'][$i];
			echo "</th>";
			echo "<th scope=\"row\" class='bg-dark' >";
			echo "</th>";
			echo "</tr>";
			for ($y = 0; $y < sizeof($dataResultQuizz['id']); $y++) {
				echo "<tr>";
				if($dataquizz['idQuestion'][$i]==$dataResultQuizz['idQuestion'][$y]) {
					echo "<th scope=\"row\">";
					echo $dataResultQuizz['noméleve'][$y];
					echo "</th>";
					echo "<th scope=\"row\">";
					echo $dataResultQuizz['prenoméleve'][$y];
					echo "</th>";
					echo "<th scope=\"row\">";
					echo "</th>";

					echo "<th scope=\"row\" >";
					echo "</th>";
					echo "<th scope=\"row\">";
					echo "</th>";

					echo "<th scope=\"row\">";
					echo "</th>";
					echo "<th scope=\"row\">";
					echo "</th>";

					echo "<th scope=\"row\">";
					echo $dataResultQuizz['réponseséleve'][$y];
					echo "</th>";

					echo "<th scope=\"row\">";
					echo $dataquizz['BonneRéponse'][$i];
					echo "</th>";


					if (strcmp($dataResultQuizz['réponseséleve'][$y], $dataquizz['BonneRéponse'][$i]) == 0) {
						$scoretotal++;
						$RepColor = "bg-success";
						echo "<th scope=\"row \" class=\"$RepColor\">";
						echo "</th>";
					} else {
						$RepColor = "bg-danger";
						echo "<th scope=\"row \" class=\"$RepColor\">";
						echo "</th>";
					}

					echo "</tr>";
				}
			}
			$nbTotalQuest= sizeof($dataResultQuizz['idQuestion']);
			$scorePercent= ($scoretotal/$nbTotalQuest)*100;
			$scorePercent=number_format($scorePercent,2);
			echo "<th>";
			echo "<span class=\"border\">Moyenne sur cette question: $scorePercent %. </span>";
			echo "</th>";
			$scoretotal=0;
		}

		echo "</tbody>";
		echo "</table>";

		echo anchor('MenuPrincipal/quizzHub', 'Retour à l\'accueil');
		print_r($dataResultQuizz);
		?>

</div>
</body>
</html>
