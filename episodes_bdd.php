<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

/*Requête SQL*/
$SQL='select * from episodes inner join (select episode_id from seasonsepisodes join 
(select season_id from seriesseasons where series_id='.$_GET["serie"].' order by season_id limit 1 offset '.--$_GET["season"].') R 
on seasonsepisodes.season_id=R.season_id) R1 on episodes.id=R1.episode_id order by number';

/*Accès à la base de donnée, mise en place des données des séries au format JSON*/

$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query($SQL);
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["episodes"]=$donnees;
$JSON=json_encode($array);
echo $JSON;