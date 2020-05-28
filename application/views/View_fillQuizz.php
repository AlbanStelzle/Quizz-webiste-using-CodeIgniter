<body>
<div class="container">

<?php
$this->load->helper('string');
$this->load->helper('form');

echo "<h1 class=\"h1 display-1 \">$Nom[0]</h1>";

for ($i = 0; $i < sizeof($Nom); $i++) {
	$data_checkbox1 = array(
			'type' => 'checkbox',
			'name' => 'RéponseÉlève',
			'class' => 'form-check-input',
			'id' => 'inlineCheckbox1',
	);
	$data_checkbox2 = array(
			'type' => 'checkbox',
			'name' => 'RéponseÉlève',
			'class' => 'form-check-input',
			'id' => 'inlineCheckbox2',
	);
	$data_checkbox3 = array(
			'type' => 'checkbox',
			'name' => 'RéponseÉlève',
			'class' => 'form-check-input',
			'id' => 'inlineCheckbox3',
	);
	$data_checkbox4 = array(
			'type' => 'checkbox',
			'name' => 'RéponseÉlève',
			'class' => 'form-check-input',
			'id' => 'inlineCheckbox4',
	);
	if ($question[$i] != null) {
		echo "<h1 class=\"h3 mb-3 font-weight-normal \">$question[$i]</h1>";
		if ($image[$i] != null) {
			echo "<img src=\"$image[$i]\" class=\"rounded mx-auto d-block\" style='width:200px' alt=\"$image[$i]\">";
			echo "<br>";

		}
		if (intval(strlen($BonneRéponse[$i])) === 1) {
			echo "<select class=\"form-control form-control-lg\">
			
				  <option value=''>Sélectionner une réponse</option>
 			      <option value='1'> $reponse1[$i] </option>
				  <option value='2'> $reponse2[$i] </option>";
			if ($reponse3[$i] != null) {
				echo "<option value='3'> $reponse3[$i] </option>";
			}
			if ($reponse3[$i] != null) {
				echo "<option value='4'> $reponse[$i] </option>";
			}
			echo "</select>";
			echo "<br>";
		} else {
			echo" <div class='mx-auto'>";
			echo "<div class=\"form-check form-check-inline\">";
			echo form_checkbox($data_checkbox1);
			echo form_label($reponse1[$i]);
			echo "</div>";
			echo "<div class=\"form-check form-check-inline\">";
			echo form_checkbox($data_checkbox2);
			echo form_label($reponse2[$i]);
			echo "</div>";
			if ($reponse3[$i] != null) {

				echo "<div class=\"form-check form-check-inline\">";
				echo form_checkbox($data_checkbox3);
				echo form_label($reponse3[$i]);
				echo "</div>";
			}
			if ($reponse4[$i] != null) {

				echo "<div class=\"form-check form-check-inline\">";
				echo form_checkbox($data_checkbox4);
				echo form_label($reponse4[$i]);
				echo "</div>";
			}
			echo"</div>";
		}
	}
}

?>
	</div>

</body>
