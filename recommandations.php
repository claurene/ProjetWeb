<?php

include 'base.php';

$urlUser = "series.php?user=".$_SESSION['username'];

$url = "recommandationsRequete.php";

if (isset($_GET["par"])) {
	$url=$url."?par=".$_GET['par']."&user=".$_SESSION['username'];	
}

echo "<script>$('#main').load('recommandations.html');loadGrid('$url'); loadUser('$urlUser');</script>";
?>