<!DOCTYPE html>
<html>
<title><?php echo $Nom[0] ?></title>

<head>
	<?php
	$this->load->helper('form');
	$this->load->helper('url');
	$data_question = array(
			'type' => 'text',
			'name' => 'question',
			'placeholder' => 'Question',
			'class' => 'form-control',
			'value'=> $_POST['question'] ?? ""
	);
	$data_nm_reponse = array(
			'type' => 'text',
			'name' => 'BonneReponse',
			'placeholder' => 'Numéros réponses',
			'class' => 'form-control',

	);
	$data_reponse1 = array(
			'type' => 'text',
			'name' => 'reponse1',
			'placeholder' => 'reponse1',
			'class' => 'form-control',
			'value'=> $_POST['reponse1'] ?? ""

	);
	$data_reponse2 = array(
			'type' => 'text',
			'name' => 'reponse2',
			'id' => 'reponse2',
			'placeholder' => 'reponse2',
			'class' => 'form-control',
			'value'=> $_POST['reponse2'] ?? ""

	);
	$data_reponse3 = array(
			'type' => 'text',
			'name' => 'reponse3',
			'id' => 'reponse3',
			'placeholder' => 'reponse3',
			'class' => 'form-control',
			'value'=> $_POST['reponse3'] ?? ""

	);
	$data_reponse4 = array(
			'type' => 'text',
			'name' => 'reponse4',
			'id' => 'reponse4',
			'placeholder' => 'reponse4',
			'class' => 'form-control',
			'value'=> $_POST['reponse4'] ?? ""

	);
	$data_image = array(
			'type' => 'text',
			'name' => 'image',
			'id' => 'image',
			'placeholder' => 'url d\'une image',
			'class' => 'form-control',
			'value'=> $_POST['image'] ?? ""

	);
	$data_temps = array(
			'type' => 'text',
			'name' => 'timer',
			'placeholder' => 'Timer pour ce quizz (en minute)',
			'class' => 'form-control mx-auto',
			'style'=>'width:260px',
		'maxlength'=>'3'
	);
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
			<th scope="col">Action</th>

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
				echo "<th scope=\"row\">";
				echo form_open('/MenuPrincipal/DelQuestion/' . $idQuestion[$i] . '/' . $cle[0]);
				echo form_submit('DelQuest', 'Supprimer la question', array('class' => 'btn btn-danger'));
				echo form_close();
			}
			echo "</th>";
			echo "</tr>";
		}

		echo "</div>";

		echo form_open('/MenuPrincipal/addQuestionToQuizz/'.$cle[0]);
		echo "<th>";

		echo form_input($data_question);
		echo form_error('question');
		echo "</th>";

		echo "<th>";

		echo form_input($data_reponse1);
		echo form_error('reponse1');

		echo "</th>";

		echo "<th>";

		echo form_input($data_reponse2);
		echo form_error('reponse2');

		echo "</th>";

		echo "<th>";

		echo form_input($data_reponse3);
		echo form_error('reponse3');

		echo "</th>";

		echo "<th>";

		echo form_input($data_reponse4);
		echo form_error('reponse4');

		echo "</th>";

		echo "<th>";

		echo form_input($data_image);
		echo form_error('image');

		echo "</th>";
		echo "<th>";

		echo form_input($data_nm_reponse);
		echo form_error('BonneReponse');

		echo "</th>";
		echo "<th>";

		echo form_submit('add', 'Ajouter', array('class' => 'btn btn-success '));
		echo form_close();
		echo "</tbody>";
		echo "</table>";
		echo "<div class=\"text-center\">";
		echo "<p> Temps actuel pour ce quizz : $temps[0] min.";
		echo form_open('MenuPrincipal/modifyTimer/'.$cle[0]);
		echo form_input($data_temps);
		echo form_submit('Ajouter du temps','Ajouter le timer',array('class'=>'btn btn-primary '));
		echo form_close();
		echo anchor('MenuPrincipal/quizzHub','Retour à la liste des quizz',array('class'=>'btn btn-outline-danger mb-4'));
		echo "</div>";
		?>
</div>
</body>
</html>
