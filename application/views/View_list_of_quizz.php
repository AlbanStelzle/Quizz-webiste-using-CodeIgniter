<!DOCTYPE html>
<html>
<title>Mes quizz !</title>
<head>
	<?php
	$this->load->helper('url');

	?>
</head>

<div>
	<h1>Liste de vos quizz</h1>
	<table>
		<thead>
		<tr>
			<th>Question</th>

		</tr>
		</thead>
		<tbody>
		<?php
	if(isset($Nom)) {
		for ($i = 0; $i < sizeof($Nom); $i++) {
			echo "<tr>";
			echo "<th>";
			echo anchor('MenuPrincipal/modifyQuizz/'.$Nom[$i],$Nom[$i]);
			echo "</th>";
			echo "</tr>";
		}
	}


		?>



		</tbody>
	</table>
</div>


</body>
</html>
