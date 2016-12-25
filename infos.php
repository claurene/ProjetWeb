<?php

include "base.php";

if (isset($_GET["serie"])) {
    $url = "series.php?serie=".$_GET["serie"];
    echo "<script>loadInfos('$url');</script>";
}
else{
    echo "Il n'y a rien ici !";
}
