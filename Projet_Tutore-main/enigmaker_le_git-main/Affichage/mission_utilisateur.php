<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_connexion.php");
         include ("../Creation/bloc_mission_cree.php");
         $_SESSION['Tabchecker']=array();
         @$_SESSION['nb_enigme_resolu']=0;
        @ $_SESSION['taille']=null;
         @$_SESSION['checker']=null;
        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
   <script type="text/javascript">
    function test_click(event){
      return confirm('Etes vous sûr de vouloir supprmer le parcours')
    
    }
</script>
  
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
      
   </head>
   <body>
      <div class="conteneur">
    <?php 
    include ("../Inclusion/menu_haut.php");
    ?>

    <div class="creaDiv7" > 
    

<div class='contMi'>
    <form class="form_inscri7" method="POST" action="">
    
<?php
     $id_ut_php=$_SESSION['num_utilisateur'];
     $verif_vide = $bdd->prepare("SELECT count(*)  FROM n_assoc_ep ep inner join n_parcours p on ep.num_parc=p.num_parcour
     where id_createur=$id_ut_php ");
     $verif_vide->execute();
     $verif_vide_contenu=$verif_vide->fetchColumn();
     if($verif_vide_contenu==0) {
        $ermis="vous n'avez pas encore créé de parcours";
     }
   echo "<p class='info__'>Voici la liste de vos parcours </p>";


   $selection_enigme_affiche = $bdd->prepare(" SELECT * FROM  n_parcours p
   where p.id_createur=$id_ut_php;
    order by num_parcour ");
   //$affiche_enigme = $selection_enigme -> fetch();
   $selection_enigme_affiche ->execute();
  
   while ($row = $selection_enigme_affiche ->fetch(PDO::FETCH_ASSOC)) {
  
      echo "<table border='1' class='infP'>";
      echo "<td >    <a   class='idalt1' href='../Affichage/pageAjoutEniParc.php?num_parcours={$row['num_parcour']}'>ajouter une énigme au parcours</a> </td>";
      echo "<td >    <a class='idalt1'   href='../Affichage/changerTitreParc.php?num_parcours={$row['num_parcour']}'>changer le titre du  parcours</a> </td>";
    // if( $row['titre_parcours']!=$var_confirm) {
      echo "<td>      <a  class='idalt1' onclick='return test_click()'  href='../Affichage/bloc_sup_parc.php?num_parcours={$row['num_parcour']}' >supprimer le parcours</a> </td>";
         echo "<td> <a class='idalt1'   href='../Jouer/bloc_jeu.php?num_parcour={$row['num_parcour']}'> " .  $row['titre_parcours'] . " </a> </td>";
      //  }
echo "<br>";

   
    echo "</table>";

   }

   

?>
   
   

 


     <!--      <input type="submit" name="val_m" value ="créer une mission" /> -->
    
         <!--   onclick="location.href='../Creation/page_validation_mission'" -->
         
         </form>
		 </div>
         <?php


if($ermis!=null)  {
    echo '<font color=white size=3><center>',$ermis,'</center></font>';

}

?>

		</div>
      <?php 
   include ("../Inclusion/footer.php");
    ?>
   
	</div>


   </body>
</html>