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
        <li><a href="base.html">Parcourir</a></li>
        <!-- Lien vers recommandations -->
        <li><a href="#recommandations">Recommandations</a></li>
        <!-- Lien vers connexion -->
        <li><a href="register.php" id=#connexion>Connexion</a></li>
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
                    <input id="search" type="text" placeholder="Rechercher une série...">
                    <input id="submit" type="submit" value="Rechercher">
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

</div>

<!-- Zone principale -->
<div class="main">
    <div class="pageConnexion">
        <!-- zone de connexion -->
        <div class="connexion-inscription">
            <form method="post" action="#connexion">
                <div>
                    <div>
                        <label for="identifier1">Identifiant</label>
                        <input type="text" id="identifier1" size="20"/>
                    </div>
                    <div>
                        <label for="password1">Mot de passe</label>
                        <input type="password" id="password1"/>
                    </div>
                </div>

                <div>
                    <input id="connexionSubmit" type="submit" value="Connexion"/>
                </div>
            </form>
        </div>

        <!-- zone d'inscription -->
        <div class="connexion-inscription">
            <form  method="post" action="#inscription">
                <div>
                    <div>
                        <label for="identifier2">Nom d'utilisateur</label>
                        <input type="text" id="identifier2" name="identifier2" size="20"/>
                    </div>
                    <div>
                        <label for="password2">Mot de passe</label>
                        <input type="password" id="password2" name="password2" />
                    </div>
                    <div>
                        <label for="password3">Confirmation</label>
                        <input type="password" id="password3" name="password3" />
                    </div>
                    <div>
                        <label for="email">Adresse email</label>
                        <input type="text" id="email" name="email" />
                    </div>
                </div>

                <div>
                    <input id="inscriptionSubmit" type="submit" value="S'inscrire"/>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <!-- à remplir (noms, etc.) -->
    <p>© Ferry Emeline, Cladt Laurene, Perrin Lucas & Tavernier Joel</p>
</div>

</body>

</html>