<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

session_start();

/*Variables*/
$username=$_SESSION['username'];

/*Accès à la base de données*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
/*On récupère les épisodes visionnés*/
$query = $bdd->query('select * from episodes inner join (select distinct * from usersepisodes inner join (select id from users where name="'.$username.'")R on user_id=id)R1 on episodes.id=episode_id');
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["episodes"]=$donnees;
$JSON=json_encode($array);
echo $JSON;