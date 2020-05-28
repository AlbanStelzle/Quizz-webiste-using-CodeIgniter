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
<div>
	<?php
	$name=$this->session->login;
	echo "<h1> Bienvenue $name </h1>";
	echo anchor('MenuPrincipal/quizzHub','Liste des quizz',array('class'=>'btn btn-info'));
	echo anchor('Accueil','Se déconnecter',array('class'=>'btn btn-danger'));
	?>



</div>


</body>
</html>
