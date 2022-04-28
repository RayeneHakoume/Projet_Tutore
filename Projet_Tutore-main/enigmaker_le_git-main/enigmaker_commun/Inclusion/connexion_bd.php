<?php 

// Database settings début

$servername = "127.0.0.1";
$username = "root";
$password = "MonadoBasta";
$dbname = "new_enigmaker";

//$bdd =  mysqli_connect($servername, $username, $password, $dbname);

$bdd = new PDO('mysql:host=127.0.0.1;dbname=new_enigmaker', 'root', 'MonadoBasta');


 // Database settings fin

// bd post iut
/*
  $host = 'localhost';
  $user = 'p2000108';
  $db = 'p2000108';
  $pwd = '561509';
  $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);

*/




 // bd en ligne
/*
 $servername = "dsi-web-db.univ-lyon1.fr";
 $username = "enigmaker";
 $password = "Mb4RwmQU_6Nyw";
 $dbname = "enigmaker";
 

 $bdd = new PDO('mysql:host=dsi-web-db.univ-lyon1.fr;dbname=enigmaker', 'enigmaker', 'Mb4RwmQU_6Nyw');
*/
?>