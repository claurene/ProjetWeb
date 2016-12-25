<?php

include "base.php";

/*script php pour l'affichage des résultats de la recherche*/
$url = "episodes_bdd.php?serie=".$_GET["serie"]."&season=".$_GET["season"];

echo "<script>loadEpisodes('$url');</script>";