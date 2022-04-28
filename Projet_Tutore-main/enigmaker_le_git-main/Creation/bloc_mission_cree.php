<?php 

  include ("../Inclusion/connexion_bd.php");
  $p=true;
  $ermis=null;
  @$ch=($_POST["ch"]);
     if (isset($_POST['vali_mission' ] )  and  (  empty($_POST['titrem' ]) or empty($ch)   ) ) {
      $ermis="le titre n'a pas été saisi ou aucune énigme n'a été sélectionnées";

     }
    else if (isset($_POST['vali_mission' ] )  and (  !empty($_POST['titrem' ]) and !empty($ch)   ) ) {
$ti= htmlspecialchars($_POST['titrem' ]);
$id_ut_php=htmlspecialchars($_SESSION['num_utilisateur']);
//echo $id_ut_php;
//echo $ti;
//echo $ti;
//echo $id_ut_php;
    //  @$validerr=$_POST["vali_mission"];
          // on créé la mission
  $req1= $bdd->prepare( " INSERT INTO n_parcours (titre_parcours , id_createur) VALUES ( '$ti' , '$id_ut_php' ) " );
  $req1->execute();

  // on récup son id
 
  $recupmission = $bdd->prepare(" SELECT num_parcour  FROM n_parcours  where id_createur=  '$id_ut_php' order by date_crea_parc desc  LIMIT 1");
  $recupmission ->execute();
  $recupidmissioncontenu=$recupmission->fetchColumn();
 // echo $recupidmissioncontenu;
// on lie toute les enigme selectionée à cette mission avec la table enigme mission
      foreach($ch as $item) {
     // echo $item  . '<br/>';
     $req2= $bdd->prepare(" insert into n_assoc_ep (num_parc, num_eni) values ('$recupidmissioncontenu' , '$item')  ");
     $req2->execute();
 //    echo $item;
          
       
        

    
      }
      
      $ermis="le parcours à bien été créé";
      header('Location: ../Accueil/index.php');

     }
//on créé une mission 

// $selection_enigmeu = $bdd->prepare("insert into mission ");
// $affiche_enigmeu = $selection_enigmeu -> fetch();
// $selection_enigmeu->execute();

//  $selection_enigmeu = $bdd->prepare("insert into enigme_mission ");
 // $affiche_enigmeu = $selection_enigmeu -> fetch();
 //$selection_enigmeu->execute();


//   print_r($ch) ;

     
      
    // echo @implode(" - " , $ch);
   
  


  ?>