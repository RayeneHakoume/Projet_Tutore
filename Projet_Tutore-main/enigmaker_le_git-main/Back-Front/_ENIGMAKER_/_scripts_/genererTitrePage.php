<?php
$url = explode("/",getcwd());
$title = "Enigmaker - " . $url[sizeof($url)-1]; //prendre nom du dossier parent et l'ajouter à 'enigmaker - '
echo "<title>\n\t\t". $title ."\n\t</title>";
?>