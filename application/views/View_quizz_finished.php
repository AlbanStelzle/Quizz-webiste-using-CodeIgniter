<div class="container">
	<div class="jumbotron shadow-lg p-3 mb-5 bg-white rounded">
		<h1 class="display-4">Fin du quizz !</h1>
		<p class="lead">Tes réponses ont été envoyé ! Garde le code qui t'est fournit, il te servira de clé pour accéder à la correction !</p>
		<hr class="my-4">
		<p>Voici ta clé: <?php echo $cleduresultat ?>. Elle est unique et personnelle </p>
		<?php echo anchor('Accueil','Retour à l\'accueil',array('class'=>'btn btn-primary btn-lg')); ?>
	</div>
</div>
