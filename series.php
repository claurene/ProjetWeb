<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

/*Requête SQL de base*/
$SQL='SELECT * FROM series';

/*Recherche*/
if (isset($_GET["search"])) {
    $SQL=$SQL." WHERE LOWER(name) LIKE '%".$_GET["search"]."%'";
}
/*Infos sur une série*/
else if (isset($_GET["serie"])) {
    $SQL=$SQL." WHERE id=".$_GET["serie"];
}
/*Recherche par thème*/
else if (isset($_GET["sort"])) {
    $SQL="SELECT * FROM series INNER JOIN (SELECT series_id FROM seriesgenres WHERE genre_id=".$_GET["sort"].") R ON series_id=id";
}
/*Accès aux données d'un utilisateur*/
else if (isset($_GET["user"])) {
    $SQL="SELECT * FROM users WHERE name='".$_GET["user"]."'";
}

/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query($SQL);
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["series"]=$donnees;
$JSON=json_encode($array);
echo $JSON

?>



