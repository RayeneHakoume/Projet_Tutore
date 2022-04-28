<?php 
        session_start();
       include ("../Inclusion/connexion_bd.php");

        if(isset($_GET['num_utilisateur']) AND $_GET['num_utilisateur'] > 0) {
            $getid = intval($_GET['num_utilisateur']);
            $requser = $bdd->prepare("SELECT * FROM n_utilisateur WHERE  	num_utilisateur =?");
            $requser->execute(array($getid));
            $userinfo = $requser->fetch();
         
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
      <div class="conteneur2"> <!-- changer class en conteneur pour centrer -->
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
            echo " <li><a class='actu' href='../Profil/index.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Profil</a></li>";
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
    <h3 class="info_pro_titre">Profil de: <?php echo  $userinfo['pseudo']; ?> </h3>
    <br/>
    <div class="cont_para_pro">
          <p class="info_pro"> Nombre de parcours fait: <?php echo $userinfo['nb_mission_faite']; ?> </p> 
 
        
         <div>
         <?php
         if(isset($_SESSION['num_utilisateur']) AND $userinfo['num_utilisateur'] == $_SESSION['num_utilisateur']) {
         
         ?>
           <p class="info_pro"> Nombre de parcours réussi: <?php echo $userinfo['nb_mission_reussi']; ?> </p> 
          <p class="info_pro"> Mail: <?php echo $userinfo['email']; ?> </p>
         <a class="possibProfil" href="../Profil/edition.php">Editer mon profil</a>
        
        <!--  <a class="possibProfil" href="../Profil/deconnexion.php">Se déconnecter</a> -->
         <?php
                echo " <a  class='possibProfil'  href='../Affichage/mission_utilisateur.php?	num_utilisateur ={$_SESSION['num_utilisateur']}'>Voir mes parcours</a>";
                echo " <a  class='possibProfil'  href='../Affichage/enigme_utilisateur.php?	num_utilisateur ={$_SESSION['num_utilisateur']}'>Voir mes énigmes</a>";
         }
         ?>



         
      
      
      </div>
   </div>
   </body>
</html>
<?php   
}
else {
   header("Location: ../Connexion/index.php");
}
?>