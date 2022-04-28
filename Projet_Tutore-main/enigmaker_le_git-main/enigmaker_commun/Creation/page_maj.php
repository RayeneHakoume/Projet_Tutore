<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_connexion.php");
        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
   <script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
  
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
      
   </head>
   <script type="text/javascript">
    function test_click(event){
      return confirm('Etes vous sûr?')
    
    }
</script>
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
            if (!isset($_SESSION['	num_utilisateur ']) ) {
               echo " <li><a  href='../Connexion/index.php'> Connexion </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/deconnexion.php'>Déconnexion</a></li>";
            }
            ?>
            <li><a href="../Inscription/index.php">Inscription</a></li>
            <?php
            if (!isset($_SESSION['	num_utilisateur ']) ) {
               echo " <li><a href='../Profil/index.php'> Profil </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/index.php?	num_utilisateur ={$_SESSION['	num_utilisateur ']}'>Profil</a></li>";
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
<?php
     $id_ut_php=$_SESSION['	num_utilisateur '];
$nbenigme=$_SESSION['missionCreable'];
$selection_enigme = $bdd->prepare("SELECT * FROM enigme e inner join utilisateur u on e.id_createur=u.	num_utilisateur 
 where e.id_createur= '$id_ut_php' order by dateCreEnigme desc LIMIT  $nbenigme");
 // limit 6 pour tester nb enigme = 0 quand on crée une mission
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {

    echo "<table border='1'>
    ";
    echo "<td>    <a  href='../Creation/bloc_maj.php?no_enigme={$row['no_enigme']}'>modifier l'enigme </a> </td>";
    echo "<td>      <a onclick='return test_click()'  href='../Creation/bloc_sup.php?no_enigme={$row['no_enigme']}' >supprimer l'enigme </a> </td>";


  echo "<tr>";
  echo "<th>liebelle</th> ";
  echo "  <td>"  . $row['libelle'] . "</td>";

 
  echo "<tr>" ;
  echo "<th>reponse</th> ";
  echo "  <td>"  . $row['reponse'] . "</td>";
 
 
  echo "<tr>" ;
  echo "<th>indice bonus1</th>";
  echo "  <td>"  . $row['indice_bonus1'] . "</td>";

 
  echo "<tr>" ;
  echo "<th>date ap 1</th> ";
  echo "  <td>"  . $row['date_ap1'] . "</td>";

 
  echo "<tr>" ;
  echo "<th>indice bonus2</th> ";
  echo "  <td>"  . $row['indice_bonus2'] . "</td>";

 
  echo "<tr>" ;
  echo "<th>date ap 2</th> ";
  echo "  <td>"  . $row['date_ap2'] . "</td>";

  echo "<tr>" ;
  echo "<th>indice bonus3</th> ";
  echo "  <td>"  . $row['indice_bonus3'] . "</td>";

  echo "<tr>" ;
  echo "<th>date ap 3</th> ";
  echo "  <td>"  . $row['date_ap3'] . "</td>";

  echo "</table>";
 
  
 }
    
 
/*
   echo "<td>    <a href='../Creation/bloc_maj.php'> modifier l'enigme </a> </td>";
   echo "<td>    <a href='../Creation/bloc_maj.php'> supprimer l'enigme </a> </td>";
   */
 


   

?>
  <button onclick="location.href='../Creation/index.php'" type="button">
         retour à la création des énigme</button>

		</div>
	</div>
        </div>
      
</div>
   </div>
   </body>
</html>