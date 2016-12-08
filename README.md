# ProjetWeb

/!\ Important /!\
Pour que le site fonctionne chez vous, il est nécessaire d'importer la base de données (disponible sur arche) dans PhpMyAdmin sous le nom "ProjetWeb" ;
Si il y a une erreur car le fichier est trop volumineux il vous faudra modifier le fichier "php.ini" de votre localhost (cf. google pour procédure)

Description des fichiers :

Sujet/ : répertoire contenant le fichier de répartition des tâches ainsi que la description du projet.

ul_icon.png : icône université de Lorraine (en haut à gauche du site web)

base.html : Structure de base à inclure (via include 'base.html') dans toutes les pages du site ; elle contient les div construisant les différentes sections du site, ainsi que le lien vers le script de récupération des données.

stylesheet.css : Feuille de style du site configurant l'affichage de tous les objets et leur disposition.

series.js : script JavaScript et JSON récupérant et formatant les données des séries.

series.php : script PHP récupérant les données de la base de données requise pour le projet.

accueil.php : Page d'accueil du site et page affichant les résultats de la recherche de séries.

infos.php : Page affichant les informations sur une série quand on clique sur l'image de celle ci dans les pages d'accueil ou de recomandation.

register.php : Page de connexion/inscription. //TODO : script de connexion/inscription (cf. TDs) //TODO: modifier la page (elle n'inclut pas la structure de base)


