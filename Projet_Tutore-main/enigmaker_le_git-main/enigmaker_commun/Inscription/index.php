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
      <div class="menu_haut">
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
          <a  href="../Accueil/index.php"class="titre">Enigmaker</a>
         </div>
         <ul class="nav-items">
            <li><a href="../Creation/index.php">Créer</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a href='../Connexion/index.php'> Connexion </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/deconnexion.php'>Déconnexion</a></li>";
            }
            ?>
            <li><a class="actu" href="../Inscription/index.php">Inscription</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a href='../Profil/index.php'> Profil </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/index.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Profil</a></li>";
            }
            ?>
            <li><a href="#">Le site</a></li>
         </ul>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form class="fo_haut" action="#">
            <input type="search" class="search-data" placeholder="Recherchez" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
      </nav>
   </div>
   <script src="../Script/menu_haut.js">  </script>
     

    <div class="conteneur_inscription" > 
    <h3 class="inscri">Veuillez saisir les information suivantes</h3>

<form class="form_inscri"method="post" action="">
<table>
<tr>

        <td>
         <label for="pseudo">Pseudo :</label>
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
         <label for="mail">Mail :</label>
        </td>
        <td>
        <input id="mail" type="mail" placeholder="votre mail" name="mail"         value="<?php 
        if(isset($mail)) {
            echo $mail;
        }
        ?>"/>
        </td>
        </tr>
        <tr>
        <td>
         <label for="mail2">Confirmation :</label>
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
         <label for="mdp">Mot de passe :</label>
        </td>
        <td>
        <input id="mdp" type="password" placeholder="votre mot de passe" name="mdp"/>
        </td>
        </tr>
        <tr>
        <td>
         <label for="mdp2">Confirmation :</label>
        </td>
        <td>
        <input id="mdp2" type="password" placeholder="confirmez votre mdp" name="mdp2"/>
        </td>
        </tr>
        <tr>
            <td></td>
            <td class="ligne_vali">
                <br/>
            <input type="submit" value="Valider" name="form_inscription"/>
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
         
      
      

   </div>
   </body>
</html>