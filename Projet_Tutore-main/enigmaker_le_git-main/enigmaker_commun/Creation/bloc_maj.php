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
      <div class="menu_haut">
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
          <a  href="../Accueil/index.php"class="titre">Enigmaker</a>
         </div>
         <ul class="nav-items">
            <li><a class='actu' href="../Creation/index.php">Créer</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a  href='../Connexion/index.php'> Connexion </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/deconnexion.php'>Déconnexion</a></li>";
            }
            ?>
            <li><a href="../Inscription/index.php">Inscription</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a  href='../Profil/index.php'> Profil </a></li> ";
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
   <?php

?>

    <div class="conteneur_inscription" > 
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
   }   
   if($type_eni==1) {
?>
    <h3 class="inscri">Modifier l'enigme</h3>

<form class="form_inscri"method="post" action="">
<table>

        <tr>
        <td>
         <label for="nlibelle">Nouveau texte :</label>
        </td>
        <td>
        <input  value="<?php if(isset($alibelle)) {
		                           echo($alibelle); } ?>" type="text" name="nlibelle"  id ="nlibelle"/>
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
            <td></td>
            <td class="ligne_vali">
                <br/>
                <input type="submit" name="change_eni" value="valider les changements " />
            </td>
        </tr>
        </table>
        
</form>
<?php
   }
?>

</div>
         
      
      

         </div>
         </body>
      </html>