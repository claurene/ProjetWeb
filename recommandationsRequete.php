<?php

/*on vérifie que l'utilisateur est connecté et que le tri à été activé*/
if (isset($_GET["user"])){
    if (isset($_GET["par"])){

        if($_GET["par"]=="genre"){
            /* toutes les séries ayant le même genre que celles que l'utilisateur a visionnées : */
            $SQL="select * from series where id in
				(select series_id from seriesgenres inner join
					(select genre_id from seriesgenres where series_id in
						(select series_id from seriesseasons where season_id in  
							(select season_id from seasonsepisodes where episode_id in
								(select distinct episode_id from usersepisodes inner join 
									(select id from users where name='".$_GET['user']."')R
								on user_id=id)
							)
						)
					)R1 on seriesgenres.genre_id=R1.genre_id
				)";
		/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
        	$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
        	$query = $bdd->query($SQL);
        	$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
        	/*On prend 16 séries aléatoires parmis celles retournées pour varier les recommandations*/
        	shuffle($donnees);
        	$array["series"]=array_slice($donnees, 0, 16);
        	$JSON=json_encode($array);
        	echo $JSON;
        }

        elseif($_GET["par"]=="createur"){
            /* toutes les séries ayant le même réalisateur que celles que l'utilisateur a visionnées : */
            $SQL="select * from series where id in
				(select series_id from seriescreators inner join
					(select creator_id from seriescreators where series_id in
						(select series_id from seriesseasons where season_id in  
							(select season_id from seasonsepisodes where episode_id in
								(select distinct episode_id from usersepisodes inner join 
									(select id from users where name='".$_GET['user']."')R
								on user_id=id)
							)
						)
					)R1 on seriescreators.creator_id=R1.creator_id
				)";
		/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
        	$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
        	$query = $bdd->query($SQL);
        	$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
       	 	/*On prend 16 séries aléatoires parmis celles retournées pour varier les recommandations*/
        	shuffle($donnees);
        	$array["series"]=array_slice($donnees, 0, 16);
        	$JSON=json_encode($array);
        	echo $JSON;
        }

        elseif($_GET["par"]=="plusVues") {
		/* tri par les séries qui ont le plus de vues d'episodes par rapport au nombre d'episodes total dans la série  */
		/* Element sélectionné : plusVues (le plus de vues d'episodes de séries) */
			$SQL='SELECT * FROM 
				((series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id) 
					INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id) 
						INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id 
						GROUP BY series.id 
						ORDER BY count(*)/series.number_of_episodes desc 
						
						LIMIT 0,16';

    		/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
    		$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    		$query = $bdd->query($SQL);
    		$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
    		$array["series"]=$donnees;
    		$JSON=json_encode($array);
    		echo $JSON;
	}
    }
}
else {
    /* Par défault, tri selon la popularité de chaque saison (on limite à 16 séries) */
    $SQL='SELECT * FROM series ORDER BY popularity desc LIMIT 0,16';

    /*Accès à la base de donnée, mise en place des données des séries au format JSON*/
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
    $query = $bdd->query($SQL);
    $donnees=$query->fetchAll(PDO::FETCH_ASSOC);
    $array["series"]=$donnees;
    $JSON=json_encode($array);
    echo $JSON;
}
