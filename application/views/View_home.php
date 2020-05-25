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
	echo "<h1> Bienvenu $name </h1>";
	echo anchor('MenuPrincipal/quizzHub','Liste des quizz');
	echo anchor('Accueil','Se déconnecter');
	?>



</div>


</body>
</html>
