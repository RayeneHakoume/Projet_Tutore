<?php 
  session_start();
  include ("../Inclusion/connexion_bd.php");

  $id_enigme = $_GET ['num_enigme'];

  $reqsup2= $bdd->prepare("DELETE FROM n_assoc_ep WHERE num_eni =   $id_enigme");
  $reqsup2->execute();
  $reqsup= $bdd->prepare("DELETE FROM n_enigme  WHERE num_enigme =   $id_enigme");
  $reqsup->execute();

  $recupmission3 = $bdd->prepare(" SELECT count(*) FROM n_assoc_ep  where num_eni=  $id_enigme  ");
  $recupmission3 ->execute();
  $recupidmissioncontenu2=$recupmission3->fetchColumn();

  if (  $recupidmissioncontenu2==0 ) {
    $reqsup3= $bdd->prepare("DELETE FROM parcours  WHERE num_parcour not in ( select num_parc  from n_assoc_ep )");
    $reqsup3->execute();
  }

  $_SESSION['missionCreable']=$_SESSION['missionCreable']-1;
  header('Location: ../Creation/page_lecture.php');
  ?>