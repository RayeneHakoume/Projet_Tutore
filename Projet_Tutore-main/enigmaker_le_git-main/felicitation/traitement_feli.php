<?php
  session_start();
  $dejavote=null;
  include ("../Inclusion/connexion_bd.php");
if(isset($_POST['validerfeli'])) {
    if (isset($_POST['formnum']) && !empty($_POST['formnum']) && $_POST['formnum']!=null) {
        if(isset($_SESSION['num_utilisateur'])) {
            $note=intval($_POST['formnum']);
            $user=intval($_SESSION['num_utilisateur']);
            $id_parcours = intval($_GET ['num_parcour']);
    



// on regarde si l'utilisateurs à déjà voter pour l'énigme
            $recupmission4 = $bdd->prepare("   SELECT count(*) from n_assoc_note_parc n inner join n_parcours p on 
            n.refParc=p.num_parcour where p.num_parcour='$id_parcours'  and n.refUser='$user'     ");
            $recupmission4 ->execute();
            $recupidmissioncontenu3=$recupmission4->fetchColumn();
            

            if ($recupidmissioncontenu3>=1) {
                $dejavote="vous avez déjà voté pour ce parcours";
            }


            else {
                // on insert la note saisi par l'user
                $insertntitre = $bdd->prepare("   INSERT INTO n_assoc_note_parc (refUser , refParc,note_donne) values (?, ?, ?)  ");
                $insertntitre->execute(array($user , $id_parcours, $note));
                $confirmation="votre note a bien été prise en compte";


                // on recup nb de vote associé au parcours
            $recupmission3 = $bdd->prepare("   SELECT count(*) from n_assoc_note_parc n inner join n_parcours p on 
            n.refParc=p.num_parcour where p.num_parcour='$id_parcours'       ");
            $recupmission3 ->execute();
            $recupidmissioncontenu2=$recupmission3->fetchColumn();


            // on recup la somme des note associé au parcours
            $recupmission7 = $bdd->prepare("   SELECT SUM(note_donne) from n_assoc_note_parc n inner join n_parcours p on 
            n.refParc=p.num_parcour where p.num_parcour='$id_parcours'       ");
            $recupmission7 ->execute();
            $recupidmissioncontenu6=$recupmission7->fetchColumn();

                $newNote=$recupidmissioncontenu6/$recupidmissioncontenu2;
            // on actualise la note du parcours
            $insertntitre2 = $bdd->prepare("  UPDATE n_parcour p set noteParc=$newNote where p.num_parcour='$id_parcours'    ");
            $insertntitre2->execute(array($user , $id_parcours, $note));

            $insertntitre5 = $bdd->prepare("  update n_utilisateur set nb_parcours_fait = nb_parcours_fait+1 WHERE num_utilisateur= ?   ");
            $insertntitre5->execute(array($user ));
            }


     
        }

    }
    else {
        $confirmation="la note n'a pas été renseignée";
    }

}



?>