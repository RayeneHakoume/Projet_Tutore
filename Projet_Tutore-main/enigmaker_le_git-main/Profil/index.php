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
      <div class="conteneur"> <!-- changer class en conteneur pour centrer -->
      <?php 
   include ("../Inclusion/menu_haut.php");
    ?>
   <div class="">
    
    <br/>
   
    <div class="">
       <!--  <input type='file' name='imageFilmNew' accept=".png,  .jpeg , .jpg"  /> -->
          
   
        
         <div class="contSecondalt2">
            <br>
         <h3 class="info_pro_titre">Profil de : <?php echo "<p class='maz'>" .  $userinfo['pseudo'] . "</p>" ;?>  </h3>
         <?php 
    $recupImageProfil=null;
$recupmission3 = $bdd->prepare("SELECT image_profil from n_utilisateur u where 	num_utilisateur =$getid ");
$recupmission3 ->execute();
$recupImageProfil=$recupmission3->fetchColumn();
$img=base64_encode($recupImageProfil);
if($recupImageProfil!=null) {
   echo "<table border='1'>  ";

   
   echo "  <td>"  .    "<img class='imgPP ' src='data: .jpg;charset=utf8;base64, $img' />"  . "</td>" . "<br>"; 

   echo "</table>";
}
else {
   echo "<p class='info_pro' > vous n'avez pas encore d'image de profil vous pouvez en choisir une en éditant votre profil</p>";
}
    ?>
    <br>
      
         
         <?php
         if(isset($_SESSION['num_utilisateur']) AND $userinfo['num_utilisateur'] == $_SESSION['num_utilisateur']) {
         
         ?>
           <p class="info_pro"> Nombre de parcours réussi: <?php echo  $userinfo['nb_parcours_fait']; ?> </p> 
          <p class="info_pro"> Mail: <?php echo $userinfo['email']; ?> </p>
          <br>
         <a class="possibProfil" href="../Profil/edition.php">Editer mon profil</a>
         
         
         
         
        
        <!--  <a class="possibProfil" href="../Profil/deconnexion.php">Se déconnecter</a> -->
         <?php
                echo " <a  class='possibProfil'  href='../Affichage/mission_utilisateur.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Voir mes parcours</a>";
          
                echo " <a  class='possibProfil'  href='../Affichage/enigme_utilisateur.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Voir mes énigmes</a>";
         }
         ?>



         
      
      
      </div>
      <?php 
   include ("../Inclusion/footer.php");
    ?>

   </div>
   
   </body>
</html>
<?php   
}
else {
   header("Location: ../Connexion/index.php");
}

?>