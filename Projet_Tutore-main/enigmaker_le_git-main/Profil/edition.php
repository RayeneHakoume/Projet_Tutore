<?php 
        session_start();
       include ("../Inclusion/connexion_bd.php");

        if(isset($_SESSION['num_utilisateur'])) {
            $requser = $bdd->prepare("SELECT * FROM n_utilisateur WHERE 	num_utilisateur  = ?");
            $requser->execute(array($_SESSION['num_utilisateur']));
            $user = $requser->fetch();
            if (file_exists(@$_FILES['image_pp']['tmp_name']) && is_uploaded_file(@$_FILES['image_pp']['tmp_name'])) {
               $newImage=file_get_contents(@$_FILES['image_pp']['tmp_name']);
               $confirmeNewImage=true;
           
               $req1= $bdd->prepare( "UPDATE  n_utilisateur set image_profil = ? 
          WHERE 	num_utilisateur  = ?      " );
                 $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
               $req1->execute(array($newImage, $_SESSION['num_utilisateur']));
               header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
            }
            if(isset($_POST['npseudo']) AND !empty($_POST['npseudo']) AND $_POST['npseudo'] != $user['pseudo']) {
               $newpseudo = htmlspecialchars($_POST['npseudo']);
               $insertpseudo = $bdd->prepare("UPDATE n_utilisateur SET pseudo = ? WHERE 	num_utilisateur  = ?");
               $insertpseudo->execute(array($newpseudo, $_SESSION['num_utilisateur']));
                      
               if (file_exists($_FILES['image_pp']['tmp_name']) && is_uploaded_file($_FILES['image_pp']['tmp_name'])) {
                  $newImage=file_get_contents($_FILES['image_pp']['tmp_name']);
                  $confirmeNewImage=true;
              
                  $req1= $bdd->prepare( "UPDATE  n_utilisateur set image_profil = ? 
             WHERE 	num_utilisateur  = ?      " );
                    $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
                  $req1->execute(array($newImage, $_SESSION['num_utilisateur']));
                  
               }
               header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
            }
            if(isset($_POST['nmail']) AND !empty($_POST['nmail']) AND $_POST['nmail'] != $user['email']) {
               $newmail = htmlspecialchars($_POST['nmail']);
               $insertmail = $bdd->prepare("UPDATE n_utilisateur SET email = ? WHERE 	num_utilisateur  = ?");
               $insertmail->execute(array($newmail, $_SESSION['num_utilisateur']));
               if (file_exists($_FILES['image_pp']['tmp_name']) && is_uploaded_file($_FILES['image_pp']['tmp_name'])) {
                  $newImage=file_get_contents($_FILES['image_pp']['tmp_name']);
                  $confirmeNewImage=true;
              
                  $req1= $bdd->prepare( "UPDATE  n_utilisateur set image_profil = ? 
             WHERE 	num_utilisateur  = ?      " );
                    $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
                  $req1->execute(array($newImage, $_SESSION['num_utilisateur']));
                  
               }
               header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
            }
            if(isset($_POST['nmdp']) AND !empty($_POST['nmdp']) AND isset($_POST['nmdpc']) AND !empty($_POST['nmdpc'])) {
               $mdp1 = sha1($_POST['nmdp']);
               $mdp2 = sha1($_POST['nmdpc']);
               if($mdp1 == $mdp2) {
                  $insertmdp = $bdd->prepare("UPDATE n_utilisateur SET mdp = ? WHERE 	num_utilisateur  = ?");
                  $insertmdp->execute(array($mdp1, $_SESSION['num_utilisateur']));
                  if (file_exists($_FILES['image_pp']['tmp_name']) && is_uploaded_file($_FILES['image_pp']['tmp_name'])) {
                     $newImage=file_get_contents($_FILES['image_pp']['tmp_name']);
                     $confirmeNewImage=true;
                 
                     $req1= $bdd->prepare( "UPDATE  n_utilisateur set image_profil = ? 
                WHERE 	num_utilisateur  = ?      " );
                       $req1->bindValue(1 , $newImage , PDO::PARAM_LOB);
                     $req1->execute(array($newImage, $_SESSION['num_utilisateur']));
                     
                  }
                  header('Location: ../Profil/index.php?num_utilisateur='.$_SESSION['num_utilisateur']);
               } 

                  
               
               else {
                  $msg = "Vos deux mdp ne correspondent pas !";
               }
            }
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
   <div class="conteneur_profil">
      <br>
    <h3 class="info_pro_titreAlt">Edition du profil</h3>

    <form class="form_inscri"method="post" action="" enctype="multipart/form-data">

<table>
<tr>

        <td>
         <label for="npseudo">Pseudo :</label>
        </td>
        <td>
        <input id="npseudo" type="text" name="npseudo" placeholder="Nouveau Pseudo" value="<?php 
        echo  $user['pseudo'];
        ?>" />
        </td>
        </tr>

        <tr>

        <tr>

        <td>
         <label for="image_pp"> Image  :</label>
        </td>
        <td>
        <input type='file' name='image_pp' accept=".png,  .jpeg , .jpg"  /> 
        </td>
        </tr>

        <tr>

<td>
 <label for="nmail"> Mail :</label>
</td>
<td>
<input id="nmail" type="text" name="nmail" placeholder="Nouveau Mail" value="<?php 
        echo  $user['email'];
        ?>"  />
</td>
</tr>

<tr>

<td width="10px">
 <label  class='linfc' for="nmdp">Mot de passe :</label>
</td>
<td>
<input id="nmdp" type="password" name="nmdp" placeholder="Nouveau mdp" />
</td>
</tr>

<tr>

<td>
 <label class='linfc'for="nmdpc">Confirmation :</label>
</td>
<td>
<input class='linfc' id="nmdpc" type="password" name="nmdpc" placeholder="Confirmation " />
</td>
</tr>

<tr>
            <td></td>
            <td class="ligne_vali">
                <br/>
                <input  class='linfc' type="submit" name="formMaj" value="Mettre à jour mon profil " />
            </td>
        </tr>
        </table>
        
</form>
<p class='linfc' class='aucun' >Saisissez les informations à changer uniquement</p>
   </div>
   </body>
</html>
<?php   
}
else {
    header("Location: ../Connexion/index.php");
}
?>