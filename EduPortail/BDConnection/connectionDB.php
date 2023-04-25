<?php

$ff = "mysql:host=" .localhost";dbname=" .EduPortail;

$bdd = new PDO($ff);

             // pour récupérer le résultat des requêtes SELECT 
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
?>

