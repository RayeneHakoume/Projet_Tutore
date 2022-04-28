<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Creation/traitement_modif.php");
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

    <div class="contSecond9" > 
<?php 
   $id_ut_php=$_SESSION['num_utilisateur'];
   $selection_enigme = $bdd->prepare("SELECT * FROM n_enigme e inner join n_utilisateur u on e.id_createur=u.num_utilisateur 
    where e.id_createur= '$id_ut_php' and e.num_enigme=$id_enigme ");
    // limit 6 pour tester nb enigme = 0 quand on crée une mission
   //$affiche_enigme = $selection_enigme -> fetch();
   $selection_enigme->execute();
   while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {
      $type_eni=intval($row['type_enigme']);
      $alibelle=htmlspecialchars($row['QText_question']);
      $areponse=htmlspecialchars($row['QText_reponse']);
      $aImage=base64_encode($row['vrai_image']);
   }   
   if($type_eni==1) {
?>
    <h3 class="inscri">Modifier l'enigme</h3>

<form class="form_inscri"method="post" action="">

     <p>nouveau texte</p>
     
        <textarea 
        class="t_eni" 
                 class='form-control'
                 id='lib'
                 name="nlibelle"
   >
   <?php if(isset($alibelle)) {
		                           echo($alibelle); } ?>

</textarea>
 <br>
         <label for="nrep">Nouvelle réponse :</label>
      
        <input value="<?php if(isset($areponse)) {
		                           echo($areponse); } ?>" type="text" name="nrep"  id ="nrep"/>
    
      <br>
                
                <input type="submit" name="change_eni" value="valider les changements " />
      
        
</form>
<?php
   }
?>

<?php


if($type_eni==2) {
   ?>
       <h3 class="inscri">Modifier l'enigme</h3>
   
   <form class="form_inscri"method="post" enctype="multipart/form-data"   action="">
   
   <table>
   
   <?php


echo "<tr>";
echo "<td>Ancienne image </td> ";
echo "  <td>"  .    "<img class='imgEnigmeModif ' src='data: .jpg;charset=utf8;base64, $aImage' />"  . "</td>" . "<br>"; 





?>

<tr>
        <td>
         <label for="nrep">Nouvelle image:</label>
        </td>
        <td>
        <input type='file' name='image_enigme' accept=".png,  .jpeg , .jpg"  />
        </td>
        </tr>

        <tr>
        <td>
         <label for="nrep">Nouvelle réponse :</label>
        </td>
        <td>
        <input value="<?php if(isset($areponse)) {
		                           echo($areponse); } ?>" type="text" name="nrep"  id ="nrep"/>
        </td>
        </tr>

        <tr>
  
            <td class="ligne_vali">
              
                <input type="submit" name="change_eniImg" value="valider les changements " />
            </td>
        </tr>

            </table>  
   </form>
   <?php
      }
   ?>



</div>
         
      
<?php 
   include ("../Inclusion/footer.php");
    ?>

         </div>
         </body>
      </html>