<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$pass = "";
	$db = "skpa_db";
	$conn = mysqli_connect($dbhost, $dbuser, $pass, $db ) or die ("gagal masuk database");
	
	$rootUrl = "/spkpa";
	$sessionKey = "spkpa9090";
?>