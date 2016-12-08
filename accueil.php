<?php

include "base.php";

/*script php pour l'affichage des résultats de la recherche*/
$url = "series.php";

if (isset($_GET["search"])) {
    $url=$url."?search=".$_GET["search"];
}

echo "<script>loadJSONDoc('$url','grid')</script>";
