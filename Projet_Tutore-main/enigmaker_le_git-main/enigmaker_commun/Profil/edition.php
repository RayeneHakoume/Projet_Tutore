<?php 
       include ("../Inclusion/connexion_bd.php");
        session_start();
        if(isset($_SESSION['num_utilisateur'])) {
            $requser = $bdd->prepare("SELECT * FROM n_utilisateur WHERE 	num_utilisateur  = ?");
            $requser->execute(array($_SESSION['num_utilisateur']));
            $user = $requser->fetch();
            if(isset($_POST['npseudo']) AND !empty($_POST['npseudo']) AND $_POST['npseudo'] != $user['pseudo']) {
               $newpseudo = htmlspecialchars($_POST['npseudo']);
               $insertpseudo = $bdd->prepare("UPDATE n_utilisateur SET pseudo = ? WHERE 	num_utilisateur  = ?");
               $insertpseudo->execute(array($newpseudo, $_SESSION['num_utilisateur']));
               header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
            }
            if(isset($_POST['nmail']) AND !empty($_POST['nmail']) AND $_POST['nmail'] != $user['email']) {
               $newmail = htmlspecialchars($_POST['nmail']);
               $insertmail = $bdd->prepare("UPDATE n_utilisateur SET email = ? WHERE 	num_utilisateur  = ?");
               $insertmail->execute(array($newmail, $_SESSION['num_utilisateur']));
               header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
            }
            if(isset($_POST['nmdp']) AND !empty($_POST['nmdp']) AND isset($_POST['nmdpc']) AND !empty($_POST['nmdpc'])) {
               $mdp1 = sha1($_POST['nmdp']);
               $mdp2 = sha1($_POST['nmdpc']);
               if($mdp1 == $mdp2) {
                  $insertmdp = $bdd->prepare("UPDATE n_utilisateur SET mdp = ? WHERE 	num_utilisateur  = ?");
                  $insertmdp->execute(array($mdp1, $_SESSION['num_utilisateur']));
                  header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
               } else {
                  $msg = "Vos deux mdp ne correspondent pas !";
               }
            }
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
      <div class="conteneur"> <!-- changer class en conteneur pour centrer -->
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
            <li><a href="../Inscription/index.php">Inscription</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a href='../Profil/index.php'> Profil </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/index.php?num_utilisateur ={$_SESSION['num_utilisateur']}'>Profil</a></li>";
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
   <div class="conteneur_profil">
    <h3 class="info_pro_titre">Edition du profil</h3>

    <form class="form_inscri"method="post" action="">
<table>
<tr>

        <td>
         <label for="npseudo">Nouveau Pseudo :</label>
        </td>
        <td>
        <input id="npseudo" type="text" name="npseudo" placeholder="Nouveau Pseudo" value="<?php 
        echo  $user['pseudo'];
        ?>" />
        </td>
        </tr>

        <tr>

<td>
 <label for="nmail">Nouveau Mail :</label>
</td>
<td>
<input id="nmail" type="text" name="nmail" placeholder="Nouveau Mail" value="<?php 
        echo  $user['email'];
        ?>"  />
</td>
</tr>

<tr>

<td>
 <label for="nmdp">Nouveau mdp :</label>
</td>
<td>
<input id="nmdp" type="password" name="nmdp" placeholder="Nouveau mdp" />
</td>
</tr>

<tr>

<td>
 <label for="nmdpc">Confirmation :</label>
</td>
<td>
<input id="nmdpc" type="password" name="nmdpc" placeholder="Confirmation" />
</td>
</tr>

<tr>
            <td></td>
            <td class="ligne_vali">
                <br/>
                <input type="submit" name="formMaj" value="Mettre à jour mon profil " />
            </td>
        </tr>
        </table>
        
</form>
   </div>
   </body>
</html>
<?php   
}
else {
    header("Location: ../Connexion/index.php");
}
?>