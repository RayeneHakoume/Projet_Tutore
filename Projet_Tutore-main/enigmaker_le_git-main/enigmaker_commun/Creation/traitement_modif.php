<?php 
  session_start();
  include ("../Inclusion/connexion_bd.php");

  $id_enigme = $_GET ['num_enigme'];
// li'id actu de l'enigme
if (isset($_POST['change_eni'])) {
   
    $requeni = $bdd->prepare("SELECT * FROM n_enigme WHERE num_enigme = ?");
    $requeni->execute(array($id_enigme));
    $en = $requeni->fetch();
$type_eni=intval($en['type_enigme']);
// modif a faire pour eni texte début **************************************************************************
  if ($type_eni==1)  {

// si on change  le texte de l'enigme
     if(isset($_POST['nlibelle']) AND !empty($_POST['nlibelle']) AND $_POST['nlibelle'] != $en['QText_question']) {
        $nlibelle = htmlspecialchars($_POST['nlibelle']);
        $insertntitre = $bdd->prepare("UPDATE n_enigme SET QText_question = ? WHERE num_enigme = ?");
        $insertntitre->execute(array($nlibelle,  $id_enigme));
        header('Location: ../Creation/page_lecture.php');

     }

     // si on change  la réponse
     if(isset($_POST['nrep']) AND !empty($_POST['nrep']) AND $_POST['nrep'] != $en['QText_reponse']) {
        $nrep = htmlspecialchars($_POST['nrep']);
        $insertntitre = $bdd->prepare("UPDATE n_enigme SET QText_reponse = ? WHERE num_enigme = ?");
        $insertntitre->execute(array($nrep,  $id_enigme));
        header('Location: ../Creation/page_lecture.php');

     }
// si on change la réponse et le texte
  
     // modif a faire pour eni texte fin **************************************************************************
   }

}

    

?>