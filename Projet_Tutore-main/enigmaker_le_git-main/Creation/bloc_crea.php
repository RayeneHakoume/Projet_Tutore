  
<?php 
  include ("../Inclusion/connexion_bd.php");
if (isset($_POST['create'])) {


	if (isset($_POST['lib']) and isset($_POST['rep']) and !empty($_POST['lib']) and !empty($_POST['rep']) ) { 
		$texte_enigme= htmlentities($_POST['lib' ]);
		$reponse_enigme=htmlspecialchars($_POST['rep']);
		$id_createur_enigme=htmlspecialchars($_SESSION['num_utilisateur']);

	
		/********************************** */
		$insertntitre = $bdd->prepare("   INSERT  INTO n_enigme (type_enigme , 	QText_question , 	QText_reponse , id_createur) 
		values (? , ? , ? , ? )  ");
        $insertntitre->execute(array(1 , $texte_enigme, $reponse_enigme , $id_createur_enigme));
		//******************************* */

		$info_ajout="L'énigme a bien été crée";
	}
	else {
		$info_ajout="Tous les champs doivent être complété";
	}

 }


 if (isset($_POST['create_eni_img'])) {
if (isset($_POST['rep_img']) && !empty($_POST['rep_img']) ) {
	$reponse_enigme=htmlspecialchars($_POST['rep_img']);
	$id_createur_enigme=htmlspecialchars($_SESSION['num_utilisateur']);
	$newImage=null;
if (file_exists($_FILES['image_enigme']['tmp_name']) && is_uploaded_file($_FILES['image_enigme']['tmp_name'])) {
	$newImage=file_get_contents($_FILES['image_enigme']['tmp_name']);
	$confirmeNewImage=true;
	
	$req1= $bdd->prepare( "INSERT  INTO n_enigme (type_enigme , 	vrai_image , 	QText_reponse , id_createur) 
	values (2 ,  ? , '$reponse_enigme' , '$id_createur_enigme' ) " );
	  $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
	$req1->execute();
	$info_ajout="L'énigme a bien été crée";
}
else {
	$info_ajout="Tous les champs doivent être complété";
}


}
else {
	$info_ajout="Tous les champs doivent être complété";
}


 }
 ?>