<?php

#booléan de valeur "false" si tous les champs ne sont pas corrects
$verif = true;

#fonction permettant d'ajouter un utilisateur à la base de données
function addUser($username, $email, $password){
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    $query = $bdd->prepare('INSERT INTO users (name, password, email) VALUES (:name, :password, :email)');
    $pwd=hash('sha384',$password);
    $query->execute(array(
        'name' => $username,
        'password' => $pwd,
        'email' => $email,
    ));
    echo "<p> Vous avez été inscrit avec le pseudo $username.</p>";
}

#fonction vérifiant la disponibilité du pseudo
function checkUserName($username) {
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    $reponse = $bdd->query('SELECT COUNT(*) AS nbr FROM users WHERE name="'.$username.'"');
    $donnees = $reponse->fetch();
    if ($donnees['nbr'] > 0){
        return false;
    }
    else{
        return true;
    }
}

#vérification du formulaire ; grace à 'required' on n'a pas besoin de vérifier si certains champs sont vides, ni la validité de l'adresse email
if (!checkUserName($_POST["identifier2"])) {
    $verif = false;
    echo "<p> Votre pseudo est déjà pris  </p>";
}
if ($_POST["password3"] != $_POST["password2"]) {
    $verif = false;
    echo "<p> La confirmation de votre mdp a échoué </p>";
}
if ($verif) {
    #si tous les champs sont valides, on ajoute l'utilisateur et ses genres à la base de données
    adduser($_POST["identifier2"], $_POST["email"], $_POST["password2"]);
}
else {
    echo "<p> Nous n'avons pas pu vous inscrire. </p>";
}

echo "<a href='register.php'> Retour à la page précédente </a>";
