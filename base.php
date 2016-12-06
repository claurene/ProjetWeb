<!DOCTYPE html>
<html>

<head>
<title>Structure</title>
<!-- insérer liens vers feuille de style, script JS etc. -->
<!-- feuille de style css pour toutes les pages -->
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>

<!-- Barre de navigation noire -->
<div class="sideNav">
    <!-- logo université de Lorraine -->
    <img src="ul_icon.png" alt="logo" style="width:75px;height:auto;">

    <!-- liens -->
    <ul>
        <!-- Lien vers accueil -->
        <li><a href="base.php">Parcourir</a></li>
        <!-- Lien vers recommandations -->
        <li><a href="#recommandations">Recommandations</a></li>
        <!-- Lien vers connexion -->
        <li><a href="register.html" id=#connexion>Connexion</a></li>
    </ul>

    <!-- espace "mon compte" : à faire apparaitre en JS ou PHP si l'utilisateur est connecté -->
    <div class="account border">
        <p>Mon compte :</p>
        <ul>
            <!-- lien vers page utilisateur -->
            <li><a href="#compte">#username</a></li>
            <!-- lien vers séries visionnées -->
            <li><a href="#visionnees">Séries déjà visionnées</a></li>
        </ul>
    </div>

</div>

<!-- Barre de recherche grise -->
<div class="topBar">
    <h1>Recherche de séries :</h1>

    <!-- menus de la barre : -->
    <ul class="topMenu">
        <!-- Rechercher une série ; ajouter method et action dans la balise form lors de la création du script de recherche -->
        <li>
            <div class="searchMenu">
                <form>
                    <input id="searchInput" type="text" name="search" placeholder="Rechercher une série...">
                    <input id="searchButton" type="submit" value="Rechercher">
                </form>
            </div>
        </li>

        <!-- tri de séries par thème -->
        <li>
            <div class="themesMenu">
                <button class="themesButton">Recherche par theme ↴</button>
                    <div class="themesList">
                    <!--
                        <a href="#">#Theme1</a>
                        <a href="#">#Theme2</a>
                        <a href="#">etc.</a>
                    -->
                        <form>
                           <label class="themesCheckbox">
                               <input type="checkbox" name="theme" value="theme1">theme 1
                           </label>
                            <label class="themesCheckbox">
                                <input type="checkbox" name="theme" value="theme2">theme 2
                            </label>
                            <label class="themesCheckbox">
                                <input type="checkbox" name="theme" value="theme3">etc
                            </label>
                        </form>
                    </div>
            </div>
        </li>
    </ul>

</div>

<!-- la barre pour le choix des saisons -->
<div class="section">
    <p id="test">test section</p>
</div>

<!-- Zone principale -->
<div class="main">

    <!-- Grille des séries -->
    <table id="grid">
    <!-- 1ère ligne ; à répeter autant de fois qu'on veut de lignes -->
    <tr>
        <!-- série n°1 ; à répeter autant de fois qu'on veut de séries par ligne -->
        <td>
            <div class="imageCell"><!-- image --></div>
            <div class="infosCell"><!-- informations sur la série --></div>
        </td>
    </tr>

    </table>

</div>

<div class="footer">
    <!-- à remplir (noms, etc.) -->
    <p></p>
</div>

<!-- Script JS pour récuperer les données des séries -->
<script type="text/javascript" src="series.js"></script>

<!-- script php pour l'affichage des résultats de la recherche -->
<?php
$url = "series.php";

if (isset($_GET["search"])) {
    $url=$url."?search=".$_GET["search"];
}

echo "<script>loadJSONDoc('$url')</script>";

?>

</body>

</html>