<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_connexion.php");
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


    <div class="contSecond" > <br>
    <h3 class="inscri">Se connecter</h3>
<br>

<br>
<form class="form_inscri"method="post" action="">
<table>
<tr>

        <td>
         <label class='ci' for="mail_co">Mail :</label>
        </td>
        <td>
        <input id="mail_co" type="email" name="mailconnect" placeholder="Mail" />
        </td>
        </tr>
        <tr>
        <td>
         <label class='ci' for="mdp_co">Mot de passe :</label>
        </td>
        <td>
        <input id="mdp_co" type="password" name="mdpconnect" placeholder="Mot de passe" />
        </td>
        </tr>
        <tr>
            <td></td>
            <td class="ligne_vali">
                <br/>
                <input type="submit"  class='valiCo'name="formconnexion" value="Se connecter " />
            </td>
        </tr>
        </table>
        
</form>
<br>
<p class="ci2">Tu n'as pas de compte ?<a href="../Inscription/index.php"> Créer un compte</a></p>
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