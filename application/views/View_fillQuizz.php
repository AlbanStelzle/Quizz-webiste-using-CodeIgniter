<body>
<div class="container ">

<?php
$this->load->helper('string');
$this->load->helper('form');

echo "<h1 class=\"h1 display-1 \">$Nom[0]</h1>";
echo form_open('Quizz/finishQuizz/'.$clé[0]);
for($i=0  ; $i< sizeof($Nom); $i++) {
	$data_checkbox1 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$i]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox1',
			'value'=>'1'

	);
	$data_checkbox2 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$i]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox2',
			'value'=>'2'

	);
	$data_checkbox3 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$i]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox3',
			'value'=>'3'

	);
	$data_checkbox4 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$i]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox4',
			'value'=>'4'
	);
	$data_dropdown =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$i],
			'2'=>$reponse2[$i],

	);
	$data_dropdown2 =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$i],
			'2'=>$reponse2[$i],
			'3'=>$reponse3[$i],
	);
	$data_dropdown3 =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$i],
			'2'=>$reponse2[$i],
			'3'=>$reponse3[$i],
			'4'=>$reponse4[$i]
	);
	if ($question[$i] != null) {

		echo" <div class='row '>";

		echo" <div class='mx-auto '>";

		echo "<h1 class=\"h3 font-weight-normal mx-auto\">$question[$i]</h1>";
		echo "</div>";
		echo "</div>";
		if ($image[$i] != null) {
			echo "<img src=\"$image[$i]\" class=\"rounded mx-auto d-block\" style='width:200px' alt=\"$image[$i]\">";
			echo "<br>";
		}
		if (intval(strlen($BonneRéponse[$i])) === 1) {

			if ($reponse3[$i] == null && $reponse4[$i] == null) {
				echo form_dropdown("réponseéleve".$idQuestion[$i],$data_dropdown,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}elseif ( $reponse3[$i] != null && $reponse4[$i] == null) {
				echo form_dropdown("réponseéleve".$idQuestion[$i],$data_dropdown2,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}else{
				echo form_dropdown("réponseéleve".$idQuestion[$i],$data_dropdown3,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}
			echo "<br>";
		} else {
			echo" <div class='row '>";
			echo" <div class='mx-auto '>";

			echo "<div class=\"form-check form-check-inline \">";
			echo form_checkbox($data_checkbox1);
			echo form_label($reponse1[$i]);
			echo "</div>";
			echo "<div class=\"form-check form-check-inline \">";
			echo form_checkbox($data_checkbox2);
			echo form_label($reponse2[$i]);
			echo "</div>";
			if ($reponse3[$i] != null) {

				echo "<div class=\"form-check form-check-inline \">";
				echo form_checkbox($data_checkbox3);
				echo form_label($reponse3[$i]);
				echo "</div>";
			}
			if ($reponse4[$i] != null) {

				echo "<div class=\"form-check form-check-inline \">";
				echo form_checkbox($data_checkbox4);
				echo form_label($reponse4[$i]);
				echo "</div>";
			}
			echo"</div>";
			echo"</div>";
		}
	}
}
echo "</br>";
echo "</br>";
echo" <div class='row '>";

echo" <div class='mx-auto '>";
	echo form_submit('SendData','Terminer le quizz',array('class'=>'btn btn-md btn-primary btn-block'));
	echo form_close();
	echo"</div>";
			echo"</div>";
			?>

	</div>

</body>
