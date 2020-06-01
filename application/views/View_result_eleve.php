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
				<th scope="col">Réponse1</th>
				<th scope="col">Réponse2</th>
				<th scope="col">Réponse3</th>
				<th scope="col">Réponse4</th>
				<th scope="col">Vos réponses</th>
				<th scope="col">Bonnes réponses</th>
				<th scope="col" style="width:90px">Réussi ?</th>

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

				echo "<th scope=\"row\">";
				echo $dataResultQuizz['réponseséleve'][$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $dataquizz['BonneRéponse'][$i];
				echo "</th>";

				if(strcmp($dataResultQuizz['réponseséleve'][$i],$dataquizz['BonneRéponse'][$i])==0){
					$scoretotal++;
					$RepColor="bg-success";
					echo "<th scope=\"row \" class=\"$RepColor\">";
					echo "</th>";
				}else{
					$RepColor="bg-danger";
					echo "<th scope=\"row \" class=\"$RepColor\">";
					echo "</th>";
				}

			echo "</tr>";
		}
			$nbTotalQuest= sizeof($dataResultQuizz['idQuestion']);
			$scorePercent= ($scoretotal/$nbTotalQuest)*100;
			echo "<th>";
		echo "<span class=\"border\">Votre résultat: $scorePercent %. </span>";
			echo "</th>";

		echo "</tbody>";
		echo "</table>";

		echo anchor('MenuPrincipal/quizzHub', 'Retour à l\'accueil');
		?>

</div>
</body>
</html>
