<?php

    function select($mysqli, $query){


        $result = $mysqli->query($query); //on lance la requête


        return $result;
    }

?>