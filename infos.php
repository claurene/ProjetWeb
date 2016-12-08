<?php

include "base.php";

if (isset($_GET["serie"])) {
    $url = "series.php?serie=".$_GET["serie"];
    echo "<script>loadJSONDoc('$url','infos')</script>";
}
else{
    echo "Il n'y a rien ici !";
}
