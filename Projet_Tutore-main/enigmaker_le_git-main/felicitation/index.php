<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../felicitation/traitement_feli.php");
         $id_parcours = $_GET ['num_parcour'];
         $recupmission3 = $bdd->prepare("SELECT titre_parcours from n_parcours p where p.num_parcour='$id_parcours' ");
$recupmission3 ->execute();
$recupidmissioncontenu2=$recupmission3->fetchColumn();
$nb_enigme_dans_le_parcours=htmlspecialchars($recupidmissioncontenu2);

        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
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
    <div class="conteneur_inscription" > 
       <?php
    echo "<h3 class='inscri'>Bravo vous avez résolu le parcours: <br> $nb_enigme_dans_le_parcours  </h3>";
?>
<?php 
if(isset($_SESSION['num_utilisateur'])) {
?>
<form class="form_feli"method="post" action="">
<table>

<p>qu'avez vous pensé de ce parcours ?</p><br/>
<input type="number" min = 0 max = 5 name="formnum" />
    <input type="submit" name="validerfeli" value="valider" />
</table>
                
   
        
</form>
<?php
}
else {
    echo "<p class='inscri'>pour pouvoir voter vous devez être connecté</p> ";
}
if(isset($erreur)) {
    echo '<font color=red size=3><center>',$erreur,'</center></font>';

}
if(isset($confirmation)) {
    echo '<font color=blue size=3><center>',$confirmation,'</center></font>';

}

if(isset($dejavote)) {
    echo '<font color=blue size=3><center>',$dejavote,'</center></font>';

}
?>
    </div>
         
      
      

   </div>
   </body>
</html>