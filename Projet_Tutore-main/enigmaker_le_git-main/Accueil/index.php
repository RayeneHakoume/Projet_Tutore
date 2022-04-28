<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
   <link rel="stylesheet" href="../testScript/lightslider.css">
    <script type="text/javascript" src="../testScript/jquery.js"></script>
    <script type="text/javascript" src="../testScript/lightslider.js"></script>
    <script type="text/javascript" src="../testScript/script.js"></script>
    <link rel="stylesheet" href="../testScript/style.css" />
   <?php 
         session_start();
         include ("../Inclusion/connexion_bd.php");
        // include ("../Inclusion/menu_haut.php");
        $_SESSION['Tabchecker']=array();
         @$_SESSION['nb_enigme_resolu']=0;
        @ $_SESSION['taille']=null;
         @$_SESSION['checker']=null;
        ?>
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
       <!-- href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  -->
   </head>
   <body>
      <div class="conteneur">

     <!-- ******************************************************** -->

     <?php 
   include ("../Inclusion/menu_haut.php");
   
    ?>

     <!-- ************************************************************* -->

<div class="contSecond2">
 <ul id="autoWidth" class="cs-hidden">

   

<?php
$var_confirm="";
$selection_enigme_affiche = $bdd->prepare(" SELECT * FROM n_assoc_ep ep inner join n_parcours p on ep.num_parc=p.num_parcour 
inner join n_enigme e on 
 e.num_enigme=ep.num_eni  inner join n_utilisateur u on u.num_utilisateur = e.id_createur   order by num_parcour ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme_affiche ->execute();
while ($row = $selection_enigme_affiche ->fetch(PDO::FETCH_ASSOC)) {
if($row['miniature']!=null) {
  $img=base64_encode($row['miniature']);
}


   echo "<table border='1'>";
  if( $row['titre_parcours']!=$var_confirm) {

   
echo "<li class='item-a'>";

echo"<div class='box'>";
//if ($img!= null) {
  //    echo    "<img class='imgAc' src=' data: .jpg;charset=utf8;base64, $img' />";
    // }
  echo "<div class='slide-img'>";

  
 
    echo " <img class='imgAc' src='../testScript/testBleu.jpg' />";
  

  echo "<div class='overlay'>";

  //echo "<p> réalisé par"    . $row['pseudo']   . "</p>";

  
// affichage des info ici
 // echo "<p> noté "    . $row['pseudo']  .  " /5"    . "</p>";
  //echo "<p> joué"    . $row['pseudo']   .  " fois" . "</p>";
  //echo "<p> réussi"    . $row['pseudo']   .  " fois" . "</p>";

  echo "<a  class='buy-btn'  href='../jouer/bloc_jeu.php?num_parcour={$row['num_parcour']}'>Jouer </a>";
  
    echo"</div>";

    // la
 echo" </div>";
 //echo "<div class='slidea'>";
 //echo "<p> réalisé par"    . $row['pseudo']   . "</p>";
 //echo "</div>";

  echo"<div class='detail-box'>";

   echo" <div class='type'>";

     echo"<a href='#'>" .  $row['titre_parcours']  . "</a>";
      echo "<p> réalisé par "    . $row['pseudo']   . "</p>";
      if ($row['noteParc'] != null) {
        echo "<p> noté "    . $row['noteParc']   . "/5</p>";
      }
      else {
        echo "<p> note indisponible</p>";
      }

  echo"  </div>";
  echo"  </div>";
  echo"  </div>";
  echo"  </li>";


// la
  }
  $var_confirm= $row['titre_parcours'] ;
 echo "</table>";
}

?>







 






</ul>
</div>

      <!-- ***************************************** -->
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

 
      <?php 
   include ("../Inclusion/footer.php");
    ?>

      <!-- ***************************************-->
   </div>
   



   </body>
</html>

