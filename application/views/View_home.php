<!DOCTYPE html>
<html>
<title>Hub</title>
<head>

</head>
<?php
$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('html');
$this->load->library('session');

?>
<div class="container" style="width: 500px;margin-top: 200px; text-align: center;">

	<?php
	$name=$this->session->login;
	echo "<h1> Bienvenue</h1>";
	echo "<h1>$name </h1>";
	echo anchor('MenuPrincipal/quizzHub','Liste des quizz',array('class'=>'btn btn-lg btn-block btn-outline-primary'));
	echo anchor('Accueil','Se déconnecter',array('class'=>'btn btn-lg btn-block btn-outline-danger'));
	?>



</div>


</body>
</html>
