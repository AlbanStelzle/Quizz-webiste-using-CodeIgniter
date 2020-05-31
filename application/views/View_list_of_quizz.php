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
			'class' => 'form-control',
		);
		if (!isset($_GET['numpage'])) {
		$numpage = 1;
		} else {
		$numpage = $_GET['numpage'];
		}
		$nbitem = 11;
		if ($numpage == 1) {
		$llim = 0;
		$rlim = $numpage * $nbitem;

		} else {

		$llim = ($numpage-1) * $nbitem;
		$rlim =  $numpage * $nbitem;
		}

		?>
		<script>
		$(document).ready(function(){
			$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
				localStorage.setItem('activeTab', $(e.target).attr('href'));
			});
			var activeTab = localStorage.getItem('activeTab');
			if(activeTab){
				$('#myTab a[href="' + activeTab + '"]').tab('show');
			}
		});
		</script>
		</head>
		<div class="w-auto">
		<h1 class="display-4">Liste de vos quizz</h1>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
		<a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">Tous vos quizz</a>
		</li>
		<li class="nav-item" role="presentation">
		<a class="nav-link active" id="actif-tab" data-toggle="tab" href="#actif" role="tab" aria-controls="actif" aria-selected="true">Quizz actif</a>
		</li>
		<li class="nav-item" role="presentation">
		<a class="nav-link" id="préparation-tab" data-toggle="tab" href="#préparation" role="tab" aria-controls="préparation" aria-selected="false">Quizz en préparation</a>
		</li>
		<li class="nav-item" role="presentation">
		<a class="nav-link" id="expiré-tab" data-toggle="tab" href="#expiré" role="tab" aria-controls="expiré" aria-selected="false">Quizz expiré</a>
		</li>

		</ul>

		<div class="tab-content " id="myTabContent">
		<div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col">Nom du quizz</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="3">Action</th>
					<th scope="col" >Statut</th>

				</tr>
				</thead>
				<tbody>
				<?php

				if (isset($Nom)) {

					$total=sizeof($Nom);

					if($rlim>$total){
						$rlim=$total;
					}
					for ($i = $llim; $i < $rlim; $i++) {
						echo "<tr>";
						echo "<th scope=\"row\">$Nom[$i] </th>";
						echo "<th scope=\"row\">";
						echo $clé[$i];
						echo form_close();
						echo "</th>";
						echo "<th scope=\"row\">";
						if(!($statut[$i]=='Expiré'||$statut[$i]=='Actif')) {
							echo form_open("./MenuPrincipal/modifyQuizz/" . $clé[$i]);
							echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz', array('class' => 'btn btn-warning'));
							echo form_close();
						}else{
							echo form_button('Useless','Modifier ce quizz',array('class'=>'btn btn-warning',
									'disabled'=>'disabled'));
						}

						echo "</th>";

						echo "<th scope=\"row\">";
						echo form_open("./MenuPrincipal/CopyQuizz/" . $clé[$i]);
						echo form_submit('CopyQuizz' . $clé[$i], 'Copier ce quizz', array('class' => 'btn btn-warning'));
						echo form_close();
						echo "</th>";

						echo "<th scope=\"row\">";
						echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
						echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz',array('class'=>'btn btn-danger'));
						echo form_close();
						echo "</th>";
						echo "<th scope=\"row\">$statut[$i]</th>";
						echo "</tr>";

					}
				}else{
					echo"<tr>
							<th colspan='5' class='text-center'>Vous n'avez aucun quizz de créer.</th>
						 </tr>";
				}

				$prev = $numpage - 1;
				$next = $numpage + 1;
				?>
				</tbody>
			</table>
		</div>
		<div class="nav justify-content-center">

			<nav aria-label="...">
			<ul class="pagination">
				<?php if($numpage==1){
					echo"<li class=\"page-item disabled\">
					<span class=\"page-link\">Précedent</span>
				</li>";
				}else{
					echo "<li class=\"page-item\">
							 <a class=\"page-link\" href=\"?numpage=$prev\">Précedent</a>
						</li>";
				}
				?>

			<?php
				$nbpages = ceil($total / $nbitem);

				for ($i = 1; $i <= $nbpages; $i++) {
				if ($i == $numpage) {
					echo "<li class=\"page-item active\" aria-current=\"page\">
						<span class=\"page-link\">
								$i
						 <span class=\"sr-only\">(current)</span>
							</span>
					</li>";
				} else {
					echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?numpage=$i\">$i</a></li>";
				}
			}
				?>
				<?php if($numpage==$nbpages){
					echo"<li class=\"page-item disabled\">
					<span class=\"page-link\">Suivant</span>
				</li>";
				}else{
					echo "<li class=\"page-item\">
							 <a class=\"page-link\" href=\"?numpage=$next\">Suivant</a>
						</li>";
				}
				?>
			</ul>
		</nav>

		</div>

		</div>
		<div class="tab-pane fade show active" id="actif" role="tabpanel" aria-labelledby="actif-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col">Nom du quizz</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="4">Action</th>

				</tr>
				</thead>
				<tbody>
				<?php

				if (isset($Nom) ) {

					for ($i = 0; $i < sizeof($Nom); $i++) {
						if (strcmp($statut[$i], 'Actif')===0) {
							echo "<tr>";
							echo "<th scope=\"row\">$Nom[$i] </th>";
							echo "<th scope=\"row\">";
							echo $clé[$i];
							echo form_close();
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/modifyQuizz/" . $clé[$i]);
							echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz', array('class'=>'btn btn-warning',
									'disabled'=>'disabled'));
							echo form_close();
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/CopyQuizz/" . $clé[$i]);
							echo form_submit('CopyQuizz' . $clé[$i], 'Copier ce quizz', array('class' => 'btn btn-warning'));
							echo form_close();
							echo "</th>";
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
							echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz', array('class' => 'btn btn-danger'));
							echo form_close();
							echo "</th>";

							echo "<th scope=\"row\">";
							echo form_open('MenuPrincipal/ExpiredQuizz/' . $clé[$i]);
							echo form_submit("DisableQuizz['$i']", 'Désactiver ce quizz', array('class' => 'btn btn-info'));
							echo form_close();
							echo "</th>";
							echo "</tr>";

						}
					}
				}else{
					echo"<tr>
							<th colspan='5' class='text-center'>Vous n'avez aucun quizz de créer.</th>
						 </tr>";
				}

				?>
				</tbody>
			</table>
		</div>

		</div>
		<div class="tab-pane fade" id="préparation" role="tabpanel" aria-labelledby="préparation-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col">Nom du quizz</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="4">Action</th>

				</tr>
				</thead>
				<tbody>
				<?php


				if (isset($Nom)) {
					for ($i = 0; $i < sizeof($Nom); $i++) {
						if (strcmp($statut[$i], 'En préparation') === 0) {

							echo "<tr>";
							echo "<th scope=\"row\">$Nom[$i] </th>";
							echo "<th scope=\"row\">";
							echo $clé[$i];
							echo form_close();
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/modifyQuizz/" . $clé[$i]);
							echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz', array('class' => 'btn btn-warning'));
							echo form_close();
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/CopyQuizz/" . $clé[$i]);
							echo form_submit('CopyQuizz' . $clé[$i], 'Copier ce quizz', array('class' => 'btn btn-warning'));
							echo form_close();
							echo "</th>";
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
							echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz', array('class' => 'btn btn-danger'));
							echo form_close();
							echo "</th>";

							echo "<th scope=\"row\">";
							echo form_open('MenuPrincipal/ActiveQuizz/'.$clé[$i]);
							echo form_submit("ActivateQuizz", 'Activer ce quizz', array('class' => 'btn btn-info'));
							echo form_close();
							echo "</th>";

							echo "</tr>";

						}
					}
				}else{
					echo"<tr>
							<th colspan='5' class='text-center'>Vous n'avez aucun quizz de créer.</th>
		
		
						 </tr>";
				}
				echo "<tr>";
				echo "<th>";
				echo form_open('MenuPrincipal/addQuizzByTitle/');
				echo form_input($data_quizz);
				echo form_error('QuizzName','<div class="alert alert-danger" role="alert">','</div>');
				echo "</th>";
				echo "<th scope=\"row\">";

				echo form_submit('ButtonAddQuizz', 'Ajouter le quizz',array('class'=>'btn btn-success'));

				echo form_close();
				echo "</th>";

				echo "</tr>";
				?>
				</tbody>
			</table>
		</div>

		</div>
		<div class="tab-pane fade" id="expiré" role="tabpanel" aria-labelledby="expiré-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col" >Nom du quizz</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="4">Action</th>

				</tr>
				</thead>
				<tbody>
				<?php


				if (isset($Nom)) {
					for ($i = 0; $i < sizeof($Nom); $i++) {
						if (strcmp($statut[$i], 'Expiré') === 0) {

							echo "<tr>";
							echo "<th scope=\"row\">$Nom[$i] </th>";
							echo "<th scope=\"row\">";
							echo $clé[$i];
							echo form_close();
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/modifyQuizz/" . $clé[$i]);
							echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz', array('class'=>'btn btn-warning',
									'disabled'=>'disabled'));
							echo form_close();
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/CopyQuizz/" . $clé[$i]);
							echo form_submit('CopyQuizz' . $clé[$i], 'Copier ce quizz', array('class' => 'btn btn-warning'));
							echo form_close();
							echo "</th>";
							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
							echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz', array('class' => 'btn btn-danger'));
							echo form_close();
							echo "</th>";

							echo "<th scope=\"row\">";
							echo form_open("" . $clé[$i]);
							echo form_submit("VoirRésultat['$i']", 'Voir les résultat', array('class' => 'btn btn-info'));
							echo form_close();
							echo "</th>";
							echo "</tr>";

						}
					}
				}else{
					echo"<tr>
							<th colspan='5' class='text-center'>Vous n'avez aucun quizz de créer.</th>
						 </tr>";
				}

				?>
				</tbody>
			</table>
		</div>
		</div>
		</div>
		<div class="text-center">
		<?php

		echo anchor('MenuPrincipal/','Retour au menu principal',array('class'=>'btn btn-outline-danger'));

		?>

		</div>
		</div>

		</body>
		</html>
