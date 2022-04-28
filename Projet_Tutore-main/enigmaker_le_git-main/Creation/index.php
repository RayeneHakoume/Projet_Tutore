<?php 
        include ("../Inclusion/connexion_bd.php");
        include ("../Inclusion/traitement_connexion.php");
       
         $info_ajout="";
         $pbinfo_ajout="";
         include ("../Creation/bloc_crea.php");
        if (isset($_SESSION['num_utilisateur']) ) {

         

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
      <?php 
   include ("../Inclusion/menu_haut.php");
    ?>

    <div class=""  > 
    <div class="container" >
      <form name="myForm"   enctype="multipart/form-data"  class="form_inscri" action="" 
            method="post">
            
         <h4 class="display-4 text-center t1_cre" >Créer un parcours</h4><hr><br>
         <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $_GET['error']; ?>
          </div>
         <?php } ?>




       
         <label for="name">Choisir le type d'enigme</label> <br>

       

Textuelle <input type="radio"  id="Check1" onclick="myFunction(); checkOnly(this)" name="cb1"  value="textuelle">
Image <input type="radio"   id="Check2" onclick="myFunction(); checkOnly(this)" name="cb1" value="image"> 
<!-- pour les énigmes images début -->
<div id="img"  style="display:none">
<p>choississez des images</p>

<input type='file' name='image_enigme' accept=".png,  .jpeg , .jpg"  />
<br>
       <label for='rep'>Saisir la réponse de l'enigme</label> <br>
           <input type='text' 
                 class='form-control' 
                 id='rep_img' 
                 name='rep_img' 
                 value="<?php if(isset($_GET['rep_img']))
		                           echo($_GET['rep_img']); ?>" 
                 
                 placeholder="réponse de l'enigme"> <br/>
                 <button type='submit'
                class='btn btn-primary'
                name='create_eni_img'>Créer l'enigme</button> <br/>
            

</div>
<!-- pour les énigmes image fin-->
<div id="text" style="display:none"><!--Checkbox is CHECKED!  -->

<script> 
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("Check1");
  // rajout deb
  var checkBox2 = document.getElementById("Check2");
  // rajout fin
  // Get the output text
  var text = document.getElementById("text");
  var text2 = document.getElementById("img");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    img.style.display = "none";
  }
  if (checkBox2.checked == true    ){
    text.style.display = "none";
    img.style.display = "block";
  }


}
</script>



         <div class='form-group' action="">
           <p>Saisir le texte de l'enigme</p>
           <textarea class="t_eninew" 
                 
                 id='lib'
                 name='lib' 
                
                 placeholder='texte de lenigme'>
</textarea>
         </div>

         <div class='form-group'>
           <label for='rep'>Saisir la réponse de l'enigme</label> <br>
           <input type='text' 
                 class='form-control' 
                 id='rep' 
                 name='rep' 
                 value="<?php if(isset($_GET['rep']))
		                           echo($_GET['rep']); ?>" 
                 
                 placeholder="réponse de l'enigme">
         </div>

         <div class='input_fields_wrap'>
 
    <div>

    </div>
	
     </div>
<br>
     <button type='submit'
                class='btn btn-primary'
                name='create'>Créer l'enigme</button> <br>
     
             

      
   </div>
   <br>


  <!-- <button  onclick="location.href='../Creation/page_crea_indice_bonus.php'" type='button'
                class='btn btn-primary'
                name='creib_ib' >Créer des indices bonus</button> -->
                <button onclick="location.href='../Creation/page_lecture.php'" type="button"> 
         choisir les énigmes qui constitueront le parcours</button>
       
                
         <!-- <a href='../Creation/page_lecture.php' class='link-primary'>Voir la liste des enigmes</a> -->
    
       </form>
   <?php 

         if( $info_ajout!=null  ){
            echo "<p class='inf_eni'> $info_ajout </p>";

         }
         if( $pbinfo_ajout!=null  ){
            echo "<p class='inf_enim'> $pbinfo_ajout </p>";

         }
   
         
         ?>
   </div>

    </div>

     
<?php 



/*
 if ($uri!=$url_page_crea) {
   $_SESSION['missionCreable']=0;
}
*/

//echo  $_SESSION['missionCreable'];


// conter le nombre d'enigme créé par l'utilisateur
// on sélectionnne ce nb @TODO





?>
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