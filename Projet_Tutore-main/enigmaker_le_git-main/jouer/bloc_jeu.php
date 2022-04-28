<?php 
        include ("../Inclusion/connexion_bd.php");
        session_start();
         
       //  $_SESSION['Tabchecker']=array();
       @  $_SESSION['taille']=sizeof(   $_SESSION['Tabchecker']);
       
        /* for($z=0 ;$z< $_SESSION['taille']; $z++) {
            if($z==1 ) {

            }
         } */
  ob_start();
        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
      <script type="text/javascript" src="../testScript/jquery.js"></script>
   </head>
   <body>
      <div class="conteneur">
      <?php 
   include ("../Inclusion/menu_haut.php");
    ?>
    <div class="conteneur_enigme" > 
       <br>
       <br>
    <?php
 $id_parcours = $_GET ['num_parcour'];
$recupmission4 = $bdd->prepare("SELECT  count(*) from n_parcours p inner join n_assoc_ep e on e.num_parc=p.num_parcour where p.num_parcour='$id_parcours' ");
$recupmission4 ->execute();
$recupidmissioncontenu3=$recupmission4->fetchColumn();
$nb_enigme_dans_le_parcoursVrai=intval($recupidmissioncontenu3);



            
             $recupmission3 = $bdd->prepare("SELECT titre_parcours from n_parcours p where p.num_parcour='$id_parcours' ");
    $recupmission3 ->execute();
    $recupidmissioncontenu2=$recupmission3->fetchColumn();
    $nb_enigme_dans_le_parcours=htmlspecialchars($recupidmissioncontenu2);
    echo "<br>";
    echo "<br>";
    echo "<h3 class='inscrijeu'>Vous jouez au parcours: <br/> $nb_enigme_dans_le_parcours</h3>";
    if (empty(@$_SESSION['nb_enigme_resolu'])) {
      echo" <p  class='newE'>";
      echo  'avance du  parcours ' .'0'. '/' .$nb_enigme_dans_le_parcoursVrai . "<br>";
      echo  "</p>";
   }
   else {
   
   
      echo" <p  class='newE'>";
      echo  'avance du  parcours '.    @$_SESSION['nb_enigme_resolu'] . '/' .$nb_enigme_dans_le_parcoursVrai . "<br>";
      echo  "</p>";
   
   }
?>
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
   echo "<a  class='num_eni' href='#slide-$id_lien' >$id_lien</a> ";

}
?>
<script>

var elements = document.getElementsByClassName("num_eni");



for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener("click", () => {
      $(function(){
   var scroll_pos=(0);          
   $('html, body').animate({scrollTop:(scroll_pos)}, '2000');
});
});
}

</script>


<script>
       $(function(){
   var scroll_pos=(0);          
   $('html, body').animate({scrollTop:(scroll_pos)}, '2000');
})
</script>

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
$selection_enigme = $bdd->prepare(" SELECT * from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {
   $type_eni=intval($row['type_enigme']);
   $id_eni= intval($row['num_enigme']) ;
   $rep_eni= htmlspecialchars( $row['QText_reponse'] );
   $taille_rep=strlen($row['QText_reponse']);

   $id_div=$id_div+1;
echo "<div id=slide-$id_div >";
echo "<form method  ='POST' class='form_affiche_eni' enctype='multipart/form-data'  onsubmit='function()''>";
if($type_eni==1) {
  echo " <p class='affiche_eni_reso'>"  . $row['QText_question'] ;
}
if($type_eni==2) {
   $img=base64_encode($row['vrai_image']);
   echo "<center>";
   echo    "<img class='imgEnigme' src=' data: .jpg;charset=utf8;base64, $img' />";
   echo "</center>";
 }
  echo "</p>";
  echo "<br/>";

//********************************* 
$imp = false;
for($z=0 ;$z< $_SESSION['taille']; $z++) {
   if(     $_SESSION['Tabchecker'][$z]== $id_div) {
 $imp = true;
   }
} 



//************************* */

  if ($imp==false ) {
   echo "<input class='okrepdiv' type='text' name='rep_ini_verif_$id_div' placeholder='réponse $id_div'  />";
   echo "<br>";
   echo "<input  class='num_enialt'  type='submit' name='rep_ini_verif_envoi$id_div'  value='valider'  />";
   if($taille_rep==1) {
      echo "<p class='affiche_eni_reso'> la réponse est sur 1 caractère </p>";
   }
   else {
      echo "<p class='affiche_eni_reso'> la réponse est sur $taille_rep caractères </p>";
   }

  }
   echo "</form>";
  $id_parcours = $_GET ['num_parcour'];


   



echo "</div>";
if (isset($_POST["rep_ini_verif_$id_div"])) {
   if (strtoupper($_POST["rep_ini_verif_$id_div"])==strtoupper($rep_eni) ) {
    //  echo 'bonne reponse';
    
    $confirmation="bonne réponse pour l'enigme ". $id_div; 
if($id_div!=  @$_SESSION['checker']) {

    @$_SESSION['nb_enigme_resolu']=$_SESSION['nb_enigme_resolu']+1;
    
    @$_SESSION['checker']=$id_div;
}
array_push($_SESSION['Tabchecker'],  intval(@$_SESSION['checker'])   );
//echo $_SESSION['checker'];

  // on actualise
echo("<meta http-equiv='refresh' content='1'>");
$c="$id_parcours#slide-$id_div";
header("Location: ../jouer/bloc_jeu.php?num_parcour=$c" );

  //  $cnb_enigme_dans_le_parcours=$cnb_enigme_dans_le_parcours-1;
   }
  
   else {
      $confirmation="mauvaise réponse pour l'enigme ". $id_div; 
      if($id_div==  @$_SESSION['checker']) {
         @$_SESSION['checker']=$id_div;
      }
   //   echo 'mauvaise réponse';
   //$confirmation="mauvaise réponse pour l'enigme ". $id_div; 
   }
//   echo "oui";
   
   }


}


?>
   
  </div>
  <?php
// on compte le nm d'enigme dans le parcour
$id_parcours = $_GET ['num_parcour'];
$id_form=0;


//echo $id_div_utilise;
//echo $id_parcours;
$recupmission3 = $bdd->prepare("SELECT count(*) from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
$recupmission3 ->execute();
$recupidmissioncontenu2=$recupmission3->fetchColumn();
$nb_enigme_dans_le_parcours=intval($recupidmissioncontenu2);



//echo $recupidmissioncontenu2;

// on affiche les énigmes du parcours
$selection_enigme = $bdd->prepare("SELECT * from n_parcours p inner join n_assoc_ep e on p.num_parcour=e.num_parc inner join
n_enigme en on en.num_enigme=e.num_eni where p.num_parcour='$id_parcours' ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {


   $id_eni= intval($row['num_enigme']) ;
   $rep_eni= htmlspecialchars( $row['QText_reponse'] );
   $taille_rep=strlen($row['QText_reponse']);
   $id_form=$id_form+1;

     // if (@$_POST["rep_ini_verif_$id_form"]!=$row['QText_reponse']) {

      
      // onclick="this.style.display='none'"

}



//echo $_SESSION['nb_enigme_resolu'];

if( $nb_enigme_dans_le_parcours==@$_SESSION['nb_enigme_resolu']) {
   $_SESSION['nb_enigme_resolu']=0;
   $id_div=0;
   $_SESSION['checker']=0;
   $_SESSION['Tabchecker']=null;
    header("Location: ../felicitation/index.php?num_parcour=".$id_parcours  );
}
?>
</div>

    </div>
 
<?php


?>

<?php 
if(isset($confirmation)) {
   echo '<font color=white size=3><center>',$confirmation,'</center></font>';

}



ob_end_flush();
       ?>




<br>
<br>
<br>

<?php 
//echo $_SESSION['checker'];
//echo "<br>";
 // print_r($_SESSION['Tabchecker']);

   include ("../Inclusion/footer.php");
    ?>

   </div>
   </body>
</html>