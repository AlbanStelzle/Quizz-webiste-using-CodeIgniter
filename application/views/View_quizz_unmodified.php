<!DOCTYPE html>
<html>
<title><?php echo $Nom[0] ?></title>

<head>
	<?php

	?>
</head>

<div class="table-responsive">
	<div class="alert alert-info my-0" role="alert">
	<h1 class="h1 display-5 text-center "><?php echo $Nom[0]?></h1>
	</div>

	<table class="table table-hover table-bordered">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Question</th>
			<th scope="col">reponse 1</th>
			<th scope="col">reponse 2</th>
			<th scope="col">reponse 3</th>
			<th scope="col">reponse 4</th>
			<th scope="col">image</th>
			<th scope="col">Bonne réponse</th>

		</tr>
		</thead>
		<tbody>
		<?php


		for ($i = 0; $i < sizeof($Nom); $i++) {
			if (isset($question[$i])) {

				echo "<tr>";

				echo "<th scope=\"row\">";
				echo $question[$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $reponse1[$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				echo $reponse2[$i];
				echo "</th>";
				echo "<th scope=\"row\">";
				echo $reponse3[$i];
				echo "</th>";
				echo "<th scope=\"row\">";
				echo $reponse4[$i];
				echo "</th>";

				echo "<th scope=\"row\">";
				if ($image[$i] != null) {
					echo "<img src=\"$image[$i]\" class=\"rounded mx-auto d-block\" style='width:100px'>";

				}
				echo "</th>";
				echo "<th scope=\"row\">";
				echo $BonneReponse[$i];
				echo "</th>";

			}
			echo "</tr>";
		}

		echo "</div>";

		echo "</tbody>";
		echo "</table>";
		echo "<div class=\"text-center\">";
		if($temps[0]==0){
			echo "<p> Ce quizz n'a pas de temps imparti.</p>";

		}else {
			echo "<p> Temps actuel pour ce quizz : $temps[0] min.</p>";
		}
		echo "<br>";
		echo anchor('MenuPrincipal/quizzHub','Retour à la liste des quizz',array('class'=>'btn btn-outline-danger mb-4'));
		echo "</div>";
		?>
</div>
</body>
</html>
