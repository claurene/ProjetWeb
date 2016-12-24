<?php
/*Accès à la base de donnée, affichage des thèmes au format JSON*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query('SELECT * FROM genres');
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["themes"]=$donnees;
$JSON=json_encode($array);
echo $JSON;
