<!DOCTYPE html>
<html>
<title><?php echo $dataquizz['Nom'][0] ?></title>

<head>
	<?php
	?>
</head>
	<br>
	<div class="alert alert-info" role="alert">
	<h1 class="h1 display-5 text-center"><?php echo $dataquizz['Nom'][0] ?></h1>
	</div>
	<br>
		


<div class="table-responsive">

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
			<th scope="col">Réponses des élèves</th>
			<th scope="col">Bonnes réponses</th>
			<th scope="col">Réussi ?</th>

		</tr>
		</thead>
		<tbody>
		<?php
		$moy=0;
		for ($i = 0; $i < sizeof($dataquizz['idQuestion']); $i++) {
			$scoretotal[$i]=0;
			$reponses1total=0;
			$reponses2total=0;
			$reponses3total=0;
			$reponses4total=0;
			$reponsestotal=0;

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
			echo $dataquizz['BonneReponse'][$i];
			echo "</th>";
			echo "<th scope=\"row\" class='bg-dark' >";
			echo "</th>";
			echo "</tr>";
			for ($y = 0; $y < sizeof($dataResultQuizz['id']); $y++) {
				echo "<tr>";
				if($dataquizz['idQuestion'][$i]==$dataResultQuizz['idQuestion'][$y]) {
					if(strlen($dataResultQuizz['reponseseleve'][$y])==1){
						if($dataResultQuizz['reponseseleve'][$y]==1){
							$reponses1total++;
							$reponsestotal++;

						}elseif($dataResultQuizz['reponseseleve'][$y]==2){
							$reponses2total++;
							$reponsestotal++;

						}elseif($dataResultQuizz['reponseseleve'][$y]==3){
							$reponses3total++;
							$reponsestotal++;

						}elseif($dataResultQuizz['reponseseleve'][$y]==4){
							$reponses4total++;
							$reponsestotal++;

						}
					}else{

						$datareponse[$y]=str_replace(',','',$dataResultQuizz['reponseseleve'][$y]);

						foreach($datareponse as $char) {

							for($z=0;$z<strlen($char);$z++){
								if($char[$z]==1){
									$reponses1total++;
									$reponsestotal++;
								}
								if($char[$z]==2){
									$reponses2total++;
									$reponsestotal++;
								}
								if($char[$z]==3){
									$reponses3total++;
									$reponsestotal++;
								}
								if($char[$z]==4){
									$reponses4total++;
									$reponsestotal++;
								}
							}

						}
					}
					echo "<th scope=\"row\">";
					echo $dataResultQuizz['nomeleve'][$y];
					echo "</th>";
					echo "<th scope=\"row\">";
					echo $dataResultQuizz['prenomeleve'][$y];
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
					echo $dataResultQuizz['reponseseleve'][$y];
					echo "</th>";

					echo "<th scope=\"row\">";
					echo $dataquizz['BonneReponse'][$i];
					echo "</th>";


					if (strcmp($dataResultQuizz['reponseseleve'][$y], $dataquizz['BonneReponse'][$i]) == 0) {
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


			$reponses1total=($reponses1total/$reponsestotal)*100;
			$reponses2total=($reponses2total/$reponsestotal)*100;
			$reponses3total=($reponses3total/$reponsestotal)*100;
			$reponses4total=($reponses4total/$reponsestotal)*100;
			echo "<th colspan='6'>";/* A travailler ici */
			echo"<div class=\"progress\"> 
			  <div class=\"progress-bar\" role=\"progressbar\" style=\"width: $reponses1total%\" aria-valuenow=\"$reponses1total\" aria-valuemin=\"0\" aria-valuemax=\"2\"> Réponse1: $reponses1total%</div>
			  <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $reponses2total%\" aria-valuenow=\"$reponses2total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse2: $reponses2total%</div>
			  <div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width: $reponses3total%\" aria-valuenow=\"$reponses3total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse3: $reponses3total%</div>
			  <div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width: $reponses4total% \" aria-valuenow=\"$reponses4total\" aria-valuemin=\"0\" aria-valuemax=\"100\">Réponse4: $reponses4total%</div>

			</div>";
			echo "</th>";
			echo "<th colspan='4'>";
			echo "<span>Moyenne sur cette question: $scorePercent[$i] %. </span>";
			echo "</th>";
			echo "<tr>";
			echo "<th colspan='10' class='bg-dark'>";
			echo "</th>";
			echo "</tr>";
			$moy+=$scorePercent[$i];

		}
		$moy=$moy/sizeof($scorePercent);
		$moy=number_format($moy,2);
		if ($moy >= 50) {
			echo "<tr>";
		echo "<th colspan= '10' class=\"text-right bg-success\">";
		echo "<span>Moyenne sur le quizz: $moy %. </span>";
		echo "</th>";
		echo "<tr>";
		echo "</tbody>";
		echo "</table>";
			
		}else{
			echo "<tr>";
		echo "<th colspan= '10' class=\"text-right bg-danger\">";
		echo "<span>Moyenne sur le quizz: $moy %. </span>";
		echo "</th>";
		echo "<tr>";
		echo "</tbody>";
		echo "</table>";
		}




		echo "<div class=\"container text-center\" style=\"width: 400px\">";

		echo anchor('MenuPrincipal/quizzHub', 'Retour à l\'accueil',array('class'=>'btn btn-lg btn-block btn-outline-primary','style'=>'width:100%'));
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

		//print_r($dataResultQuizz);
		?>

</div>
</body>
</html>
