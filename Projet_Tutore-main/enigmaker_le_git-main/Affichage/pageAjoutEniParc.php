<?php 
        include ("../Inclusion/connexion_bd.php");
         include ("../Inclusion/traitement_connexion.php");
         include ("../Affichage/bloc_aj_parc.php");
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
      <?php 
   include ("../Inclusion/menu_haut.php");
    ?>
     

    <div class="creaDiv" > 
    <p class='info__'>choisissez les énigmes que vous souhaitez ajouter au parcours </p>
    <form class="form_inscri" method="POST" action="">

<?php

     $id_ut_php=$_SESSION['num_utilisateur'];

$selection_enigme = $bdd->prepare("SELECT * FROM n_enigme e inner join n_utilisateur u on e.id_createur=u.num_utilisateur 
 where e.id_createur= '$id_ut_php' order by date_creation_eni desc ");
//$affiche_enigme = $selection_enigme -> fetch();
$selection_enigme->execute();
while ($row = $selection_enigme->fetch(PDO::FETCH_ASSOC)) {

   $type_eni=intval($row['type_enigme']);
 
   // affichage pour les énigmes textes
  if ($type_eni==1) {
   echo "<table border='1'>  ";
 

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


if ($type_eni==2) {
   $img=base64_encode($row['vrai_image']);

   echo "<table border='1'class='montab'>  ";
 





   //echo "  <td>    <img class='imgEnigme ' src='data: .jpg;charset=utf8;base64, $img'   </td>" ;

   echo "<tr>" ;
   echo "<th>    <a  href='../Creation/bloc_maj.php?num_enigme={$row['num_enigme']}'>modifier l'enigme </a> </th>";
   echo "<td>      <a onclick='return test_click()'  href='../Creation/bloc_sup.php?num_enigme={$row['num_enigme']}' >supprimer l'enigme </a> </td>";
  


 $texte_a_cut=htmlspecialchars($row['QText_question'] );
 $texte_a_affiche= substr( $texte_a_cut ,  0 , 30);
 
 echo "<tr>";
 echo "<th>image </th> <br/> ";
 echo "  <td>"  .    "<img class='imgEnigmeChoix ' src='data: .jpg;charset=utf8;base64, $img' />"  . "</td>" . "<br>"; 

 echo "<tr>" ;
 echo "<th>reponse</th> ";
 echo "  <td>"  . $row['QText_reponse'] . "</td>";



 echo "  <td>   <input type='checkbox' name='ch[ ]'  value='$row[num_enigme]'  />  </td>";


 echo "</table>";
   
 
}



}

?>
   
<!--<button onclick="location.href='../Creation/index.php'" type="button">
         retour à la création des énigme</button> <br/> -->

   

<form class=""method="post" action="">


   
         <label for="titrem"> </label>
   
        <input name="vali_mission" type="submit" value="ajouter au parcours"
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
   

        </div>
      


   </body>
</html>