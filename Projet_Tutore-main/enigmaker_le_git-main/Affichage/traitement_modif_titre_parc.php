<?php
if(isset($_POST['change_eni'])) {
    if($_POST['nrep'] && !empty($_POST['nrep']) && $_POST['nrep']!=null) {
        $titre=$_POST['nrep'];
        $id_parc = $_GET ['num_parcours'];
        $insertntitre = $bdd->prepare("UPDATE n_parcours SET titre_parcours = ? WHERE num_parcour = ?");
        $insertntitre->execute(array($titre,  $id_parc));
        header('Location: ../Affichage/mission_utilisateur.php');
    
// si il a une image on l'insert
    if (file_exists($_FILES['image_enigme']['tmp_name']) && is_uploaded_file($_FILES['image_enigme']['tmp_name'])) {
        $newImage=file_get_contents($_FILES['image_enigme']['tmp_name']);
        $confirmeNewImage=true;
        
        $req1= $bdd->prepare( "UPDATE  n_parcours set miniature  =?  WHERE num_parcour = ? " );
          $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
          $req1->bindValue(2 , $id_parc, PDO::PARAM_INT);
        $req1->execute();
        
    }
    header('Location: ../Affichage/mission_utilisateur.php');
}

    else {
        $err="le titre ne doit pas être vide";
    }
}



?>