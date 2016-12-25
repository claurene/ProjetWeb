<?php

include 'base.php';

$url = "series.php?user=".$_SESSION['username'];

echo "<script>$('#main').load('personal-space.html'); loadUser('$url');</script>";