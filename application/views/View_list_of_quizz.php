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
	?>
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
					<th scope="col">Question</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="2">Action</th>
					<th scope="col" >Statut</th>

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
						echo form_submit('ModifyQuizz' . $clé[$i], 'Modifier ce quizz',array('class'=>'btn btn-warning'));
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

	<div class="tab-pane fade show active" id="actif" role="tabpanel" aria-labelledby="actif-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col">Question</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="3">Action</th>

				</tr>
				</thead>
				<tbody>
				<?php

				if (isset($Nom) ) {
					for ($i = 0; $i < sizeof($Nom); $i++) {
						if (strcmp($statut[$i], 'Actif')===0) {
							echo $statut[$i];
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

							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
							echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz', array('class' => 'btn btn-danger'));
							echo form_close();
							echo "</th>";

							echo "<th scope=\"row\">";
							echo form_open('' . $clé[$i]);
							echo form_submit("DisableQuizz['$i']", 'Désactiver ce quizz', array('class' => 'btn btn-info'));
							echo form_close();
							echo "</th>";
							echo "</tr>";

						}
					}
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
	<div class="tab-pane fade" id="préparation" role="tabpanel" aria-labelledby="préparation-tab">
		<div class="table-responsive">

			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
				<tr>
					<th scope="col">Question</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="3">Action</th>

				</tr>
				</thead>
				<tbody>
				<?php


				if (isset($Nom)) {
					for ($i = 0; $i < sizeof($Nom); $i++) {
						echo $statut[$i];
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

							echo "</th>";
							echo "<th scope=\"row\">";
							echo form_open("./MenuPrincipal/deleteQuizzByKey/" . $clé[$i]);
							echo form_submit("DelQuizz['$i']", 'Supprimer ce quizz', array('class' => 'btn btn-danger'));
							echo form_close();
							echo "</th>";

							echo "<th scope=\"row\">";
							echo form_open('MenuPrincipal/ActiveQuizz/' . $clé[$i]);
							echo form_submit("ActivateQuizz['$i']", 'Activer ce quizz', array('class' => 'btn btn-info'));
							echo form_close();
							echo "</th>";

							echo "</tr>";

						}
					}
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
					<th scope="col">Question</th>
					<th scope="col">Clé</th>
					<th scope="col" colspan="3">Action</th>

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
</div>

<?php

		echo anchor('MenuPrincipal/','Retour au menu principal',array('class'=>'btn btn-primary'));

		?>
	</div>

</body>
</html>
