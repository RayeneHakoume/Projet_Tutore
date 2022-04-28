
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
               echo " <li><a  href='../Connexion/index.php'> Connexion </a></li> ";
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
    <div class="slider">
  <!--
  <a href="#slide-1">1</a>
  <a href="#slide-2">2</a>
         -->
         <?php
// on compte le nm d'enigme dans le parcour
$id_parcours = $_GET ['num_parcour'];
$id_lien=0;


//echo $id_div_utilise;
//echo $id_parcours;
$recupmission3 = $bdd->prepare("SELECT count(*) from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
$recupmission3 ->execute();
$recupidmissioncontenu2=$recupmission3->fetchColumn();
//echo $recupidmissioncontenu2;

// on affiche les énigmes du parcours
$selection_enigme = $bdd->prepare("SELECT * from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {
   $id_lien++;
   echo "<a href='#slide-$id_lien'>$id_lien</a>";

}
?>

  <div class="slides">
 
   <!--   <div id="slide-1">
      1
    </div>
 select * from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni 
 select count(*) from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour=10;     -->
<?php
// on compte le nm d'enigme dans le parcour
$id_parcours = $_GET ['num_parcour'];
$id_div=0;


//echo $id_div_utilise;
//echo $id_parcours;
$recupmission3 = $bdd->prepare("SELECT count(*) from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
$recupmission3 ->execute();
$recupidmissioncontenu2=$recupmission3->fetchColumn();
//echo $recupidmissioncontenu2;

// on affiche les énigmes du parcours
$selection_enigme = $bdd->prepare("SELECT * from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {
   $id_div=$id_div+1;
echo "<div id=slide-$id_div >";

  echo "  <p class='affiche_eni_reso'>"  . $row['QText_question'] . "<p>";

echo "</div>";
echo $id_div;
}
?>
   
  </div>
</div>
    </div>
   








      

   </div>
   </body>
</html>