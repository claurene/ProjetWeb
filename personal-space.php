<?php

#fonction vérifiant si les données de connexion sont correctes
function checkUser($username,$password){
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    $query = $bdd->query('SELECT password FROM users WHERE name="'.$username.'"');
    $pwd=$query->fetch();
    if ($pwd==null){
        return false;
    }
    else {
        $empreinte=substr(hash('sha384',$password),0,64);
        #on utilise substr car la base de donnée ne gère que 64 characters pour password
        if ($empreinte==$pwd['password']){
            return true;
        }
        else {
            return false;
        }
    }
}

if (checkUser($_POST["identifier1"],$_POST["password1"])){
    include "base.html";
    echo "<script>$('#main').load('personal-space.html');</script>";
}
else {
    echo "<p> Votre nom d'utilisateur ou votre mot de passe est incorrect. </p>";
    echo "<a href='register.php'> Retour à la page précédente </a>";
}

