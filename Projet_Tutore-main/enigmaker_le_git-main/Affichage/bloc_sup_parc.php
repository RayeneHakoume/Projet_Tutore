<?php 
  session_start();
  include ("../Inclusion/connexion_bd.php");

  $id_enigme = $_GET ['num_parcours'];


  $reqsup1= $bdd->prepare("    SET FOREIGN_KEY_CHECKS=0");
  $reqsup1->execute();


  $reqsup2= $bdd->prepare("DELETE FROM n_parcours WHERE num_parcour =   $id_enigme");
  $reqsup2->execute();

  



 

  $reqsup112= $bdd->prepare("   SET FOREIGN_KEY_CHECKS=1 ");
  $reqsup112->execute();

  header("Location: ../Affichage/mission_utilisateur.php?num_utilisateur=".$_SESSION['num_utilisateur']);
  

  ?>