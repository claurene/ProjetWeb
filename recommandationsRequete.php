<?php 

$nbAffiche='16'; // nombre de séries à afficher, pour tester si fonctionne (ordre et limite d'episodes), et limiter les séries affichées

/* Par défaut, tri selon la POPULARITE de chaque saison */
$SQL='SELECT * FROM series ORDER BY popularity desc LIMIT 0,16';

/* Si un genre est sélectionné */ 
if (isset($_GET['par'])){
	
	/* tri par les séries d'episodes les plus regardés, on peut si le temps faire par rapport au nombre d'episodes de la série */
	/* Element sélectionné : plusVues (le plus de vues d'episodes de séries) */
	if (($_GET["par"])=="plusVues"){	
		$SQL='SELECT * FROM ((series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id) INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id) INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id GROUP BY series.id ORDER BY popularity desc LIMIT 0,'.$nbAffiche;
	} 
	
	else {
		
		/* test si l'utilisateur est connecté (toujours connecté mais nécessaire de le tester) */
		if (isset($_GET["user"])){
			
			// lien entre séries et épisodes vus par l'utilisateur
			// requete sur les series dont au moins un episode vu par l'utilisateur
			$SQL="SELECT id FROM users WHERE name='".$_GET["user"]."'";
			$SQL='SELECT * FROM (((series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id) INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id) INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id) where user_id=all('.$SQL.') GROUP BY series.id HAVING count(*)=1 ORDER BY popularity desc';
					
			//$SQL='SELECT * FROM series ORDER BY popularity desc LIMIT 0,1';
			
			// ne garde que l'id de l'utilisateur
			$S1="SELECT id FROM users WHERE name='".$_GET["user"]."'";
			// ne garde que les id des episodes vus par l'utilisateur
			$S2='SELECT id FROM ('.$S1.') R INNER JOIN usersepisodes.user_id=R.id';
			// jointure avec les id saisons et les id séries correspondantes
			$S3='SELECT * FROM (('.$S2.') R INNER JOIN seasonsepisodes ON R.id=seasonsepisodes.episode_id) INNER JOIN seriesseasons ON seasonsepisodes.series_id=seriesseasons.series_id';
		
			// tri selon le genre le plus regardé par l'utilisateur
			if (($_GET["par"])=="genre"){
				// jointure avec les genres des séries, on garde les id des episodes et le genre associé
				$S41='SELECT genre_id, episode_id FROM ('.$S3.') R INNER JOIN seriesgenres ON R.series_id=seriesgenres.series_id';
				$S42='SELECT genre_id, count(*) FROM ('.$S41.') GROUP BY genre_id ORDER BY count(*) desc LIMIT 0,1';
				$S43='SELECT series_id FROM seriesgenres INNER JOIN ('.$S42.') R ON seriesgenres.genre_id=R.genre_id';
				$SQL='SELECT * FROM series INNER JOIN ('.$S43.') R ON series.id=R.series_id ORDER BY popularity DESC ';
				//$SQL='SELECT * FROM series LIMIT 0,16';
				$SQL=$S42;
				
				// requete sur les series dont au moins un episode vu par l'utilisateur
				$SQL="SELECT id FROM users WHERE name='".$_GET["user"]."'";
				$SQL='SELECT * FROM (((series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id) INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id) INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id) where user_id=all('.$SQL.') GROUP BY series.id HAVING count(*)=1 ORDER BY popularity desc';
			
				//$SQL='SELECT * FROM series ORDER BY popularity desc LIMIT 0,3';
			}
			
			// tri selon le réalisateur le plus regardé par l'utilisateur
			else if (($_GET["par"])=="createur"){
				$SQL="SELECT * FROM users WHERE name='".--$_GET["user"]."'";
				$SQL='SELECT * FROM series ORDER BY popularity desc LIMIT 0,1';
			}
		}
	}
}	

/*Accès à la base de donnée, mise en place des données des séries au format JSON*/
$bdd = new PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8', 'root', '');
$query = $bdd->query($SQL);
$donnees=$query->fetchAll(PDO::FETCH_ASSOC);
$array["series"]=$donnees;
$JSON=json_encode($array);
echo $JSON
?>