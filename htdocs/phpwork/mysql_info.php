<?php
	$server = "wagnerj.powwebmysql.com";
	$username = "xanthakita";
	$password = "6619ywkr";
	$link = mysql_connect($server, $username, $password);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db ('toque_db');
	echo 'Connected successfully<br>';
?>