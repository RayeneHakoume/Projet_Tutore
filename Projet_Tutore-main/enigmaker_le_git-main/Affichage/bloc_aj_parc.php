<?php 

  include ("../Inclusion/connexion_bd.php");
  $p=true;
  $ermis=null;
  $id_parcours = $_GET ['num_parcours'];
  @$ch=($_POST["ch"]);

     if (isset($_POST['vali_mission' ] ) && !empty($ch)   )  {

$id_ut_php=htmlspecialchars($_SESSION['num_utilisateur']);
      foreach($ch as $item) {
     $req2= $bdd->prepare(" insert into n_assoc_ep (num_parc, num_eni) values ('  $id_parcours' , '$item')  ");
     $req2->execute();

      }
      
      $ermis="les énigmes sélectionés ont bien été associées au parcours";

     }
     else if (isset($_POST['vali_mission' ]) && empty($ch) )  {
        $ermis="aucune enigme n'a été selectionné";
     }



  ?>