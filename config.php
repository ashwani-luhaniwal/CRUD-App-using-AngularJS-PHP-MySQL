<?php

	/***** Database Details *******/
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "shareholders";
	$con = mysql_connect($host, $user, $pass);

	if (!$con) {
		die('Could no connet: ' . mysql_error());
	}

	mysql_select_db($database, $con);
?>