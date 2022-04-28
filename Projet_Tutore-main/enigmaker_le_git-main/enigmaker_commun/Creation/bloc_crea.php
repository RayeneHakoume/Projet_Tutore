  
<?php 
  include ("../Inclusion/connexion_bd.php");
if (isset($_POST['create'])) {


	if (isset($_POST['lib']) and isset($_POST['rep']) and !empty($_POST['lib']) and !empty($_POST['rep']) ) { 
		$texte_enigme= htmlspecialchars($_POST['lib' ]);
		$reponse_enigme=htmlspecialchars($_POST['rep']);
		$id_createur_enigme=htmlspecialchars($_SESSION['num_utilisateur']);

		$req1= $bdd->prepare( "INSERT  INTO n_enigme (type_enigme , 	QText_question , 	QText_reponse , id_createur) 
		values (1 , '$texte_enigme', '$reponse_enigme' , '$id_createur_enigme' ) " );
		$req1->execute();
		$info_ajout="L'énigme a bien été crée";
	}
	else {
		$info_ajout="Tous les champs doivent être complété";
	}

 }

 ?>