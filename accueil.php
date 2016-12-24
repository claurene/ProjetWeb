<?php

include "base.html";

/*script php pour l'affichage des résultats de la recherche*/
$url = "series.php";

if (isset($_GET["search"])) {
    $url=$url."?search=".$_GET["search"];
}
else if (isset($_GET["sort"])) {
    $url=$url."?sort=".$_GET["sort"];
}

echo "<script>loadGrid('$url');</script>";