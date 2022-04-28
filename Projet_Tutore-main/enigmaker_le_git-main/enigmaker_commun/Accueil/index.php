<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
       <!-- href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  -->
   </head>
   <body>
      <div class="conteneur">
        <?php 
         session_start();
         include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/menu_haut.php");
        ?>
     
 
    
    <?php // on affiche les parcours sans doublons
$var_confirm="";
$selection_enigme_affiche = $bdd->prepare(" SELECT * FROM n_assoc_ep ep inner join n_parcours p on ep.num_parc=p.num_parcour order by num_parcour ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme_affiche ->execute();
while ($row = $selection_enigme_affiche ->fetch(PDO::FETCH_ASSOC)) {

   echo "<table border='1'>
   ";
  if( $row['titre_parcours']!=$var_confirm) {
      echo "<td> <a class='affichage_eni_accueil' href='../Jouer/bloc_jeu.php?num_parcour={$row['num_parcour']}'> " .  $row['titre_parcours'] . " </a> </td>";
     }
   $var_confirm= $row['titre_parcours'] ;


 echo "</table>";
}
         ?>
      
      

   </div>
   
   </body>
</html>