<?php

    function getMysqli(){

        $mysqli = new mysqli("dsi-web-db.univ-lyon1.fr", "enigmaker", "Mb4RwmQU_6Nyw", "enigmaker"); //on se connecte à la BDD avec nos identifiants

        if ($mysqli->connect_errno) {//si la connexion echoue (donc on teste si il existe un code d'erreur')
            echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; //on affiche l'erreur dans la page html'
            return null;
        }

        return $mysqli;
    }



?>