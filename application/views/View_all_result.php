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
		$moy=0;
		for ($i = 0; $i < sizeof($dataquizz['idQuestion']); $i++) {
			$scoretotal[$i]=0;
			$réponses1total=0;
			$réponses2total=0;
			$réponses3total=0;
			$réponses4total=0;
			$réponsestotal=0;

			$nbTotalRep=0;
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
					if(strlen($dataResultQuizz['réponseséleve'][$y])==1){
						if($dataResultQuizz['réponseséleve'][$y]==1){
							$réponses1total++;
							$réponsestotal++;

						}elseif($dataResultQuizz['réponseséleve'][$y]==2){
							$réponses2total++;
							$réponsestotal++;

						}elseif($dataResultQuizz['réponseséleve'][$y]==3){
							$réponses3total++;
							$réponsestotal++;

						}elseif($dataResultQuizz['réponseséleve'][$y]==4){
							$réponses4total++;
							$réponsestotal++;

						}
					}else{

						$dataréponse[$y]=str_replace(',','',$dataResultQuizz['réponseséleve'][$y]);

						foreach($dataréponse as $char) {

							for($z=0;$z<strlen($char);$z++){
								if($char[$z]==1){
									$réponses1total++;
									$réponsestotal++;
								}
								if($char[$z]==2){
									$réponses2total++;
									$réponsestotal++;
								}
								if($char[$z]==3){
									$réponses3total++;
									$réponsestotal++;
								}
								if($char[$z]==4){
									$réponses4total++;
									$réponsestotal++;
								}
							}

						}
					}
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
						$scoretotal[$i]++;
						$RepColor = "bg-success";
						echo "<th scope=\"row \" class=\"$RepColor\">";
						echo "</th>";
					} else {
						$RepColor = "bg-danger";
						echo "<th scope=\"row \" class=\"$RepColor\">";
						echo "</th>";
					}

					echo "</tr>";
					$nbTotalRep++;

				}
			}
			$scorePercent[$i]= ($scoretotal[$i]/$nbTotalRep)*100;
			$scorePercent[$i]=number_format($scorePercent[$i],2);

			echo "<th>";
			echo "<span>Moyenne sur cette question: $scorePercent[$i] %. </span>";
			echo "</th>";

			$réponses1total=($réponses1total/$réponsestotal)*100;
			$réponses2total=($réponses2total/$réponsestotal)*100;
			$réponses3total=($réponses3total/$réponsestotal)*100;
			$réponses4total=($réponses4total/$réponsestotal)*100;
			echo "<th colspan='9'>";/* A travailler ici */
			echo"<div class=\"progress\"> 
			  <div class=\"progress-bar\" role=\"progressbar\" style=\"width: $réponses1total%\" aria-valuenow=\"$réponses1total\" aria-valuemin=\"0\" aria-valuemax=\"2\"> Réponse1: $réponses1total%</div>
			  <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $réponses2total%\" aria-valuenow=\"$réponses2total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse2: $réponses2total%</div>
			  <div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width: $réponses3total%\" aria-valuenow=\"$réponses3total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse3: $réponses3total%</div>
			  <div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width: $réponses4total% \" aria-valuenow=\"$réponses4total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse4: $réponses4total%</div>

			</div>";
			echo "</th>";
			$moy+=$scorePercent[$i];

		}
		$moy=$moy/sizeof($scorePercent);
		echo "<tr>";
		echo "<th>";
		echo "<span>Moyenne sur le quizz: $moy %. </span>";
		echo "</th>";
		echo "<tr>";
		echo "</tbody>";
		echo "</table>";


		echo anchor('MenuPrincipal/quizzHub', 'Retour à l\'accueil');
		//print_r($dataResultQuizz);
		?>

</div>
</body>
</html>
