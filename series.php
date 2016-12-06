<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query('SELECT * FROM series');
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["series"]=$donnees;
$JSON=json_encode($array);
echo $JSON;

?>



