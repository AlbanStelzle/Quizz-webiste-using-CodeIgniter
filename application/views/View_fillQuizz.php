<body>
<div class="container ">

<?php
$this->load->helper('string');
$this->load->helper('form');

echo "<h1 class=\"h1 display-1 \">$Nom[0]</h1>";
echo form_open('Quizz/finishQuizz/'.$clé[0]);
$nbtotal=sizeof($Nom)-1;
$orderQuestion= range(0,$nbtotal);
shuffle($orderQuestion);
var_dump($orderQuestion);
foreach($orderQuestion as $row) {
	$data_checkbox1 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$row]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox1',
			'value'=>'1'

	);
	$data_checkbox2 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$row]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox2',
			'value'=>'2'

	);
	$data_checkbox3 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$row]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox3',
			'value'=>'3'

	);
	$data_checkbox4 = array(
			'type' => 'checkbox',
			'name' => "réponseéleve$idQuestion[$row]"."[]",
			'class' => 'form-check-input mx-auto',
			'id' => 'inlineCheckbox4',
			'value'=>'4'
	);
	$data_dropdown =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$row],
			'2'=>$reponse2[$row],

	);
	$data_dropdown2 =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$row],
			'2'=>$reponse2[$row],
			'3'=>$reponse3[$row],
	);
	$data_dropdown3 =array(
			''=> 'Sélectionner une réponse',
			'1'=>$reponse1[$row],
			'2'=>$reponse2[$row],
			'3'=>$reponse3[$row],
			'4'=>$reponse4[$row]
	);
	if ($question[$row] != null) {

		echo" <div class='row '>";

		echo" <div class='mx-auto '>";

		echo "<h1 class=\"h3 font-weight-normal mx-auto\">$question[$row]</h1>";
		echo "</div>";
		echo "</div>";
		if ($image[$row] != null) {
			echo "<img src=\"$image[$row]\" class=\"rounded mx-auto d-block\" style='width:200px' alt=\"$image[$row]\">";
			echo "<br>";
		}
		if (intval(strlen($BonneRéponse[$row])) === 1) {

			if ($reponse3[$row] == null && $reponse4[$row] == null) {
				echo form_dropdown("réponseéleve".$idQuestion[$row],$data_dropdown,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}elseif ( $reponse3[$row] != null && $reponse4[$row] == null) {
				echo form_dropdown("réponseéleve".$idQuestion[$row],$data_dropdown2,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}else{
				echo form_dropdown("réponseéleve".$idQuestion[$row],$data_dropdown3,'',array('class'=>"form-control form-control-lg w-50 mx-auto"));
			}
			echo "<br>";
		} else {

			echo "<div class=\"form-check form-check-inline \">";
			echo form_checkbox($data_checkbox1);
			echo form_label($reponse1[$row]);
			echo "</div>";
			echo "<div class=\"form-check form-check-inline \">";
			echo form_checkbox($data_checkbox2);
			echo form_label($reponse2[$row]);
			echo "</div>";
			if ($reponse3[$row] != null) {

				echo "<div class=\"form-check form-check-inline \">";
				echo form_checkbox($data_checkbox3);
				echo form_label($reponse3[$row]);
				echo "</div>";
			}
			if ($reponse4[$row] != null) {

				echo "<div class=\"form-check form-check-inline \">";
				echo form_checkbox($data_checkbox4);
				echo form_label($reponse4[$row]);
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
