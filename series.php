<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

/*Requête SQL de base*/
$SQL='SELECT * FROM series';

/*Recherche*/
if (isset($_GET["search"])) {
    $SQL=$SQL." WHERE LOWER(name) LIKE '%".$_GET["search"]."%'";
}
else if (isset($_GET["serie"])) {
    $SQL=$SQL." WHERE id=".$_GET["serie"];
}

/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query($SQL);
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["series"]=$donnees;
$JSON=json_encode($array);
echo $JSON

?>



