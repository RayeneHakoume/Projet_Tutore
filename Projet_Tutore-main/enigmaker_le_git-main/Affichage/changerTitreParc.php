<?php 
        include ("../Inclusion/connexion_bd.php");
        session_start();
        include ("../Affichage/traitement_modif_titre_parc.php");
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
     $id_parc = $_GET ['num_parcours'];
     include ("../Inclusion/menu_haut.php");
    ?>

    <div class="contSecond9" > 
<?php 
   $id_ut_php=$_SESSION['num_utilisateur'];
   $selection_enigme = $bdd->prepare("SELECT * FROM n_parcours p where p.num_parcour = '$id_parc' ");
    // limit 6 pour tester nb enigme = 0 quand on crée une mission
   //$affiche_enigme = $selection_enigme -> fetch();
   $selection_enigme->execute();
   while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {
      $titre_parc=htmlspecialchars($row['titre_parcours']);
   
   }   
 
?>
    <h3 class="inscri">Modifier le parcours</h3>

<form class="form_inscri"method="post" enctype="multipart/form-data"  action="">

     <p>nouveau titre :</p>
     
     <input value="<?php if(isset($titre_parc)) {
		                           echo($titre_parc); } ?>" type="text" name="nrep"  id ="nrep"/>
     
                
   <!--     <p>nouvelle miniature</p>
        <input type='file' name='image_enigme' accept=".png,  .jpeg , .jpg"  />
        <br> -->
                <input type="submit" name="change_eni" value="valider les changements " />
      
</form>
<?php
   
?>

<?php


   ?>
    
   
   <?php
      
   ?>



</div>
         
      
<?php 
if(isset($err))  {
    echo '<font color=white size=3><center>',$err,'</center></font>';

}
   include ("../Inclusion/footer.php");
    ?>

         </div>
         </body>
      </html>