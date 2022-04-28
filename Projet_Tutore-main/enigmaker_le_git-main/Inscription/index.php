<?php 
   session_start();
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_inscription.php");
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
    <div class="contSecond" > 
       <br>
    <h3 class="inscri">S'inscrire</h3>
    <br>
    <br>
    <br>


<form class="form_inscri"method="post" action="">
<table>
<tr>

        <td>
         <label  class="ci" for="pseudo">Pseudo :</label>
        </td>
        <td>
        <input id="pseudo" type="text" placeholder="votre pseudo" name="pseudo" 
        value="<?php 
        if(isset($pseudo)) {
            echo $pseudo;
        }
        ?>"/>
        </td>
        </tr>
        <tr>
        <td>
         <label  class="ci"  for="mail">Mail :</label>
        </td>
        <td>
        <input  id="mail" type="mail" placeholder="votre mail" name="mail"         value="<?php 
        if(isset($mail)) {
            echo $mail;
        }
        ?>"/>
        </td>
        </tr>
        <tr>
        <td>
         <label  class="ci"  for="mail2">Confirmation :</label>
        </td>
        <td>
        <input id="mail2" type="mail" placeholder="confimez votre mail" name="mail2"         value="<?php 
        if(isset($mail2)) {
            echo $mail2;
        }
        ?>"/>
        </td>
        </tr>
        <tr>
        <td>
         <label class="ci"  for="mdp">Mot de passe :</label>
        </td>
   
        <td>
        <input   id="mdp" type="password" placeholder="votre mot de passe" name="mdp"/>
        </td>
        </tr>
        <tr>
        <td>
         <label class="ci"for="mdp2">Confirmation :</label>
        </td>
        <td>
        <input id="mdp2" type="password" placeholder="confirmez votre mdp" name="mdp2"/>
        </td>
        </tr>
        <tr>
            <td></td>
            <td class="ligne_vali">
                <br/>
            <input type="submit" class="valiCo" value="Valider" name="form_inscription"/>
            </td>
        </tr>
        </table>
        
</form>
<?php
if(isset($erreur)) {
    echo '<font color=red size=3><center>',$erreur,'</center></font>';

}
if(isset($confirmation)) {
    echo '<font color=blue size=3><center>',$confirmation,'</center></font>';

}
?>
    </div>
         
      
      
    <?php 
   include ("../Inclusion/footer.php");
    ?>

   </div>
   </body>
</html>