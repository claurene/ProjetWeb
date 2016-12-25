<!-- Structure de base pour toutes les pages du site ; à inclure dans chaque page -->

<!-- Variable de session pour un affichage en fonction de si l'utilisateur est connecté ou non -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Structure</title>
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="CSS/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <!-- Sidebar (Bootstrap) CSS -->
    <link href="CSS/simple-sidebar.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="CSS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <style>
        #main {
            margin-top: 60px;
        }
        .scrollable-menu {
            height: auto;
            max-height: 200px;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

<!-- Barre de navigation noire -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <!-- logo université de Lorraine -->
            <img src="Sources/ul_icon.png" alt="logo" style="width:75px;height:auto;">
        </li>
        <!-- Liens -->
        <!-- Lien vers accueil -->
        <li>
            <a href="accueil.php">Parcourir</a>
        </li>

        <?php
            if(isset($_SESSION['username'])){
                echo '
                <!-- Lien vers Recommandations -->
                 <li>
                    <a href="#Recommandations">Recommandations</a>
                </li>
                <!-- Lien vers la page personnelle de l\'utilisateur -->
                 <li>
                    <a href="personal-space.php">Compte</a>
                </li>
                <!-- Deconnexion -->
                 <li>
                    <a href="logout.php">Deconnexion</a>
                </li>
                ';
            }
            else {
                echo '
                 <!-- Lien vers connexion -->
                 <li>
                    <a href="register.php">Connexion</a>
                </li>
                ';
            }
        ?>
    </ul>
</div>

<!-- Barre de recherche -->
<nav class="navbar navbar-default navbar-fixed-top col-sm-offset-2">
    <div class="container-fluid">
        <!-- Titre -->
        <div class="navbar-header">
            <p class="navbar-text">Rechercher une série :</p>
        </div>
        <!-- Zone de recherche -->
        <form class="navbar-form navbar-left" method="get" action="accueil.php">
            <div class="form-group">
                <input id="searchInput" type="text" name="search" class="form-control" placeholder="Rechercher une série...">
            </div>
            <button id="searchButton" type="submit" class="btn btn-default">Rechercher</button>
        </form>
        <!-- Bouton pour recherche par thèmes -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recherche par thème <span class="caret"></span>
            </button>
            <ul class="dropdown-menu scrollable-menu" id="themes-menu">
                <!-- Liste des themes -->
            </ul>
        </div>
    </div>
</nav>

<!-- Section principale -->
<div id="main">
    <!-- Grille des séries ; se remplie grace à un script JQuery -->
    <div id="grid" class="container-fluid col-sm-offset-2">
    </div>
</div>

<!-- Script JS pour récuperer les données des séries -->
<script type="text/javascript" src="Sources/series.js"></script>

</body>

</html>

