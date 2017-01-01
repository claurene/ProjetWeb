<?php

/*La base de données mise à disposition sur Arche a étée importée dans phpMyAdmin sous le nom "ProjetWeb"*/

session_start();

if(isset($_SESSION['username'])){
    /*On récupère le nom d'utilisateur*/
    $username=$_SESSION['username'];

    /*Accès à la base de données*/
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    /*On récupère l'id de l'utilisateur*/
    $query1 = $bdd->query('select id from users where name="'.$username.'"');
    $userid=$query1->fetch();

    /*Création de la requête : ajout ou suppression d'un épisode visionné*/
    if ($_GET["view"]='true'){
        $SQL="INSERT INTO usersepisodes (user_id, episode_id, rating) VALUES (:user, :episode, :rating)";
        $query = $bdd->prepare($SQL);
        $query->execute(array(
            'user'=>$userid['id'],
            'episode'=>$_GET["episode"],
            'rating'=>null, //rating null pour l'instant
        ));

    }
    if ($_GET["view"]='false'){
        $SQL="DELETE FROM usersepisodes WHERE user_id=".$userid['id']." AND episode_id=".$_GET['episode'];
        $query = $bdd->exec($SQL);
    }

    /*Retour à la page précédente*/
    header("Location: $_SERVER[HTTP_REFERER]");
}
else {
    /*Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion*/
    header("Location: register.php");
}

