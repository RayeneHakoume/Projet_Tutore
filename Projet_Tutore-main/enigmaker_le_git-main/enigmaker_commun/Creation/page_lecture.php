<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_connexion.php");
         include ("../Creation/bloc_mission_cree.php");
        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
   <script type="text/javascript">
    function test_click(event){
      return confirm('Etes vous sûr suprimer cette enigme la retirera des missions auquelles elle est associé?')
    
    }
</script>
  
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
    <div class="container">
    <form class="form_inscri" method="POST" action="">
    
<?php
   echo "<p class='info__'>choisissez les énigmes qui constitueront le parcours </p>";
     $id_ut_php=$_SESSION['num_utilisateur'];

$selection_enigme = $bdd->prepare("SELECT * FROM n_enigme e inner join n_utilisateur u on e.id_createur=u.num_utilisateur 
 where e.id_createur= '$id_ut_php' order by date_creation_eni desc ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {

   $type_eni=intval(['type_enigme']);
   echo "<table border='1'>  ";
   // affichage pour les énigmes textes
  if ($type_eni=1) {

 

   echo "<tr>" ;
   echo "<th>    <a  href='../Creation/bloc_maj.php?num_enigme={$row['num_enigme']}'>modifier l'enigme </a> </th>";
   echo "<td>      <a onclick='return test_click()'  href='../Creation/bloc_sup.php?num_enigme={$row['num_enigme']}' >supprimer l'enigme </a> </td>";
  


 $texte_a_cut=htmlspecialchars($row['QText_question'] );
 $texte_a_affiche= substr( $texte_a_cut ,  0 , 30);
 echo "<tr>";
 echo "<th>texte </th> <br/> ";
 echo "  <td>"  .  $texte_a_affiche. "</td>" . "<br>"; 

 echo "<tr>" ;
 echo "<th>reponse</th> ";
 echo "  <td>"  . $row['QText_reponse'] . "</td>";



 echo "  <td>   <input type='checkbox' name='ch[ ]'  value='$row[num_enigme]'  />  </td>";

 echo "</table>";

   
 
}

echo "</table>";
}

?>
   
<button onclick="location.href='../Creation/index.php'" type="button">
         retour à la création des énigme</button> <br/>

         <h3 class="inscri">Veuillez saisir le titre du parcours</h3>

<form class="form_inscri"method="post" action="">


   
         <label for="titrem">titre :</label>
   
        <input id="titrem" type="text" name="titrem" placeholder="titre de la mission" /> <br/>
        <input name="vali_mission" type="submit" value="créer la mission"
            onclick="return confirm('Etes vous sûr?')"/>
     
 
   
</form>

     <!--      <input type="submit" name="val_m" value ="créer une mission" /> -->
    
         <!--   onclick="location.href='../Creation/page_validation_mission'" -->
         
         </form>
         <?php


if($ermis!=null)  {
    echo '<font color=white size=3><center>',$ermis,'</center></font>';

}

?>

		</div>
	</div>
        </div>
      
</div>
   </div>

   </body>
</html>